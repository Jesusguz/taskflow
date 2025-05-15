<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        // Define las columnas para la tabla 'projects'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT', // Tipo de dato entero
                'constraint'     => 11,    // Longitud del entero (común para IDs)
                'unsigned'       => true,  // Asegura que solo sean números positivos
                'auto_increment' => true,  // Se autoincrementa con cada nuevo registro
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true, // Permitimos que sea NULL en caso de que necesitemos proyectos sin un usuario asignado inicialmente
            ],
            'name' => [
                'type'       => 'VARCHAR', // Tipo de dato cadena de caracteres
                'constraint' => '255',     // Longitud máxima de la cadena
                'unique'     => true,      // Cada nombre de proyecto debe ser único en la tabla
            ],
            'description' => [
                'type' => 'TEXT', // Tipo de dato para texto largo
                'null' => true,   // La descripción es opcional
            ],
            'status' => [
                'type'       => 'ENUM',     // Tipo de dato que acepta solo valores de una lista
                'constraint' => ['open', 'closed', 'on hold', 'cancelled'], // Los posibles estados del proyecto
                'default'    => 'open',     // El estado por defecto al crear un proyecto
            ],
            'created_at' => [
                'type' => 'DATETIME', // Marca de tiempo para la creación del registro
                'null' => true,       // Permitir NULL inicialmente (CodeIgniter lo llenará)
            ],
            'updated_at' => [
                'type' => 'DATETIME', // Marca de tiempo para la última actualización
                'null' => true,       // Permitir NULL inicialmente (CodeIgniter lo llenará)
            ],
            'deleted_at' => [
                'type' => 'DATETIME', // Marca de tiempo para el soft delete
                'null' => true,       // Será NULL si el registro no está 'eliminado'
            ],
        ]);

        // Establece 'id' como la clave primaria de la tabla
        $this->forge->addKey('id', true);

        // Opcional: Añadir una clave foránea. La relación user_id con la tabla users.
        // Esto asegura integridad referencial. Puedes descomentar esto si quieres la FK.
        // Asegúrate de que tu tabla 'users' (creada por Shield) se llama 'users' y el PK es 'id'.
        // $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
        // CASCADE: Si se elimina un usuario, ¿qué pasa con sus proyectos? CASCADE eliminaría los proyectos.
        // SET NULL: Si se elimina un usuario, el 'user_id' en los proyectos de ese usuario se pondría a NULL.
        // SET NULL es más seguro para no perder datos de proyectos si eliminas un usuario.

        // Crea la tabla con el nombre 'projects'
        $this->forge->createTable('projects');
    }

    public function down()
    {
        // En caso de deshacer la migración, elimina la tabla 'projects'
        $this->forge->dropTable('projects');
    }
}
