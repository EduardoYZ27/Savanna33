@extends('layouts.home')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Ordenes/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}"> <!-- Archivo CSS separado -->
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

<!-- Contenedor de las mesas -->
<div class="orders" id="order-container">
    @for ($i = 1; $i <= 20; $i++)
        <div class="order-card mesa-card" style="{{ $i <= 4 ? '' : 'display: none;' }}">
            <img src="{{ asset('imagenes/mesa.jpg') }}" alt="Mesa {{ $i }}" class="option-img">
            <h3>MESA {{ $i }}</h3>
            <p>Mesa {{ $i }} para clientes.</p>
            <a href="{{ route('orden.mostrar', ['numero' => $i])}}" class="btn">Dar mesa {{ $i }}</a>
        </div>
    @endfor
</div>

<!-- Contenedor de los botones -->
<div class="botones-container">
    <button id="verMas" class="boton-ver">Ver más</button>
    <button id="verMenos" class="boton-ver" style="display: none;">Ver menos</button>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let itemsMostrados = 4;
        const totalMesas = $('.mesa-card').length;

        $('#verMas').on('click', function() {
            $('.mesa-card:hidden').slice(0, 4).css("display", "inline-block");
            itemsMostrados += 4;

            if (itemsMostrados >= totalMesas) {
                $('#verMas').hide();
            }

            $('#verMenos').show();
        });

        $('#verMenos').on('click', function() {
            $('.mesa-card:visible').slice(-4).css("display", "none");
            itemsMostrados -= 4;

            if (itemsMostrados <= 4) {
                $('#verMenos').hide();
            }

            $('#verMas').show();
        });
    });
</script>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
