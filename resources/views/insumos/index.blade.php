@extends('layouts/home')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Insumos/homeInsumos.css') }}">
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

<h3 class="title">ADMINISTRA TUS INSUMOS</h3>

<div class="container">

    <!-- Botón para regresar -->
    <a href="{{url('homeMenu')}}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>
        
    <!-- Botón para agregar insumo -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
        AGREGAR INSUMO
    </button>
        
    <br><br>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>UNIDAD DE MEDIDA</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($insumos as $insumos)
                    <tr>
                        <td> {{$insumos->nombre}} </td>
                        <td> {{$insumos->descripcion}} </td>
                        <td> {{$insumos->unidadMedida->nombre}} </td>
                        <td> {{$insumos->estado}} </td>
                        <td>
                            @if($insumos->estado != 'Deshabilitado')
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$insumos->id}}">
                                    EDITAR
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$insumos->id}}">
                                    ELIMINAR
                                </button>
                            @endif
                        </td>
                    </tr>
                    @include('insumos.info')
                @endforeach
            </tbody>
        </table>
    </div>

    @include('insumos.create')
</div>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
