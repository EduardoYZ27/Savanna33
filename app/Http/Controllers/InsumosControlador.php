<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use Illuminate\Http\Request;
use App\Models\UnidadMedidas;

class InsumosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insumos=Insumos::all();
        $unidadMedidas=UnidadMedidas::all();
        return view('insumos.index',compact('insumos','unidadMedidas'));
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
        $nombreExistente = Insumos::where('nombre', $request->input('nombre'))->exists();

        if ($nombreExistente) {
        // Si el nombre ya existe, redirecciona con un mensaje de error
        return redirect()->back()->withErrors(['nombre' => 'El insumo ya existe en la base de datos.'])->withInput();
    }

        $insumos=new Insumos;
        $insumos->nombre=$request->input('nombre');
        $insumos->descripcion=$request->input('descripcion');
        $insumos->ID_UnidadMedida=$request->input('ID_UnidadMedida');
        $insumos->save();
        return redirect()->back()->with('success', 'Insumo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumos $insumos)
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
    public function update(Request $request,$id)
    {
        $insumos=Insumos::find($id);
        $insumos->nombre=$request->input('nombre');
        $insumos->descripcion=$request->input('descripcion');
        $insumos->ID_UnidadMedida=$request->input('ID_UnidadMedida');
        $insumos->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $insumos=Insumos::find($id);
        $insumos->delete();
        return redirect()->back();
    }
}
