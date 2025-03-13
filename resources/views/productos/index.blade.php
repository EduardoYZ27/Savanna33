@extends('layouts/homeProductos')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Productos/homeProductos.css') }}">
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

<h3 class="title">ADMINISTRA TUS PRODUCTOS</h3>

<div class="container">

    <!-- Botón para regresar -->
    <a href="{{url('homeMenu')}}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>

    <!-- Botón para agregar productos -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
        AGREGAR PRODUCTO
    </button>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div id="successMessage" class="alert alert-success">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function(){
                document.getElementById('successMessage').style.display = 'none';
            }, 2000);
        </script>
    @endif

    <br>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CATEGORIA</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $productos)
                    <tr>
                        <td> {{$productos->nombre}} </td>
                        <td> {{$productos->precio}} </td>
                        <td> {{$productos->Categoria->nombre}} </td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$productos->id}}">
                                <i class="fa fa-pencil"></i> <!-- Ícono de lápiz -->
                            </button>

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$productos->id}}">
                                <i class="fa fa-trash"></i> <!-- Ícono de bote de basura -->
                            </button>

                            <button type="button" class="btn btn-info btn-insumos" data-toggle="modal" data-target="#agregarInsumosModal{{$productos->id}}">
                                <i class="fa fa-cubes"></i> <!-- Ícono para Insumos (manteniendo el estilo) -->
                            </button>
                        </td>
                    </tr>

                    @include('productos.info')
                @endforeach
            </tbody>
        </table>
    </div>

    @include('productos.create')
</div>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
