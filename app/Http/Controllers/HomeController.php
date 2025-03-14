<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Constructor para aplicar el middleware de autenticación
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el dashboard de la aplicación
     */
    public function index()
    {
        return view('menu.index'); // Sin '../', Laravel busca automáticamente en resources/views/
    }
    public function trabajador()
{
    return view('trabajador.index'); // Asegúrate de que el nombre coincida con el archivo en resources/views/
}
}
