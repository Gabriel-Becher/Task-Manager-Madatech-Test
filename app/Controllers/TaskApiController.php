<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TaskModel;


class TaskApiController extends BaseController{

    private TaskModel $taskModel;
    private $db;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $tasks = $this->db->table('tasks')->get()->getResultArray();
        return $this->response->setJSON($tasks)->setStatusCode(ResponseInterface::HTTP_OK);
    }

    public function store()
    {
        $jsonData = $this->request->getJSON(true);

        if (! is_array($jsonData)) {
            return $this->response->setJSON(['message' => 'Formato inválido'])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        $data = [
            'title' => $jsonData['title'] ?? null,
            'description' => $jsonData['description'] ?? null,
            'status' => $jsonData['status'] ?? null
        ];

        if ($this->taskModel->validate($data)) {
            $this->db->table('tasks')->insert($data);
            $insertedId = $this->db->insertID();

            $newTask = $this->db->table('tasks')->getWhere(['id' => $insertedId])->getRowArray();

            return $this->response->setJSON($newTask)->setStatusCode(ResponseInterface::HTTP_CREATED);
        }else {
            $errors = $this->taskModel->errors();
            return $this->response->setJSON(['errors' => $errors])->setStatusCode(ResponseInterface::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show($id)
    {
        $task = $this->db->table('tasks')->getWhere(['id'=>$id])->getRowArray();
        if(empty($task)){
            return $this->response->setJSON(['message'=>'Tarefa não encontrada'])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }
        return $this->response->setJSON($task)->setStatusCode(ResponseInterface::HTTP_OK);
    }

    public function update($id)
    {

        $exists = $this->db->table('tasks')->getWhere(['id' => $id])->getRowArray();
        if (empty($exists)) {
            return $this->response->setJSON(['message' => 'Tarefa não encontrada'])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }

        $jsonData = $this->request->getJSON(true);

        if(!is_array($jsonData)){
            return $this->response->setJSON(['message' => 'Formato inválido'])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        $updatedData = [
            'title' => $jsonData['title'] ?? null,
            'description' => $jsonData['description'] ?? null,
            'status' => $jsonData['status'] ?? null
        ];

        if(!$this->taskModel->validate($updatedData)) {
            $errors = $this->taskModel->errors();
            return $this->response->setJSON(['errors' => $errors])->setStatusCode(ResponseInterface::HTTP_UNPROCESSABLE_ENTITY);
        }

        $this->db->table('tasks')->update($updatedData, ['id' => $id]);

        $updatedTask = $this->db->table('tasks')->getWhere(['id' => $id])->getRowArray();
        return $this->response->setJSON($updatedTask)->setStatusCode(ResponseInterface::HTTP_OK);
        
    }

    public function delete($id)
    {
        $this->db->table('tasks')->delete(['id'=>$id]);
        if($this->db->affectedRows()>0){
            return $this->response->setStatusCode(ResponseInterface::HTTP_NO_CONTENT);
        }else{
            return $this->response->setJSON(['message'=>'Tarefa não encontrada'])->setStatusCode(ResponseInterface::HTTP_NOT_FOUND);
        }
    }
}
