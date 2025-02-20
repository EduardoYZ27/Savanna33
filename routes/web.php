<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;

 /*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register web routes for your application. These
 | routes are loaded by the RouteServiceProvider and all of them will
 | be assigned to the "web" middleware group. Make something great!
 |
 */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('categorias', CategoriaController::class);

// Ruta para la vista inicio
Route::get('/inicio', function () {
    return view('Inicio.inicio');
})->name('inicio');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/ventas', function () {
    return view('Ventas.ventas');
})->name('ventas');

Route::get('/registro', function () {
    return view('Registro.registro');
})->name('registro');