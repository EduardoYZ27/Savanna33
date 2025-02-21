<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Productos;
use App\Models\OrdenProductos;
use App\Models\Venta;
use App\Models\VentaProducto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdenControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('orden.index');
    }
    public function mostrarVista(Request $request)
    {
        $numero = $request->get('numero', null);
        $productos = Productos::all();


        $ordenes = Orden::where('NoConsumo', $numero)
        ->where('estado', 'En preparacion')
        ->get();

        $ordenProductos = OrdenProductos::all();
        
        return view('orden.create',compact('numero','productos','ordenes','ordenProductos'));
        
    }
    
    //FUNCIONES PARA CREAR REGISTROS
    private function storeOrden($con){
        $orden = new Orden;
        $orden->NoConsumo = $con;
        $orden->save();
    }
    private function storeVenta($NoConsumo,$precioVenta){
        Carbon::setLocale('es');
    
        // Crear una instancia de Carbon y establecer la zona horaria
        $fechaActual = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');

        $venta = new Venta;
        $venta->NoConsumo = $NoConsumo;
        $venta->precioVenta = $precioVenta;
        $venta->fecha = $fechaActual;
        $venta->save();
    }



    //FUNCIONES PARA TRABAJAR CON LAS ORDENES EN CONJUNTO POR MESA
    public function getTotalMesa($NoConsumo)
    {
        $totalMesa = 0.0;

        $ordenes = Orden::where('NoConsumo', $NoConsumo)->get();

        foreach ($ordenes as $orden) {
            $ID_Orden = $orden->id;
            
            $ordenProductos = OrdenProductos::where('ID_Orden', $ID_Orden)
            ->get();

            foreach ($ordenProductos as $ordenProducto) {
                $precioProducto = Productos::where('id', $ordenProducto->ID_Producto)
                    ->value('precio'); 

                $subtotal = $precioProducto * $ordenProducto->cantidad;
                $totalMesa += $subtotal;
            }
        }

            
        return $totalMesa;
    }
    public function cobrarMesa(Request $request)
    {
        $NoConsumo = $request->input('NoConsumo');
        $precioVenta = $request->input('precioVenta');

        $this->storeVenta($NoConsumo,$precioVenta);
        $ID_Venta = Venta::orderBy('id', 'DESC')->value('id');

        // Buscar todas las órdenes donde NoConsumo = $NoConsumo
        $ordenes = Orden::where('NoConsumo', $NoConsumo)->get();

        foreach ($ordenes as $orden) {
            $ID_Orden = $orden->id;

            $ordenProductos = OrdenProductos::where('ID_Orden', $ID_Orden)->get();

            foreach ($ordenProductos as $ordenProducto) {
                $ventaProducto = new VentaProducto;
                $ventaProducto->cantidad = $ordenProducto->cantidad;
                $ventaProducto->ID_Producto = $ordenProducto->ID_Producto;
                $ventaProducto->ID_Venta = $ID_Venta;
                $ventaProducto->save();
            }

            // Actualizar el estado de la orden a 'Entregada'
            Orden::where('id', $ID_Orden)->update(['estado' => 'Entregada']);
        }

        // Eliminar órdenes con estado 'Entregada' y 'Cancelada'
        Orden::whereIn('estado', ['Entregada', 'Cancelada'])->delete();

        return redirect()->back()->with('success', 'Los datos se han guardado correctamente.');
    }

    //FUNCIONES PARA TRABAJAR CON DATOS DE LAS ORDENES POR SEPARADO
    public function getTotalOrden($ID_Orden)
    {
        $totalOrden = 0.0;

        $ordenProductos = OrdenProductos::where('ID_Orden', $ID_Orden)
        ->get();

        foreach ($ordenProductos as $ordenProducto) {
            $precioProducto = Productos::where('id', $ordenProducto->ID_Producto)
                ->value('precio'); 

            $subtotal = $precioProducto * $ordenProducto->cantidad;
            $totalOrden += $subtotal;
        }
        return $totalOrden;
    }
    public function cancelarOrden(Request $request){
        $ID_Orden = $request->input('ID_Orden');

        $orden = Orden::where('id', $ID_Orden)
            ->first();

        if ($orden) {
            $orden->estado = 'Cancelada';
            $orden->update();
        }

        return redirect()->back();

    }
    public function cobrarPorSeparado(Request $request)
    {
        $NoConsumo = $request->input('NoConsumo');
        $ID_Orden = $request->input('ID_Orden');
        $precioVenta = $request->input('precioVenta');

        $this->storeVenta($NoConsumo,$precioVenta);
        $ID_Venta = Venta::orderBy('id', 'DESC')->value('id');

        $ordenProductos = OrdenProductos::where('ID_Orden', $ID_Orden)
        ->get();

        foreach ($ordenProductos as $ordenProducto) {
            $ventaProducto = new VentaProducto;
            $ventaProducto->cantidad = $ordenProducto->cantidad;
            $ventaProducto->ID_Producto = $ordenProducto->ID_Producto;
            $ventaProducto->ID_Venta = $ID_Venta;
            $ventaProducto->save();
        }
        Orden::where('id', $ID_Orden)
            ->update(['estado' => 'Entregada']);
        
        Orden::where('id', $ID_Orden)
        ->where('estado', 'Entregada')
        ->delete();
        
        return redirect()->back()->with('success', 'Los datos se han guardado correctamente.');
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
        $NoConsumo = $request->input('NoConsumo');

        $this->storeOrden($NoConsumo);
        
        // Obtener el ID del inventario activo
        $ID_Orden = Orden::where('NoConsumo', $NoConsumo)
            ->orderBy('id', 'DESC')
            ->value('id');

        // Obtener los datos del formulario
        $data = $request->all();

        // Iterar sobre los datos y guardar cada fila como un nuevo registro
        foreach ($data['ID_Producto'] as $key => $ID_Producto) {
            $ordenProducto = new OrdenProductos;
            $ordenProducto->cantidad = $data['cantidad'][$key];
            $ordenProducto->detalleAdicional = ($data['detalleAdicional'][$key] != null) ? $data['detalleAdicional'][$key] : '';
            $ordenProducto->ID_Orden = $ID_Orden;
            $ordenProducto->ID_Producto = $ID_Producto;
            $ordenProducto->save();
        }
        return redirect()->back()->with('success', 'Los datos se han guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
