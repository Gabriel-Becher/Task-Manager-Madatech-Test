<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TaskController extends BaseController
{
    public function index()
    {
        return view('tasks/index');
    }

    public function create($data)
    {
        if(!$this->$data){
            return view('tasks/create');
        }
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
