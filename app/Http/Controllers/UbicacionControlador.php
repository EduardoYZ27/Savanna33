<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UbicacionControlador extends Controller
{
    public function index()
    {
        return view('../publico.ubicacion');
    }
}
