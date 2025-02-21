@extends('layouts.homePublico')

@section('content')

<nav>
    <a href="{{url('homePublico')}}">Inicio</a>
    <a href="{{url('homeMenuPub')}}">Menú</a>
  </nav>

  <section class="awSlider">
    <div class="carousel slide" data-ride="carousel" id="carruselProductos">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carruselProductos" data-slide-to="0" class="active"></li>
        <li data-target="#carruselProductos" data-slide-to="1"></li>
        <li data-target="#carruselProductos" data-slide-to="2"></li>
        <li data-target="#carruselProductos" data-slide-to="3"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="../imagenes/taco_cueritos.jpg" alt="Imagen 1">
          <div class="carousel-caption"></div>
        </div>
        <div class="carousel-item">
          <img src="../imagenes/taco_maciza.jpg" alt="Imagen 2">
          <div class="carousel-caption"></div>
        </div>
        <div class="carousel-item">
          <img src="../imagenes/taco_costilla.jpg" alt="Imagen 3">
          <div class="carousel-caption"></div>
        </div>
        <div class="carousel-item">
          <img src="../imagenes/taco_buche.jpg" alt="Imagen 4">
          <div class="carousel-caption"></div>
        </div>
      </div>
  
      <!-- Controles -->
      <a class="carousel-control-prev" href="#carruselProductos" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
      <a class="carousel-control-next" href="#carruselProductos" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </a>
    </div>
  </section>

  <h3>Lo que ofrecemos</h3>
  <section class="productos">
    <div class="producto">
      <img src="../imagenes/taco_maciza_rd.jpg" alt="Tacos de maciza a solo $22">
      <h2>Taco de maciza</h2>
      <b>Precio: $22</b>
    </div>
    <div class="producto">
      <img src="../imagenes/taco_trompa.jpg" alt="Tacos de trompa a solo $22">
      <h2>Taco de trompa</h2>
      <b>Precio: $22</b>
    </div>
    <div class="producto">
      <img src="../imagenes/taco_costilla_rd.jpg" alt="Tacos de costilla a solo $25">
      <h2>Taco de costilla</h2>
      <b>Precio: $25</b>
    </div>
  </section>
  <a href="{{url('homeMenuPub')}}" class="ver-menu">Ver Menú</a>



@endsection
