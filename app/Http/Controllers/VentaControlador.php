<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\VentaProducto;
use Illuminate\Http\Request;

class VentaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventaproductos = VentaProducto::all();
        $ventas = Venta::all();
        return view('ventas.index',compact('ventas','ventaproductos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
