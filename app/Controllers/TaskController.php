<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;


class TaskController extends BaseController
{

    private TaskModel $taskModel;
    private  $db;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $allTasks = $this->taskModel->findAll();
        $tasks = [
            'pendente' => [],
            'em andamento' => [],
            'concluída' => []
        ];

        foreach ($allTasks as $task) {
            switch ($task['status']) {
                case 'pendente':
                    $tasks['pendente'][] = $task;
                    break;
                case 'em andamento':
                    $tasks['em andamento'][] = $task;
                    break;
                case 'concluída':
                    $tasks['concluída'][] = $task;
                    break;
            }
        }

        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $data = $this->request->getPost(['title', 'description','status']);
        if ($this->taskModel->validate($data)) {
            $this->db->table('tasks')->insert($data);
            return redirect()->to(site_url('tasks'))->with('success', 'Tarefa criada com sucesso!');
        }else {
            $errors = $this->taskModel->errors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
    }

    public function edit($id)
    {
        $task = $this->taskModel->getWhere(['id' => $id])->getRowArray();
        if(empty($task)){
            return redirect()->to(site_url('tasks'))->with('error', 'Tarefa não encontrada.');
        }
        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $exists = $this->db->table('tasks')->getWhere(['id' => $id])->getRowArray();
        if (empty($exists)) {
            return redirect()->to(site_url('tasks'))->with('error', 'Tarefa não encontrada.');
        }
        $updatedData = $this->request->getPost(['title', 'description', 'status']);
        if ($this->taskModel->validate($updatedData)) {
            $this->db->table('tasks')->update($updatedData, ['id' => $id]);
            return redirect()->to(site_url('tasks'))->with('success', 'Tarefa atualizada com sucesso!');
        } else {
            $errors = $this->taskModel->errors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
    }

    public function delete($id)
    {
        $this->db->table('tasks')->delete(['id' => $id]);
        if($this->db->affectedRows() == 0){
            return redirect()->back()->with('error', 'Tarefa não encontrada.');
        }
        return redirect()->to(site_url('tasks'));
        
    }
}
