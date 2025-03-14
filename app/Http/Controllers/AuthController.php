<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('homeMenu');
        }

        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'password' => 'required',
        ], [
            'number.required' => 'El número de empleado es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $usuario = Usuario::where('numero_empleado', $request->number)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['message' => 'Número de empleado o contraseña incorrectos']);
        }

        Auth::login($usuario, $request->has('remember'));

        // Redirige según el rol
        if ($usuario->rol === 'Admin') {
            return redirect()->route('homeMenu');
        } else {
            return redirect()->route('homeTrabajador');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}