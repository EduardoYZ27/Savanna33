@extends('layouts.homeMenu')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Menu/Inicio.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<header>
    <img src="{{ asset('imagenes/fondo.jpg') }}" alt="Logo SAVANNA" class="logo">
    <div class="header-text">
        <h1>SAVANNA 33</h1>
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

<main>
    <h2>Restaurante-bar</h2>
    <h3>Selecciones más frecuentes</h3>

    <div class="row">
        <div class="col-md-10 d-flex justify-content-center">
            <div class="options">
                <div class="option">
                    <img src="{{ asset('imagenes/compras.jpg') }}" alt="Compras" class="option-img">
                    <h4>SECCIÓN DE COMPRAS</h4>
                    <p>ADMINISTRA TUS COMPRAS DE INSUMOS</p>
                    <a href="{{url('homeInsumosCompras')}}" class="btn">IR A COMPRAS</a>
                </div>

                <div class="option">
                    <img src="{{ asset('imagenes/inventario.jpg') }}" alt="Inventario" class="option-img">
                    <h4>SECCIÓN DE INVENTARIO</h4>
                    <p>ADMINISTRA TU INVENTARIO</p>
                    <a href="{{url('homeInventario')}}" class="btn">IR A INVENTARIO</a>
                </div>

                <div class="option">
                    <img src="{{ asset('imagenes/ventas.jpg') }}" alt="Ventas" class="option-img">
                    <h4>SECCIÓN DE VENTAS</h4>
                    <p>ADMINISTRA TUS VENTAS</p>
                    <a href="{{url('homeVenta')}}" class="btn">IR A VENTAS</a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Agrega los scripts para el menú -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
