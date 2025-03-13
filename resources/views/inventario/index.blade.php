@extends('layouts/homeInventario')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Inventario/homeInventario.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="{{ url('homeOrden') }}"><i class="fa fa-shopping-cart"></i> Órdenes</a>
        <a href="{{ url('homeVenta') }}"><i class="fa fa-dollar"></i> Ventas</a>
        <a href="{{ url('home') }}"><i class="fa fa-archive"></i> Insumos</a>
        <a href="{{ url('homeProductos') }}"><i class="fa fa-cubes"></i> Productos</a>
        <a href="{{ url('homeCategorias') }}"><i class="fa fa-tags"></i> Categorías</a>
        <a href="{{ url('homeUnidadMedidas') }}"><i class="fa fa-balance-scale"></i> Unidades de medida</a> 
    </div>
</header>

<h3 class="title">ADMINISTRA TU INVENTARIO</h3>

<div class="container">

    <!-- Botón para regresar -->
    <a href="{{url('homeMenu')}}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>

    @if ($idInventario == null)
        <!-- Botón para agregar -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createInventarioInicial">
            GENERAR UN INVENTARIO INICIAL
        </button>
    @else
        <!-- Botón para agregar -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNuevoInventario">
            GENERAR NUEVO INVENTARIO
        </button>
    @endif

    @include('inventario.create')

    <br><br>

    @if ($idInventario == null)
        <br><br><br>
        <h3>NO HAY UN INVENTARIO CREADO, GENERE POR FAVOR UN INVENTARIO INICIAL</h3>            
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>INSUMO</th>
                        <th>CANTIDAD UTILIZADA</th>
                        <th>CANTIDAD SISTEMA</th>
                        <th>CANTIDAD FÍSICA</th>
                        <th>DIFERENCIA</th>
                        <th>AJUSTE</th>
                        <th>OBSERVACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($insumos as $insumo)
                        @php
                            $inventarioInsumo = (new \App\Http\Controllers\InventarioControlador)->getInventarioInsumo($idInventario, $insumo->id);
                        @endphp
                        <tr>
                            <td> {{$insumo->nombre}} </td>
                            <td>
                                @php
                                    $cantidadUtilizada = (new \App\Http\Controllers\InventarioControlador)->totalConsumoInsumo($fechaInventarioActual, $insumo->id);
                                    echo $cantidadUtilizada.' '.$insumo->unidadMedida->nombre;
                                @endphp
                            </td> 
                            <td> 
                                @php
                                    $cantidadSistema = (new \App\Http\Controllers\InventarioControlador)->totalCantidadSistemaInsumo($cantidadUtilizada, $idAntInventario, $fechaInventarioActual, $insumo->id);
                                    echo $cantidadSistema.' '.$insumo->unidadMedida->nombre;
                                @endphp
                            </td>
                            <td>
                                @php
                                    $cantidadFisica=$inventarioInsumo->cantidadFisica;
                                    echo $cantidadFisica.' '.$inventarioInsumo->unidadMedida->nombre;
                                @endphp

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editCantFis{{$insumo->id}}"> </button>
                            </td>
                            <td> 
                                @php
                                    $diferencia = (new \App\Http\Controllers\InventarioControlador)->totalDirefencia($insumo->id, $cantidadSistema, $insumo->ID_UnidadMedida, $cantidadFisica, $inventarioInsumo->ID_UnidadMedida);
                                    echo $diferencia.' '.$insumo->unidadMedida->nombre;
                                @endphp
                            </td>
                            <td>
                                <input style="cursor: pointer; width: 30px; height:30px;" type="checkbox" id="{{$insumo->id}}" name="ajuste" class="cbox form-check-input" {{ $inventarioInsumo->ajuste === 'true' ? 'checked' : '' }}/>
                            </td>
                            <td>
                                @php
                                    echo $inventarioInsumo->observaciones;
                                @endphp
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editObs{{$insumo->id}}"> </button>
                            </td>
                        </tr>
                        @include('inventario.info')
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
