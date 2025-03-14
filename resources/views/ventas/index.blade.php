@extends('layouts/homeVentas')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Ventas/homeVentas.css') }}">
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

<h3 class="title">VENTAS</h3>

<div class="container">

    <!-- Botón para regresar -->
    <a href="{{url('homeMenu')}}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>

    <br><br>
    @php
        $cont = 1;
    @endphp
    <div class="table-responsive">
        <table class="table">
            <!-- Encabezados de la tabla -->
            <thead class="text-center">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">CONSUMO</th>
                    <th scope="col">PRECIO DE VENTA</th>
                    <th scope="col">FECHA</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            @foreach($ventas as $venta)
                @include('ventas.info')
                <tbody class="text-center">
                    <tr>
                        <td>{{ $cont }}</td>
                        <td>
                            @if ($venta->NoConsumo<9)
                                MESA {{$venta->NoConsumo}}
                            @else
                                PARA LLEVAR
                            @endif
                        </td>
                        <td>$ {{ number_format($venta->precioVenta, 2, '.', '') }}</td>
                        <td>{{ $venta->fecha }}</td>
                    </tr>
                    @php
                        $cont++;
                    @endphp
                </tbody>
            @endforeach
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
