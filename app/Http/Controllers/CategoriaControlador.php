<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria=Categoria::all();
        return view('categorias.index',compact('categoria'));
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
        // Validar si el nombre ya existe en la base de datos
        $nombreExistente = Categoria::where('nombre', $request->input('nombre'))->exists();

        if ($nombreExistente) {
        // Si el nombre ya existe, redirecciona con un mensaje de error
        return redirect()->back()->withErrors(['nombre' => 'El insumo ya existe en la base de datos.'])->withInput();
    }

        $categoria=new Categoria;
        $categoria->nombre=$request->input('nombre');
        $categoria->save();
        return redirect()->back()->with('success', 'Categoria creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
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
        $categoria=Categoria::find($id);
        $categoria->nombre=$request->input('nombre');
        $categoria->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();
        return redirect()->back();
    }
}
