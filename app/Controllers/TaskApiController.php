<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TaskApiController extends BaseController
{
    public function index()
    {
        return $this->response->setJSON(['message' => 'API de Tarefas']);
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
