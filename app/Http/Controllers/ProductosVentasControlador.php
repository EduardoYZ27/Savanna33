<?php

namespace App\Http\Controllers;

use App\Models\ProductosVentas;
use App\Models\Productos;
use App\Models\Ventas;
use Illuminate\Http\Request;

class ProductosVentasControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productosVentas=ProductosVentas::all();
        $productos=Productos::all();
        $ventas=Ventas::all();
        return view('productosventas.index',compact('productosVentas','productos','ventas'));
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
        $productosVentas=new ProductosVentas;
        $productosVentas->cantidad=$request->input('cantidad');
        $productosVentas->precio=$request->input('precio');
        $productosVentas->ID_Producto=$request->input('ID_Producto');
        $productosVentas->ID_Venta=$request->input('ID_Venta');
        $productosVentas->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductosVentas $productosVentas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $productosVentas=ProductosVentas::find($id);
        $productosVentas->cantidad=$request->input('cantidad');
        $productosVentas->precio=$request->input('precio');
        $productosVentas->ID_Producto=$request->input('ID_Producto');
        $productosVentas->ID_Venta=$request->input('ID_Venta');
        $productosVentas->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productosVentas=ProductosVentas::find($id);
        $productosVentas->delete();
        return redirect()->back(); 
    }
}
