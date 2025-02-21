@extends('layouts/homeInsumosProductos')


@section('content')


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

    <br><br>
    <h3>ADMINISTRA LOS INSUMOS QUE USAS EN TUS PRODUCTOS</h3>
    <br>

    <!-- Boton para regresar -->
    <a href="{{url('homeMenu')}}">
                <img class="img-atras" src="{{ asset('imagenes/atras.png') }}">
            </a>
        
        <!-- Boton para agregar -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
        NUEVO
        </button>
        
        <br><br>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">INSUMO</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">U.MEDIDA</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($insumosProductos as $insumoProducto)
                    <tr>
                        <td> {{$insumoProducto->id}} </td>
                        <td> {{$insumoProducto->producto->id}} </td>
                        <td> {{$insumoProducto->categoria->id}} </td>
                        <td> {{$insumoProducto->insumo->id}} </td>
                        <td> {{$insumoProducto->cantidad}} </td>
                        <td> {{$insumoProducto->unidadMedida->nombre}} </td>
                        
                        <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$insumoProducto->id}}">
                            EDITAR
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$insumoProducto->id}}">
                            ELIMINAR   
                        </button>
        
                        </td>
                    </tr>

                    @include('insumosproductos.info')
                    

                    @endforeach
                </tbody>
            </table>
        </div>

        @include('insumosproductos.create')
</div>

</div>

@endsection