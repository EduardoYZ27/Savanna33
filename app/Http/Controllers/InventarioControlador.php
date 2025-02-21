<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Insumos;
use App\Models\InsumosCompras;
use App\Models\InsumosProductos;
use App\Models\UnidadMedidas;
use App\Models\Venta;
use App\Models\VentaProducto;
use App\Models\InventarioInsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventarioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('es');
    
        // Crear una instancia de Carbon y establecer la zona horaria
        $fechaActual = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');


        $idInventario = DB::table('inventario')
            ->where('estado', '=', 'Activo')
            ->value('id');
        $fechaInventarioActual = DB::table('inventario')
            ->where('estado', '=', 'Activo')
            ->value('fechaInventario');
        $idAntInventario = 0;
        if($fechaInventarioActual != null){
            $idAntInventario = DB::table('inventario')
                ->where('fechaInventario', '<=', $fechaInventarioActual)
                ->where('estado', '=', 'Terminado')
                ->orderBy('id', 'DESC')
                ->value('id');
        }
        

        $unidadMedidas=UnidadMedidas::all();
        $inventario=Inventario::all();
        $insumos=Insumos::all();
        $insumosCompras=InsumosCompras::all();
        $inventarioInsumos = InventarioInsumo::all();

        return view('inventario.index',compact('inventario','insumos','insumosCompras','unidadMedidas','idInventario','fechaInventarioActual','idAntInventario','fechaActual'));
    }

    public function inventarioInicial(Request $request)
    {
        $this->store();
        // Obtener el ID del inventario activo
        $idInventario = DB::table('inventario')
            ->where('estado', '=', 'Activo')
            ->value('id');

        // Obtener los datos del formulario
        $data = $request->all();

        // Iterar sobre los datos y guardar cada fila como un nuevo registro
        foreach ($data['ID_Insumo'] as $key => $ID_Insumo) {
            $inventarioInsumos = new InventarioInsumo;
            $inventarioInsumos->cantidadSistema = 0;
            $inventarioInsumos->cantidadFisica = $data['cantidadFisica'][$key];
            $inventarioInsumos->ID_UnidadMedida= $data['ID_UnidadMedida'][$key];
            $inventarioInsumos->ajuste = 'true';
            $inventarioInsumos->observaciones = '';
            $inventarioInsumos->ID_Insumo = $ID_Insumo;
            $inventarioInsumos->ID_Inventario = $idInventario;
            $inventarioInsumos->save();
        }
        $this->store();
        return redirect()->back()->with('success', 'Los datos se han guardado correctamente.');
    }

    //FUNCION PARA TRER LOS DATOS GUARDADOS DEL INVENTARIO ACTUAL
    public function getInventarioInsumo($ID_Inventario, $ID_Insumo)
    {
        $insumo = Insumos::where('id', $ID_Insumo)
            ->with('unidadMedida')  // Cargar la relación 'unidadMedida'
            ->first();

        $inventarioInsumo = InventarioInsumo::where('ID_Inventario', $ID_Inventario)
            ->where('ID_Insumo', $ID_Insumo)
            ->with('unidadMedida')  // Cargar la relación 'unidadMedida'
            ->first();

        if (!$inventarioInsumo) {
            // Crear un objeto con todos los campos establecidos en 0
            $inventarioInsumo = new InventarioInsumo([
                'cantidadSistema' => 0,
                'cantidadFisica' => 0,
                'ID_UnidadMedida' => $insumo->ID_UnidadMedida,
                'ajuste' => 'false',
                'observaciones' => '',
                'ID_Insumo' => $ID_Insumo,
                'ID_Inventario' => $ID_Inventario
            ]);

            // Asegúrate de que la relación 'unidadMedida' también esté establecida
            $inventarioInsumo->unidadMedida = new UnidadMedidas([
                'id' => $insumo->ID_UnidadMedida,
                'nombre' => $insumo->unidadMedida->nombre
            ]);
        }

        return $inventarioInsumo;
    }

    public function setInventarioInsumo($ID_Inventario,$ID_Insumo,$cantidadSistema,$ID_UnidadMedida)
    {
        $inventarioInsumo = DB::table('inventarioinsumos')
                            ->where('ID_Inventario', $ID_Inventario)
                            ->where('ID_Insumo', $ID_Insumo)
                            ->first();
        
        //EXISTE UN REGISTRO DEL INSUMO EN EL INVENTARIO
        if ($inventarioInsumo) {
            $this->updateInventarioInsumo($ID_Inventario,$ID_Insumo,$cantidadSistema,$ID_UnidadMedida);
        }
        //NO EXISTE UN REGISTRO DEL INSUMO EN EL INVENTARIO
        else{
            $this->storeInventarioInsumo($ID_Inventario,$ID_Insumo,$cantidadSistema,$ID_UnidadMedida);
        }               

    }

    public function storeInventarioInsumo($ID_Inventario,$ID_Insumo,$cantidadSistema,$ID_UnidadMedida)
    {
        $inventarioInsumos = new InventarioInsumo;
        $inventarioInsumos->cantidadSistema = $cantidadSistema;
        $inventarioInsumos->cantidadFisica = 0;
        $inventarioInsumos->ID_UnidadMedida= $ID_UnidadMedida;
        $inventarioInsumos->ajuste = 'false';
        $inventarioInsumos->observaciones = '';
        $inventarioInsumos->ID_Insumo = $ID_Insumo;
        $inventarioInsumos->ID_Inventario = $ID_Inventario;
        $inventarioInsumos->save();
    }

    public function updateInventarioInsumo($ID_Inventario, $ID_Insumo, $cantidadSistema, $ID_UnidadMedida)
    {
        $inventarioInsumos = InventarioInsumo::where('ID_Inventario', $ID_Inventario)
            ->where('ID_Insumo', $ID_Insumo)
            ->first();

        if ($inventarioInsumos) {
            $inventarioInsumos->cantidadSistema = $cantidadSistema;
            $inventarioInsumos->ID_UnidadMedida = $ID_UnidadMedida;
            $inventarioInsumos->update();
        }

        return redirect()->back();
    }

    //FUNCIONES PARA CONTABILIZAR INSUMOS
    public function totalConsumoInsumo($fecha, $ID_Insumo)
    {
        $arraySuma = [
            'cantidad' => 0,
            'ID_Unidad_Medida' => 0
        ];

        $ventas = Venta::where('fecha', '>=', $fecha)->get(); 

        foreach ($ventas as $venta) {
            $ventaProductos = VentaProducto::where('ID_Venta', $venta->id)->get();

            foreach ($ventaProductos as $ventaProducto) {
                $cantidadProducto = $ventaProducto->cantidad;

                $insumoProducto = InsumosProductos::where('ID_Producto', $ventaProducto->ID_Producto)
                    ->where('ID_Insumo', $ID_Insumo)
                    ->first();

                if ($insumoProducto) {
                    $consumoInsumo = $insumoProducto->cantidad - $insumoProducto->merma;
                    $consumoTotalInsumo = $cantidadProducto * $consumoInsumo;

                    $arrayConsulta = [
                        'cantidad' => $consumoTotalInsumo,
                        'ID_Unidad_Medida' => $insumoProducto->ID_UnidadMedida
                    ];

                    $arraySuma = $this->Suma($arraySuma, $arrayConsulta);
                }
            }
        }

        return $this->convertirUM($ID_Insumo, $arraySuma);
    }

    public function totalCantidadSistemaInsumo($cantidadUtilizada,$ID_Inventario,$fecha, $ID_Insumo)
    {
        $insumo = Insumos::where('id', $ID_Insumo)
            ->with('unidadMedida')  // Cargar la relación 'unidadMedida'
            ->first();

        // Paso 1: Declara un $arraysuma que contenga en la cantidad (posicion 0) la cantidad que será 0
        $arraySuma = [
            'cantidad' => 0,
            'ID_Unidad_Medida' => 0
        ];

        // Paso 2: Busca con una iteración las compras que sean mayor o igual a esa fecha
        $compras = DB::table('compras')
                    ->where('compras.fecha', '>=', $fecha)
                    ->pluck('id'); // Obtenemos los IDs de las compras
        foreach ($compras as $compraId) {
            // Paso 3: Obtenido ese id de la compra, busca si en insumoscompras existe un registro 
            // con el id de la compra y del insumo y si es así, trae la cantidad y el id de la unidad de medida
            $insumoCompra = DB::table('insumoscompras')
                            ->where('ID_Compra', $compraId)
                            ->where('ID_Insumo', $ID_Insumo)
                            ->first();

            if ($insumoCompra) {
                $arrayConsulta = [
                    'cantidad' => $insumoCompra->cantidad,
                    'ID_Unidad_Medida' => $insumoCompra->ID_UnidadMedida
                ];
                $arraySuma = $this->Suma($arraySuma, $arrayConsulta);
            }
        }

        $inventarioInsumo = DB::table('inventarioinsumos')
                            ->where('ID_Inventario', $ID_Inventario)
                            ->where('ID_Insumo', $ID_Insumo)
                            ->first();
        
        if ($inventarioInsumo) {
            if($inventarioInsumo->ajuste === 'true'){
                $arrayInventario = [
                    'cantidad' => $inventarioInsumo->cantidadFisica,
                    'ID_Unidad_Medida' => $inventarioInsumo->ID_UnidadMedida
                ];
            }
            else{
                $arrayInventario = [
                    'cantidad' => $inventarioInsumo->cantidadSistema,
                    'ID_Unidad_Medida' => $insumo->ID_UnidadMedida
                ];
            }
            $arraySuma = $this->Suma($arraySuma, $arrayInventario);
        }

        $arrayConsumo = [
            'cantidad' => $cantidadUtilizada,
            'ID_Unidad_Medida' => $insumo->ID_UnidadMedida
        ];

        $arraySuma = $this->Resta($arraySuma, $arrayConsumo);

        return $this->convertirUM($ID_Insumo,$arraySuma);
    }

    public function totalDirefencia($ID_Insumo,$cantidadSistema,$ID_UnidadMedida1, $cantidadFisica,$ID_UnidadMedida2)
    {
        $array1 = [
            'cantidad' => $cantidadFisica,
            'ID_Unidad_Medida' => $ID_UnidadMedida2
        ];
        $array2 = [
            'cantidad' => $cantidadSistema,
            'ID_Unidad_Medida' => $ID_UnidadMedida1
        ];
        

        $arraySuma = $this->Resta($array1, $array2);
        

        return $this->convertirUM($ID_Insumo,$arraySuma);
    }

    //FUNCIONES PARA HACER OPERACIONES CON LAS CANTIDADES
    public function Suma($arraySuma, $arrayConsulta)
    {
        // Definir un factor de conversión para cada unidad de medida a una unidad estándar
        $conversion = [
            0 => 0,      //null
            1 => 1000,   //'Kg'
            2 => 1,      //'g'
            3 => 1000,   //'L'
            4 => 1       //'ml'
        ];

        // Validar si el índice existe en el arreglo de conversion
        $conversionFactor = isset($conversion[$arrayConsulta['ID_Unidad_Medida']]) ? $conversion[$arrayConsulta['ID_Unidad_Medida']] : 0;

        $suma_total = ($arrayConsulta['cantidad'] * $conversionFactor) + ($arraySuma['cantidad'] * $conversionFactor);

        $array = [
            'cantidad' => $suma_total,
            'ID_Unidad_Medida' => 2
        ];

        return $array;
    }

    public function Resta($arraySuma, $arrayConsulta)
    {
        // Definir un factor de conversión para cada unidad de medida a una unidad estándar
        $conversion = [
            0 => 0,      //null
            1 => 1000,   //'Kg'
            2 => 1,      //'g'
            3 => 1000,   //'L'
            4 => 1       //'ml'
        ];

        // Validar si el índice existe en el arreglo de conversion
        $conversionFactor = isset($conversion[$arrayConsulta['ID_Unidad_Medida']]) ? $conversion[$arrayConsulta['ID_Unidad_Medida']] : 0;

        $resta_total = ($arraySuma['cantidad'] * $conversionFactor) - ($arrayConsulta['cantidad'] * $conversionFactor);

        $array = [
            'cantidad' => $resta_total,
            'ID_Unidad_Medida' => 2
        ];

        return $array;
    }

    public function convertirUM($ID_Insumo,$array)
    {
        // Definir un factor de conversión para cada unidad de medida a una unidad estándar
        $conversion = [
            1 => 1000,   //'Kg'
            2 => 1,      //'g'
            3 => 1000,   //'L'
            4 => 1       //'ml'
        ];

        $insumo = DB::table('insumos')->where('id', $ID_Insumo)->first();
        $cantidad = isset($conversion[$insumo->ID_UnidadMedida]) ? $conversion[$insumo->ID_UnidadMedida] : 1;

        $cant_convertida = $array['cantidad'] / $cantidad;
        
        return $cant_convertida;
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
    public function store()
    {
        DB::table('inventario')->update(['estado' => 'Terminado']);
        $inventario=new Inventario;

        Carbon::setLocale('es');
    
        // Crear una instancia de Carbon y establecer la zona horaria
        $fechaActual = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');

        $inventario->fechaInventario=$fechaActual;
        $inventario->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
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
    public function update(Request $request, $ID_Inventario)
    {
        $ID_Insumo = $request->input('ID_Insumo');
        $cantidadFisica = $request->input('cantidad');
        $ID_UnidadMedida = $request->input('ID_UnidadMedida');
        $ajuste = $request->input('ajuste');
        $observaciones = $request->input('observaciones');

        $inventarioInsumos = InventarioInsumo::where('ID_Inventario', $ID_Inventario)
            ->where('ID_Insumo', $ID_Insumo)
            ->first();

        if ($inventarioInsumos) {
            if($cantidadFisica != null) $inventarioInsumos->cantidadFisica = $cantidadFisica;
            if($ID_UnidadMedida != null) $inventarioInsumos->ID_UnidadMedida = $ID_UnidadMedida;
            if($ajuste != null) $inventarioInsumos->ajuste = $ajuste;
            if($observaciones != null) $inventarioInsumos->observaciones = $observaciones;
            $inventarioInsumos->update();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventario= Inventario::find($id);
        $inventario->delete();
        return redirect()->back();
    }
}
