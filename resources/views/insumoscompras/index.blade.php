@extends('layouts/homeInsumosCompras')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/InsumosCompras/homeInsumosCompras.css') }}">
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

<h3 class="title">AGREGA NUEVAS COMPRAS DE TUS INSUMOS</h3>

<div class="container">

    <!-- Botón para regresar -->
    <a href="{{url('homeMenu')}}">
        <img src="{{ asset('imagenes/regresar.jpg') }}" alt="Regresar" class="img-atras">
    </a>

    <!-- Botón para agregar compras -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create" data-insumos="{{ $insumos }}" data-unidadmedidas="{{ $unidadMedidas }}">
        AGREGAR COMPRA
    </button>

    <br><br>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>INSUMO</th>
                    <th>U.MEDIDA</th>
                    <th>CANTIDAD</th>
                    <th>C.UNITARIO</th>
                    <th>C.TOTAL</th>
                    <th>FECHA DE COMPRA</th>
                </tr>
            </thead>
            <tbody>
                @foreach($insumosCompras as $insumoCompra)
                    <tr>
                        <td>{{ $insumoCompra->Insumos->nombre }}</td>
                        <td>{{ $insumoCompra->UnidadMedidas->nombre }}</td>
                        <td>{{ $insumoCompra->cantidad }}</td>
                        <td>{{ $insumoCompra->costo }}</td>
                        <td>{{ number_format($insumoCompra->costo * $insumoCompra->cantidad, 2) }}</td>
                        <td>{{ $insumoCompra->Compras->fecha }}</td>
                    </tr>

                    <!-- Modal para habilitar/deshabilitar -->
                    <div class="modal fade" id="enableDisableModal{{$insumoCompra->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$insumoCompra->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{$insumoCompra->id}}">Habilitar/Deshabilitar Insumo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro de que desea cambiar el estado del insumo?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('habilitarDeshabilitar', $insumoCompra->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('insumoscompras.create')
</div>

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

@endsection
