@extends('layouts/homeUnidadMedidas')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/UnidadMedidas/homeUnidadMedidas.css') }}">
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

<h3 class="title">ADMINISTRA TUS UNIDADES DE MEDIDA</h3>

<div class="container">

    <!-- Botón para regresar -->
    <a href="{{url('homeMenu')}}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>
        
    <!-- Botón para agregar unidad de medida -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
        AGREGAR UNIDAD DE MEDIDA
    </button>
        
    <br><br>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NOMBRE DE LA UNIDAD</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($unidadMedidas as $unidadMedidas)
                    <tr>
                        <td> {{$unidadMedidas->nombre}} </td>
                        <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$unidadMedidas->id}}">
                                EDITAR
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$unidadMedidas->id}}">
                                ELIMINAR
                            </button>
                        </td>
                    </tr>
                    @include('unidadmedidas.info')
                @endforeach
            </tbody>
        </table>
    </div>

    @include('unidadmedidas.create')
</div>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
