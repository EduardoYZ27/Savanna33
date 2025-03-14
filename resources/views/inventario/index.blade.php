@extends('layouts/homeInventario')


@section('content')
<!-- Agrega las referencias a Bootstrap y jQuery antes de cerrar el cuerpo del documento -->
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
    @if ($idInventario != null)
        <h3>INVENTARIO {{$fechaActual}}</h3>
    @endif
    <br>
        
        <!-- Boton para regresar -->
        <a href="{{url('homeMenu')}}">
            <img class="img-atras" src="{{ asset('imagenes/atras.png') }}">
        </a>
        @if ($idInventario == null)
            <!-- Boton para agregar -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createInventarioInicial">
                GENERAR UN INVENTARIO INICIAL
            </button>
        @else
            <!-- Boton para agregar -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNuevoInventario">
                GENERAR NUEVO INVENTARIO
            </button>
        @endif
        
        @include('inventario.create')
        <br><br>
        @if ($idInventario == null)
            <br><br><br>
            <h3>NO HAY UN INVENTARIO CREADO, GENERE POR FAVOR UN INVENTARIO INICIAL</h3>            
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">INSUMO</th>
                            <th scope="col">CANTIDAD UTILIZADA</th>
                            <th scope="col">CANTIDAD SISTEMA</th>
                            <th scope="col">CANTIDAD FISICA</th>
                            <th scope="col">DIFERENCIA</th>
                            <th scope="col">AJUSTE</th>
                            <th scope="col">OBSERVACIONES</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($insumos as $insumo)
                            @php
                                $inventarioInsumo = (new \App\Http\Controllers\InventarioControlador)->getInventarioInsumo($idInventario,$insumo->id);
                            @endphp
                            <tr>
                                <td> {{$insumo->nombre}} </td>
                                <td>
                                    @php
                                        $cantidadUtilizada = (new \App\Http\Controllers\InventarioControlador)->totalConsumoInsumo($fechaInventarioActual, $insumo->id);
                                        echo $cantidadUtilizada.' '.$insumo->unidadMedida->nombre;
                                    @endphp
                                </td> 
                                <td> 
                                    @php
                                        $cantidadSistema = (new \App\Http\Controllers\InventarioControlador)->totalCantidadSistemaInsumo($cantidadUtilizada,$idAntInventario,$fechaInventarioActual, $insumo->id);
                                        echo $cantidadSistema.' '.$insumo->unidadMedida->nombre;
                                    @endphp
                                    
                                </td>
                                <td>
                                    @php
                                        $cantidadFisica=$inventarioInsumo->cantidadFisica;
                                        echo $cantidadFisica.' '.$inventarioInsumo->unidadMedida->nombre;
                                    @endphp
                                    <br>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editCantFis{{$insumo->id}}">
                                        EDITAR
                                    </button>
                                </td>
                                <td> 
                                    @php
                                        $diferencia = (new \App\Http\Controllers\InventarioControlador)->totalDirefencia($insumo->id,$cantidadSistema,$insumo->ID_UnidadMedida,$cantidadFisica,$inventarioInsumo->ID_UnidadMedida);
                                        echo $diferencia.' '.$insumo->unidadMedida->nombre;
                                    @endphp
                                </td>
                                <td>
                                    @if ($inventarioInsumo->ajuste === 'true')
                                        <input style="cursor: pointer; width: 30px; height:30px;" type="checkbox" id="{{$insumo->id}}" name="ajuste" class="cbox form-check-input" checked/>
                                    @else
                                        <input style="cursor: pointer; width: 30px; height:30px;" type="checkbox" id="{{$insumo->id}}" name="ajuste" class="cbox form-check-input"/>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        echo $inventarioInsumo->observaciones;
                                    @endphp
                                    <br>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editObs{{$insumo->id}}">
                                        EDITAR
                                    </button>
                                </td>
                            </tr>
                            @include('inventario.info')
                            @php
                                (new \App\Http\Controllers\InventarioControlador)->setInventarioInsumo($idInventario,$insumo->id,$cantidadSistema,$insumo->ID_UnidadMedida);
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        @endif
        
        
</div>

</div>

<script>
    $(document).ready(function() {
        $('.cbox').change(function() {
            // $(this).is(':checked')
            var id = $(this).attr('id');
            $('#input_ajuste'+id).val($(this).is(':checked'));
            $('#sumbit'+id).click();
        });
    });
</script>

@endsection