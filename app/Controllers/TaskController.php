<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;


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
            'pending' => [],
            'in_progress' => [],
            'completed' => []
        ];

        foreach ($allTasks as $task) {
            switch ($task['status']) {
                case 'pendente':
                    $tasks['pendente'][] = $task;
                    break;
                case 'em_progresso':
                    $tasks['em progresso'][] = $task;
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
        $data = $this->request->getPost(['title', 'description']);
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
        $task = $this->taskModel->find($id);

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        //
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
