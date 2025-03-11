@extends('layouts.home')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Ordenes/index.css') }}">
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

<div class="title-container">
    <h2 class="title">BIENVENIDO A LA SECCIÓN DE ÓRDENES</h2>
    <a href="{{ url('homeMenu') }}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>
</div>

<div style="padding: 20px;" class="row">
    <div class="col-md-10 d-flex flex-wrap justify-content-center">
        <!-- Aquí van las mesas -->
        <div class="orders">
            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 1" class="option-img">
                <h3>MESA 1</h3>
                <p>Mesa 1 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 1])}}" class="btn">Dar mesa 1</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 2" class="option-img">
                <h3>MESA 2</h3>
                <p>Mesa 2 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 2])}}" class="btn">Dar mesa 2</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 3" class="option-img">
                <h3>MESA 3</h3>
                <p>Mesa 3 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 3])}}" class="btn">Dar mesa 3</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 4" class="option-img">
                <h3>MESA 4</h3>
                <p>Mesa 4 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 4])}}" class="btn">Dar mesa 4</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 5" class="option-img">
                <h3>MESA 5</h3>
                <p>Mesa 5 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 5])}}" class="btn">Dar mesa 5</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 6" class="option-img">
                <h3>MESA 6</h3>
                <p>Mesa 6 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 6])}}" class="btn">Dar mesa 6</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 7" class="option-img">
                <h3>MESA 7</h3>
                <p>Mesa 7 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 7])}}" class="btn">Dar mesa 7</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 8" class="option-img">
                <h3>MESA 8</h3>
                <p>Mesa 8 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 8])}}" class="btn">Dar mesa 8</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 9" class="option-img">
                <h3>MESA 9</h3>
                <p>Mesa 9 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 9])}}" class="btn">Dar mesa 9</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 10" class="option-img">
                <h3>MESA 10</h3>
                <p>Mesa 10 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 10])}}" class="btn">Dar mesa 10</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 11" class="option-img">
                <h3>MESA 11</h3>
                <p>Mesa 11 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 11])}}" class="btn">Dar mesa 11</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 12" class="option-img">
                <h3>MESA 12</h3>
                <p>Mesa 12 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 12])}}" class="btn">Dar mesa 12</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 13" class="option-img">
                <h3>MESA 13</h3>
                <p>Mesa 13 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 13])}}" class="btn">Dar mesa 13</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 14" class="option-img">
                <h3>MESA 14</h3>
                <p>Mesa 14 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 14])}}" class="btn">Dar mesa 14</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 15" class="option-img">
                <h3>MESA 15</h3>
                <p>Mesa 15 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 15])}}" class="btn">Dar mesa 15</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 16" class="option-img">
                <h3>MESA 16</h3>
                <p>Mesa 16 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 16])}}" class="btn">Dar mesa 16</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 17" class="option-img">
                <h3>MESA 17</h3>
                <p>Mesa 17 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 17])}}" class="btn">Dar mesa 17</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 18" class="option-img">
                <h3>MESA 18</h3>
                <p>Mesa 18 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 18])}}" class="btn">Dar mesa 18</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 19" class="option-img">
                <h3>MESA 19</h3>
                <p>Mesa 19 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 19])}}" class="btn">Dar mesa 19</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa 20" class="option-img">
                <h3>MESA 20</h3>
                <p>Mesa 20 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 20])}}" class="btn">Dar mesa 20</a>
            </div>

            <div class="order-card">
                <img src="{{ asset('imagenes/llevar.jpg') }}" alt="Para llevar" class="option-img">
                <h3>PARA LLEVAR</h3>
                <p>Sección de pedidos para llevar.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 9])}}" class="btn">Ir a pedidos</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
