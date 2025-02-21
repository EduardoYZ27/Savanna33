@extends('layouts/homeProductosVentas')


@section('content')


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

    <br><br>
    <h3>ADMINISTRA TUS PRODUCTOS</h3>
    <br>
        
        <!-- Boton para agregar -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
        AGREGAR PRODUCTO
        </button>
        
        <br><br>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">NO. VENTA</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($productosVentas as $productosVentas)
                    <tr>
                        <td> {{$productosVentas->id}} </td>
                        <td> {{$productosVentas->cantidad}} </td>
                        <td> {{$productosVentas->precio}} </td>
                        <td> {{$productosVentas->Producto->id}} </td>
                        <td> {{$productosVentas->Venta->id}} </td>
                        <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$productosVentas->id}}">
                            EDITAR
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$productosVentas->id}}">
                            ELIMINAR   
                        </button>
        
                        </td>
                    </tr>

                    @include('productosventas.info')

                    @endforeach
                </tbody>
            </table>
        </div>

        @include('productosventas.create')
</div>

</div>

@endsection