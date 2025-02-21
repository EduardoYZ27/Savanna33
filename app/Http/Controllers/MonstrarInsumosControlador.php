<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuPubControlador extends Controller
{
    public function index()
    {
        return view('../publico.menuPub');
    }
}
