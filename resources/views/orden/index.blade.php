@extends('layouts.home')

@section('content')
@if (Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-logout">
            Cerrar sesión <i class="fas fa-door-open ml-2"></i>
        </button>
    </form>
    @endif

    @yield('content')

<!-- Agrega las referencias a Bootstrap y jQuery antes de cerrar el cuerpo del documento -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/menuSecciones.js') }}"></script>

<div style="padding: 20px;" class="row">
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

<h3>BIENVENIDO A LA SECCIÓN DE ORDENES</h3>
<br>
<br>
<!-- Boton para regresar 
<a href="{{ url('homeMenu') }}">
    <img class="img-atras" src="{{ asset('imagenes/atras.png') }}">
</a>
-->

<br>
<br>
<br>


    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa1.jpg') }}" alt="SECCION DE INSUMOS" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 1</h5>
                <p class="card-text">Mesa 1 para clientes :D</p>
                <a href="{{ route('orden.mostrar', ['numero' => 1])}}" class="btn btn-primary">Dar mesa 1 :D</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa2.jpg') }}" alt="SECCION DE PRODUCTOS" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 2</h5>
                <p class="card-text">Mesa 2 para clientes :D</p>
                <a href="{{ route('orden.mostrar', ['numero' => 2])}}" class="btn btn-primary">Dar mesa 2 :D</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa3.jpg') }}" alt="SECCION DE CATEGORIAS" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 3</h5>
                <p class="card-text">Mesa 3 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 3])}}" class="btn btn-primary">Dar mesa 3 :D</a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa4.jpg') }}" alt="SECCION DE COMPRAS" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 4</h5>
                <p class="card-text">Mesa 4 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 4])}}" class="btn btn-primary">Dar mesa 4 :D</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa5.jpg') }}" alt="SECCION DE INSUMOS-PRODUCTOS" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 5</h5>
                <p class="card-text">Mesa 5 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 5])}}" class="btn btn-primary">Dar mesa 5 :D</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa6.jpg') }}" alt="SECCION DE INVENTARIO" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 6</h5>
                <p class="card-text">Mesa 6 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 6])}}" class="btn btn-primary">Dar mesa 6 :D</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa7.jpg') }}" alt="SECCION DE UNIDADES DE MEDIDA" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 7</h5>
                <p class="card-text">Mesa 7 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 7])}}" class="btn btn-primary">Dar mesa 7 :D</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/mesa8.jpg') }}" alt="SECCION DE VENTAS" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">MESA 8</h5>
                <p class="card-text">Mesa 8 para clientes.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 8])}}" class="btn btn-primary">Dar mesa 8 :D</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-image"> <img src="{{ asset('imagenes/llevar.jpg') }}" alt="SECCION DE VENTAS" class="img-fluid" style="margin: 1rem;">
                </div>
                <h5 class="card-title">PARA LLEVAR</h5>
                <p class="card-text">Sección de pedidos para llevar.</p>
                <a href="{{ route('orden.mostrar', ['numero' => 9])}}" class="btn btn-primary">Ir a pedidos :D</a>
            </div>
        </div>
    </div>
</div>
@endsection
