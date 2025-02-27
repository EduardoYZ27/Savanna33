@extends('layouts/home')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Ordenes/homeOrdenes.css') }}">
</head>

<header>
    <img src="{{ asset('imagenes/fondo.jpg') }}" alt="Logo SAVANNA" class="logo">
    <div class="header-text">
        <h1>SAVANNA</h1>
        <p>¡En precio y calidad somos la mejor opción!</p>
    </div>
    <nav>
        <button class="menu-button" id="menuToggle">&#9776;</button>
    </nav>

    <!-- Menú desplegable -->
    <div class="menu-card-sec" id="menuPrincipal-sec">
        <a href="javascript:void()" onclick="closeMenu()"></a>
        <a href="{{ url('homeMenu') }}"><i class="fa fa-home"></i> Inicio</a>
        <a href="{{ url('homeInsumosCompras') }}"><i class="fa fa-shopping-cart"></i> Compras</a>
        <a href="{{ url('homeInventario') }}"><i class="fa fa-list-alt"></i> Inventario</a>
        <a href="{{ url('homeOrden') }}"><i class="fa fa-dollar"></i> Órdenes</a>
        <a href="{{ url('homeVenta') }}"><i class="fa fa-dollar"></i> Ventas</a>
        <a href="{{ url('home') }}"><i class="fa fa-archive"></i> Insumos</a>
        <a href="{{ url('homeProductos') }}"><i class="fa fa-cubes"></i> Productos</a>
        <a href="{{ url('homeCategorias') }}"><i class="fa fa-tags"></i> Categorías</a>
        <a href="{{ url('homeUnidadMedidas') }}"><i class="fa fa-balance-scale"></i> Unidades de medida</a>
    </div>
</header>

<div class="container">
    <h3 class="title">
        @if ($numero < 9)
            ORDENES DE LA MESA {{$numero}}
        @else
            ORDENES PARA LLEVAR
        @endif
    </h3>

    <!-- Botón para regresar -->
    <a href="{{ url('homeOrden') }}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>

    <!-- Botón para agregar orden -->
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

    <div class="orders">
        @foreach ($ordenes as $orden)
            <div class="order-card">
                <h4 class="card-title text-center">ORDEN NO. {{$orden->id}}</h4>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>DETALLES ADICIONALES</th>
                            </tr>
                        </thead>
                        @foreach ($ordenProductos as $ordenProducto)
                            @if ($orden->id == $ordenProducto->ID_Orden)
                                <tbody class="text-center">
                                    <td>{{$ordenProducto->Producto->nombre}}</td>
                                    <td>{{$ordenProducto->cantidad}}</td>
                                    <td>{{$ordenProducto->detalleAdicional}}</td>
                                </tbody>
                            @endif
                        @endforeach
                        <tbody class="text-center">
                            <th>TOTAL</th>
                            <th></th>
                            <th class="text-end">
                                @php
                                    $total = (new \App\Http\Controllers\OrdenControlador)->getTotalOrden($orden->id);
                                    echo '$ '.$total;
                                @endphp
                            </th>
                        </tbody>
                    </table>
                </div>

                <a class="btn btn-danger" data-toggle="modal" data-target="#cancelarOrden{{$orden->id}}">Cancelar orden</a>

                @if ($numero < 9)
                    <a class="btn btn-primary" data-toggle="modal" data-target="#cobrarseparado{{$orden->id}}">Cobrar por separado</a>
                @else
                    <a class="btn btn-primary" data-toggle="modal" data-target="#cobrarseparado{{$orden->id}}">Cobrar</a>
                @endif
            </div>
            @include('orden.info')
        @endforeach
    </div>
</div>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
