@extends('layouts/home')

@section('content')
<div style="padding: 20px;">
    <br><br>
    @if ($numero < 9)
        <h3>ORDENES DE LA MESA {{$numero}}</h3>
    @else
        <h3>ORDENES PARA LLEVAR</h3>
    @endif
    <br>
        <!-- Boton para regresar -->
    <a href="{{ url('homeOrden') }}">
        <img class="img-atras" src="{{ asset('imagenes/atras.png') }}">
    </a>

    <!-- Boton para agregar -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createOrden">
        AGREGAR NUEVA ORDEN
    </button>
    @php
    $totalMesa = 0.00;
        if($numero < 9){
            if(count($ordenes) > 0){
                $totalMesa = (new \App\Http\Controllers\OrdenControlador)->getTotalMesa($numero);
                echo '<a class="btn btn-primary" data-toggle="modal" data-target="#cobrarMesa'.$numero.'">COBRAR TODAS LAS ORDENES</a>';
            }
        }
    @endphp
    @include('orden.createorden')

    <br><br>
<div class="row">
    @foreach ($ordenes as $orden)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">ORDEN NO. {{$orden->id}}</h4>
                    <br>
                    <div class="table-responsive" style="height:250px; max-height: 250px;">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th class="col-md-4" scope="col">PRODUCTO</th>
                                    <th class="col-md-2" scope="col">CANTIDAD</th>
                                    <th class="col-md-6" scope="col">DETALLES ADICIONALES</th>
                                </tr>
                            </thead>
                            
                                @foreach ($ordenProductos as $ordenProducto)
                                    @if ($orden->id == $ordenProducto->ID_Orden)
                                    <tbody class="text-center">
                                        <td class="col-md-4" scope="col">{{$ordenProducto->Producto->nombre}}</th>
                                        <td class="col-md-2" scope="col">{{$ordenProducto->cantidad}}</th>
                                        <td class="col-md-6" scope="col">{{$ordenProducto->detalleAdicional}}</th>
                                    </tbody>
                                    @endif
                                @endforeach
                                <tbody class="text-center">
                                    <th class="col-md-4" scope="col">TOTAL</th>
                                    <th class="col-md-2" scope="col"></th>
                                    <th class="col-md-6 text-end" scope="col">
                                        @php
                                            $total = (new \App\Http\Controllers\OrdenControlador)->getTotalOrden($orden->id);
                                            echo '$ '.$total;
                                        @endphp
                                    </th>
                                </tbody>
                        </table>
                    </div>
                    <br>
                    <a class="btn btn-danger" data-toggle="modal" data-target="#cancelarOrden{{$orden->id}}">Cancelar orden</a>

                    @if ($numero < 9)
                        <a class="btn btn-primary" data-toggle="modal" data-target="#cobrarseparado{{$orden->id}}">Cobrar por separado</a>
                    @else
                        <a class="btn btn-primary" data-toggle="modal" data-target="#cobrarseparado{{$orden->id}}">Cobrar</a>
                    @endif
                </div>
            </div>
        </div>
        @include('orden.info')
    @endforeach
    
</div>
    

</div>
@endsection