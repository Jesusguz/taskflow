<?php

namespace App\Controllers;

use App\Controllers\BaseController; // O CodeIgniter\Controller
use App\Models\ProjectModel;
use CodeIgniter\HTTP\ResponseInterface; // Para tipos de retorno

class ProjectController extends BaseController // O extiende CodeIgniter\Controller
{
    // Muestra la lista de proyectos del usuario autenticado
    public function index()
    {
        $user = auth()->user(); // Obtiene el usuario de Shield

        if (!$user) {
            // Esto no debería pasar si el filtro 'session' está activo, pero es buena práctica
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        $projectModel = new ProjectModel();

        // Obtener SÓLO los proyectos donde el user_id coincide con el del usuario logueado
        $data['projects'] = $projectModel->where('user_id', $user->id)->findAll();

        return view('projects/index', $data);
    }

    // Muestra el formulario para crear un nuevo proyecto
    public function create()
    {
        // Cargar el servicio de validación para poder mostrar errores en la vista
        $data['validation'] = \Config\Services::validation();

        return view('projects/create', $data);
    }

    // Procesa los datos enviados desde el formulario de creación y guarda el proyecto
    public function store()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->back(); // O un 405 Method Not Allowed
        }

        $user = auth()->user();
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        $projectModel = new ProjectModel();

        // Obtener solo los campos permitidos del POST request
        $data = $this->request->getPost(['name', 'description', 'status']);

        // Asignar el ID del usuario autenticado al proyecto
        $data['user_id'] = $user->id;
        // Si el status no viene, asignamos el valor por defecto 'open'
        $data['status'] = $data['status'] ?? 'open';


        // Validar los datos usando las reglas definidas en el modelo
        if (! $projectModel->validate($data)) {
            // Si la validación falla, redirigir de vuelta al formulario con errores y datos antiguos
            return redirect()->back()->withInput()->with('errors', $projectModel->errors());
        }

        // Si la validación pasa, intentar insertar el proyecto en la BD
        if ($projectModel->insert($data)) {
            // Redirigir a la lista de proyectos con un mensaje de éxito
            return redirect()->to('/projects')->with('success', 'Proyecto creado exitosamente.');
        } else {
            // Esto debería ser raro si la validación pasó y no hay otros problemas de BD
            return redirect()->back()->withInput()->with('error', 'No se pudo crear el proyecto. Inténtalo de nuevo.');
        }
    }

    // TODO: En futuros pasos implementaremos los métodos:
    // public function show($id) {} // Mostrar detalles de un proyecto
    // public function edit($id) {} // Mostrar formulario de edición
    // public function update($id) {} // Procesar formulario de edición
    // public function delete($id) {} // Eliminar un proyecto (soft delete)
}