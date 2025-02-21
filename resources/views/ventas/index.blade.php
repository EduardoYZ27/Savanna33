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
        <h3>VENTAS</h3>
        <br>

        <!-- Boton para regresar 
        <a href="{{ url('homeMenu') }}">
            <img class="img-atras" src="{{ asset('imagenes/atras.png') }}">
        </a>
-->
        
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
</div>



@endsection