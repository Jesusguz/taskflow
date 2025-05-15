<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table            = 'projects'; // Nombre de la tabla en la BD
    protected $primaryKey       = 'id'; // Nombre de la clave primaria

    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // O 'object'
    protected $useSoftDeletes   = true; // Usar Soft Deletes

    // Campos permitidos para ser insertados o actualizados desde el controlador
    protected $allowedFields    = [
        'user_id', // Para asociar al usuario creador
        'name',
        'description',
        'status',
    ];

    // Timestamps (automáticos si las columnas existen)
    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';

    // Reglas de validación para insertar/actualizar datos a través del modelo
    protected $validationRules    = [
        'name'        => 'required|min_length[3]|max_length[255]|is_unique[projects.name]',
        'description' => 'max_length[5000]',
        'status'      => 'in_list[open,closed,on hold,cancelled]',
    ];
    protected $validationMessages = [
        'name' => [
            'required'   => 'El nombre del proyecto es obligatorio.',
            'min_length' => 'El nombre del proyecto debe tener al menos 3 caracteres.',
            'max_length' => 'El nombre del proyecto no debe exceder los 255 caracteres.',
            'is_unique'  => 'Ya existe un proyecto con este nombre.',
        ],
        'description' => [
            'max_length' => 'La descripción no debe exceder los 5000 caracteres.',
        ],
        'status' => [
            'in_list' => 'El estado del proyecto no es válido.',
        ]
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Si defines callbacks, irían aquí
    // protected $allowCallbacks       = true;
    // protected $beforeInsert         = [];
    // ...
}