<?php

namespace App\Controllers;

use App\Controllers\BaseController; // O CodeIgniter\Controller

class Home extends BaseController // O extiende CodeIgniter\Controller
{
    public function index(): string
    {
        $user = auth()->user(); // Obtiene el usuario autenticado (objeto de Shield)

        if ($user) {
            // Si el usuario está logueado, cargamos una vista de dashboard simple
            $data['user'] = $user; // Pasar el usuario a la vista
            return view('dashboard', $data);
        } else {
            // Si no está logueado, mostrar la página de bienvenida por defecto
            return view('welcome_message'); // Vista original de CI4
        }
    }
}