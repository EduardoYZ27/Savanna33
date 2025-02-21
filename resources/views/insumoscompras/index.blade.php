@extends('layouts/homeInsumosCompras')

@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

<div class="row">
    <!-- Botón de la hamburguesa -->
    <button class="navbar-toggler-sec" type="button" data-toggle="collapse" data-target="#menuPrincipal-sec" aria-controls="menuPrincipal-sec" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">&#9776;</span>
    </button>

    <!-- Menú hamburguesa -->
    <div class="col-md-auto">
        <div class="card menu-card-sec" id="menuPrincipal-sec">
            <a href="javascript:void()" onclick="closeMenu()"></a>
            <a href="{{ url('homeMenu') }}"><i class="fa fa-home"></i> Inicio</a>
            <a href="{{ url('homeInsumosCompras') }}"><i class="fa fa-shopping-cart"></i> Compras</a>
            <a href="{{ url('homeInventario') }}"><i class="fa fa-list-alt"></i> Inventario</a>
            <a href="{{ url('homeOrden') }}"><i class="fa fa-dollar"></i> Ordenes</a>
            <a href="{{ url('homeVenta') }}"><i class="fa fa-dollar"></i> Ventas</a>
            <a href="{{ url('home') }}"><i class="fa fa-archive"></i> Insumos</a>
            <a href="{{ url('homeProductos') }}"><i class="fa fa-cubes"></i> Productos</a>
            <a href="{{ url('homeCategorias') }}"><i class="fa fa-tags"></i> Categorías</a>
             <a href="{{ url('homeUnidadMedidas') }}"><i class="fa fa-balance-scale"></i> Unidades de medida</a> 
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="col-md-10">
        <br><br>
        <h3>AGREGA NUEVAS COMPRAS DE TUS INSUMOS</h3>
        <br>

        <!-- Boton para regresar -->
        <a href="{{ url('homeMenu') }}">
            <img class="img-atras" src="{{ asset('imagenes/atras.png') }}">
        </a>

        <!-- Boton para agregar -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create" data-insumos="{{ $insumos }}" data-unidadmedidas="{{ $unidadMedidas }}">
            AGREGAR COMPRA
        </button>
        <br><br>

        <div class="table-responsive">
            <table class="table">
                <!-- Encabezados de la tabla -->
                <thead>
                    <tr>
                        <th scope="col">INSUMO</th>
                        <th scope="col">U.MEDIDA</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">C.UNITARIO</th>
                        <th scope="col">C.TOTAL</th>
                        <th scope="col">FECHA DE COMPRA</th>
                        <!--<th scope="col">ACCIONES</th>-->
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    @foreach($insumosCompras as $insumoCompra)
                    <tr>
                        <td>{{ $insumoCompra->Insumos->nombre }}</td>
                        <td>{{ $insumoCompra->UnidadMedidas->nombre }}</td>
                        <td>{{ $insumoCompra->cantidad }}</td>
                        <td>{{ $insumoCompra->costo }}</td>
                        <td>{{ number_format($insumoCompra->costo * $insumoCompra->cantidad, 2) }}</td>
                        <td>{{ $insumoCompra->Compras->fecha }}</td>
                        <td>
                            <!-- Botones de acciones -->
                        </td>
                    </tr>
                    <!-- Modal para habilitar/deshabilitar -->
    <div class="modal fade" id="enableDisableModal{{$insumoCompra->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$insumoCompra->id}}" aria-hidden="true">
        <!-- Contenido del modal -->
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
                    <!--@include('insumoscompras.info')-->
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('insumoscompras.create')
    </div>
</div>



@endsection