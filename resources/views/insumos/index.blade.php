@extends('layouts/homeInsumosCompras')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/Insumos/homeInsumos.css') }}">
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
        
    <br>

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
    @foreach($insumos as $insumo)
        <tr>
            <td> {{$insumo->nombre}} </td>
            <td> {{$insumo->descripcion}} </td>
            <td> {{$insumo->unidadMedida->nombre}} </td>
            <td>
                {{$insumo->estado}}

                @if($insumo->estado == 'Deshabilitado')
                    <i class="fa fa-times-circle text-danger alerta-insumo" 
                       data-toggle="tooltip" 
                       title="❌ Se ha agotado"
                       data-nombre="{{ $insumo->nombre }}" 
                       data-mensaje="se ha agotado">
                    </i>
                @elseif($insumo->estado == 'Habilitado')
                    <i class="fa fa-exclamation-triangle text-warning alerta-insumo" 
                       data-toggle="tooltip" 
                       title="⚠️ Está por agotarse"
                       data-nombre="{{ $insumo->nombre }}" 
                       data-mensaje="está por agotarse">
                    </i>
                @endif

            </td>
            <td>
                @if($insumo->estado != 'Deshabilitado')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$insumo->id}}">
                        <i class="fa fa-pencil"></i> 
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$insumo->id}}">
                        <i class="fa fa-trash"></i> 
                    </button>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>

    @include('insumos.create')
</div>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Activar tooltips de Bootstrap
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        // Agregar evento click a todos los iconos de alerta
        document.querySelectorAll('.alerta-insumo').forEach(function(icono) {
            icono.addEventListener('click', function() {
                let nombre = this.getAttribute('data-nombre');
                let mensaje = this.getAttribute('data-mensaje');

                alert("⚠️ Atención: El insumo '" + nombre + "' " + mensaje + ".");
            });
        });
    });
</script>


@endsection
