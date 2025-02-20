@extends('layouts/home')


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

    <div class="col-md-10">

    <br><br>
    <h3>ADMINISTRA TUS INSUMOS</h3>
    <br>

     <!-- Boton para regresar -->
     <a href="{{url('homeMenu')}}">
        <img class="img-atras" src="{{ asset('imagenes/atras.png') }}">
    </a>
        
        <!-- Boton para agregar -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
        AGREGAR INSUMO
        </button>
        
        <br><br>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">DESCRIPCIÓN</th>
                        <th scope="col">UNIDAD DE MEDIDA</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($insumos as $insumos)
                    <tr>
                        <td> {{$insumos->nombre}} </td>
                        <td> {{$insumos->descripcion}} </td>
                        <td> {{$insumos->unidadMedida->nombre}} </td>
                        <td>{{$insumos->estado}}</td>
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

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


@endsection