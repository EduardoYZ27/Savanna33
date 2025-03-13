<?php

use Illuminate\Support\Facades\Route;
//Controladores del login
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\MenuControlador;
use App\Http\Controllers\VentaControlador;
use App\Http\Controllers\ComprasControlador;
use App\Http\Controllers\InsumosControlador;
use App\Http\Controllers\MenuPubControlador;
use App\Http\Controllers\PublicoControlador;
use App\Http\Controllers\EmpleadoControlador;
use App\Http\Controllers\CategoriaControlador;
use App\Http\Controllers\ProductosControlador;
use App\Http\Controllers\UbicacionControlador;
use App\Http\Controllers\InventarioControlador;
use App\Http\Controllers\InventarioInsumoControlador;
use App\Http\Controllers\UnidadMedidasControlador;
use App\Http\Controllers\InsumosComprasControlador;
use App\Http\Controllers\MostrarInsumosControlador;
use App\Http\Controllers\ProductosVentasControlador;
use App\Http\Controllers\InsumosProductosControlador;
use App\Http\Controllers\OrdenControlador;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\Auth\LoginController;
//Rutas Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para homeMenu
Route::middleware(['auth'])->group(function () {
    Route::get('/homeMenu', [HomeController::class, 'index'])->name('homeMenu');
});

// Rutas que no movi saludos
Route::resource('home', InsumosControlador::class);
Route::resource('homeInsumosCompras', InsumosComprasControlador::class);
Route::resource('homeCategorias', CategoriaControlador::class);
Route::resource('homeProductos', ProductosControlador::class);
Route::get('/mostrarInsumos/{id}', [ProductosControlador::class, 'mostrarInsumosForm'])->name('mostrarInsumosForm');
Route::resource('homeProductosVentas', ProductosVentasControlador::class);
Route::resource('homeInventario', InventarioControlador::class);
//Route::resource('inventarioInsumo',InventarioInsumoControlador::class);
Route::resource('homeInsumosProductos', InsumosProductosControlador::class);
Route::resource('homeProductos', ProductosControlador::class);
//Route::resource('homePublico', PublicoControlador::class);
Route::resource('homeMenuPub', MenuPubControlador::class);
Route::resource('homeUbicacion', UbicacionControlador::class);
Route::resource('homeUnidadMedidas', UnidadMedidasControlador::class);
Route::resource('homeVenta', VentaControlador::class);

Route::resource('homeOrden', OrdenControlador::class);
Route::get('homeOrdenControlPanel', [OrdenControlador::class, 'mostrarVista'])->name('orden.mostrar');
Route::post('homeOrdenCancelar', [OrdenControlador::class, 'cancelarOrden'])->name('homeOrden.cancelar');
Route::post('homeOrdenCobrarSeparado', [OrdenControlador::class, 'cobrarPorSeparado'])->name('homeOrden.cobrarPorSeparado');
Route::post('homeOrdenCobrarMesa', [OrdenControlador::class, 'cobrarMesa'])->name('homeOrden.cobrarMesa');

Route::post('/insumosproductos/store', [InsumosProductosControlador::class, 'store'])->name('insumosproductos.store');
Route::delete('/insumosproductos/{id}', [InsumosProductosControlador::class, 'destroy'])->name('insumosproductos.destroy');
Route::put('/editarInsumos/{id}', [InsumosProductosControlador::class, 'editarInsumos'])->name('editarInsumos');
//Route::resource('homeEmpleado', EmpleadoControlador::class);
Route::post('/habilitar-deshabilitar/{id}', [InsumosComprasControlador::class,'habilitarDeshabilitar'])->name('habilitarDeshabilitar');

Route::post('/homeInventario/inventarioInicial', [InventarioControlador::class, 'inventarioInicial'])->name('homeInventario.inventarioInicial');
Route::get('/homeInventario/totalComprasInsumo/{fecha}/{ID_Insumo}', [InventarioControlador::class, 'totalComprasInsumo'])->name('homeInventario.totalComprasInsumo');

// Ruta para mostrar la vista de órdenes
Route::get('/ordenes', [OrdenController::class, 'index'])->name('ordenes.index');

// Ruta para ver la orden de una mesa específica
Route::get('/ordenes/mesa1', function () {
    return view('Ordenes.darmesa');
})->name('ordenes.darmesa');


Route::get('/ventas', function () {
    return view('Ventas.ventas');
})->name('ventas');

Route::get('/registro', function () {
    return view('Registro.registro');
})->name('registro');
// Ruta para mostrar la vista de órdenes
Route::get('/ordenes', [OrdenController::class, 'index'])->name('ordenes.index');

// Ruta para ver la orden de una mesa específica
Route::get('/ordenes/mesa1', function () {
    return view('Ordenes.darmesa');
})->name('ordenes.darmesa');

Route::post('/orden/cobrar', [OrdenController::class, 'cobrarOrden'])->name('orden.cobrar');


