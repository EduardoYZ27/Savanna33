<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedidas;
use Illuminate\Http\Request;

class UnidadMedidasControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidadMedidas=UnidadMedidas::all();
        return view('../unidadmedidas.index',compact('unidadMedidas'));
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
        $nombreExistente = UnidadMedidas::where('nombre', $request->input('nombre'))->exists();

        if ($nombreExistente) {
        // Si el nombre ya existe, redirecciona con un mensaje de error
        return redirect()->back()->withErrors(['nombre' => 'El insumo ya existe en la base de datos.'])->withInput();
    }

        $unidadMedidas=new UnidadMedidas;
        $unidadMedidas->nombre=$request->input('nombre');
        $unidadMedidas->save();
        return redirect()->back()->with('success', 'Insumo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadMedidas $unidadMedidas)
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
        $unidadMedidas=UnidadMedidas::find($id);
        $unidadMedidas->nombre=$request->input('nombre');
        $unidadMedidas->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unidadMedidas=UnidadMedidas::find($id);
        $unidadMedidas->delete();
        return redirect()->back();
    }
}
