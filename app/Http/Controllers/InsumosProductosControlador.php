<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use App\Models\Categoria;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\UnidadMedidas;
use App\Models\InsumosProductos;
use Illuminate\Support\Facades\DB;

class InsumosProductosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validación de los datos del formulario
    $request->validate([
        'ID_Producto' => 'required',
        'ID_Insumo' => 'required|array',
        'cantidad' => 'required|array',
        'merma' => 'required|array',
        'ID_UnidadMedida' => 'required|array',
    ]);

    // Otros datos del formulario...
    $idProducto = $request->input('ID_Producto');
    $idInsumos = $request->input('ID_Insumo');
    $cantidades = $request->input('cantidad');
    $merma = $request->input('merma');
    $idUnidadesMedida = $request->input('ID_UnidadMedida');

    // Obtener el valor de ID_Categoria a través del modelo Productos
    $idCategoria = Productos::find($idProducto)->categoria->id;

    // Iterar sobre los arrays de entrada y crear un nuevo registro para cada conjunto de datos
    foreach ($idInsumos as $key => $idInsumo) {
        InsumosProductos::create([
            'ID_Insumo' => $idInsumo,
            'cantidad' => $cantidades[$key],
            'merma' => $merma[$key],
            'ID_UnidadMedida' => $idUnidadesMedida[$key],
            'ID_Producto' => $idProducto,
            'ID_Categoria' => $idCategoria,
        ]);
    }

    return redirect()->back()->with('success', 'Insumos agregados exitosamente');

    }
    



    public function editarInsumos(Request $request, $id)
    {
       
         // Validaciones de formulario
    $request->validate([
        'cantidad' => 'numeric|nullable',
        'merma' => 'numeric|nullable',
        'insumo' => 'exists:insumos,id',
        'unidadMedida' => 'exists:unidadmedidas,id',
    ]);

    try {
        // Obtén el insumo con sus relaciones
        $insumo = InsumosProductos::with('insumo', 'unidadMedida')->findOrFail($id);

        // Actualiza los campos del insumo
        $insumo->update([
            'cantidad' => $request->input('cantidad'),
            'merma' => $request->input('merma'),
            'ID_Insumo' => $request->input('insumo'),
            'ID_UnidadMedida' => $request->input('unidadMedida'),
        ]);

        return redirect()->back()->with('success', 'Insumos actualizados correctamente');
    } catch (\Exception $e) {
        // Manejar cualquier excepción que pueda ocurrir durante la actualización
        return redirect()->back()->with('error', 'Error al actualizar los insumos: ' . $e->getMessage());
    }
    }
    


public function mostrarVistaEditarInsumos($id)
{
   
}
    

    /**
     * Display the specified resource.
     */
    public function show(InsumosProductos $insumosProductos)
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
        
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
       // Buscar el insumoProducto por su ID
    $insumosProductos = InsumosProductos::find($id);

    // Verificar si el insumoProducto existe
    if ($insumosProductos) {
        // Si existe, eliminarlo
        $insumosProductos->delete();
        return redirect()->back()->with('success', 'Insumo eliminado correctamente.');
    } else {
        // Si no existe, redirigir con un mensaje de error
        return redirect()->back()->with('error', 'No se pudo encontrar el insumo para eliminar.');
    }

    }
}
