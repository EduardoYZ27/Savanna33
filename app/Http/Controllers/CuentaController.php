<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;


class CuentaController extends Controller
{
    public function abrirCuenta($mesaId)
    {
        $mesa = Mesa::findOrFail($mesaId);

        if ($mesa->cuenta) {
            return response()->json(['message' => 'La mesa ya tiene una cuenta abierta'], 400);
        }

        $cuenta = Cuenta::create(['mesa_id' => $mesaId]);
        $mesa->update(['estado' => 'Ocupada']);

        return response()->json(['message' => 'Cuenta abierta', 'cuenta' => $cuenta]);
    }

    public function agregarProducto($mesaId, Request $request)
    {
        $mesa = Mesa::findOrFail($mesaId);
        $cuenta = $mesa->cuenta;

        if (!$cuenta) {
            return response()->json(['message' => 'La mesa no tiene una cuenta abierta'], 400);
        }

        $detalle = CuentaDetalle::create([
            'cuenta_id' => $cuenta->id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio,
            'subtotal' => $request->cantidad * $request->precio
        ]);

        return response()->json(['message' => 'Producto agregado', 'detalle' => $detalle]);
    }

    public function cerrarCuenta($mesaId)
    {
        $mesa = Mesa::findOrFail($mesaId);
        $cuenta = $mesa->cuenta;

        if (!$cuenta) {
            return response()->json(['message' => 'No hay cuenta abierta para esta mesa'], 400);
        }

        $total = $cuenta->detalles()->sum('subtotal');

        $cuenta->update([
            'estado' => 'Pagada',
            'fecha_cierre' => now(),
            'total' => $total
        ]);

        $mesa->update(['estado' => 'Disponible']);

        return response()->json(['message' => 'Cuenta cerrada', 'total' => $total]);
    }

    public function listarCuentasAbiertas()
    {
        $cuentas = Cuenta::where('estado', 'Abierta')->with('mesa')->get();
        return view('cuentas.index', compact('cuentas'));
    }
}