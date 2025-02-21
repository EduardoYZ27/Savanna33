<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use App\Models\Categoria;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\UnidadMedidas;
use App\Models\InsumosProductos;

class ProductosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos=Productos::all();
        $categoria=Categoria::all();
        $insumo=Insumos::all();
        $unidadMedida = UnidadMedidas::all();
        return view('productos.index',compact('productos','categoria','insumo','unidadMedida'));
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
        $productos=new Productos;
        $productos->nombre=$request->input('nombre');
        $productos->precio=$request->input('precio');
        $productos->ID_Categoria=$request->input('ID_Categoria');
        $productos->save();
        return redirect()->back()->with('success', 'Categoria creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $productos)
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
        $productos=Productos::find($id);
        $productos->nombre=$request->input('nombre');
        $productos->precio=$request->input('precio');
        $productos->ID_Categoria=$request->input('ID_Categoria');
        $productos->update();
        return redirect()->back()->with('success', 'Categoria creado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar registros relacionados en la tabla insumosproductos
    InsumosProductos::where('ID_Producto', $id)->delete();

    // Eliminar el producto
    $productos = Productos::find($id);
    $productos->delete();

    return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }
}
