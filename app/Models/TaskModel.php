<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'description', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'title' => [
            'label' => 'Título',
            'rules' => 'required|min_length[2]|max_length[255]',
            'errors' => [
                'required' => 'O campo {field} é obrigatório.',
                'min_length' => 'O campo {field} deve ter pelo menos 2 caracteres.',
                'max_length' => 'O campo {field} não pode ter mais de 255 caracteres.',
            ],
        ],
        'description' => [
            'label' => 'Descrição',
            'rules' => 'permit_empty',
        ],
        'status' => [
            'label' => 'Status',
            'rules' => 'required|in_list[pendente,em andamento,concluída]',
            'errors' => [
                'required' => 'O campo {field} é obrigatório.',
                'in_list' => 'O campo {field} deve ser um dos valores válidos.',
            ],
        ],
    ];
        
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

}
