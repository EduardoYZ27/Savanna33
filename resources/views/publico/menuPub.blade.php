@extends('layouts.homeMenuPub')

@section('content')

<nav>
    <a href="{{url('homePublico')}}">Inicio</a>
    <a href="{{url('homeMenuPub')}}">Menú</a>
  </nav>

  <h3>MENÚ</h3>

  <div class="menu-container">

      <section>
        <img src="../imagenes/tacos_menu.jpg" alt="tacos">
        <h4>
          <button class="menu-button" onclick="location.href='../VISTA/tacos.html'">Tacos</button>
        </h4>
        <p>Variedad de tacos deliciosos.</p>
      
      </section>


    <section>
      <img src="../imagenes/cuartoK.jpg" alt="maciza">
      <h4>
        <button class="menu-button" onclick="location.href='../VISTA/maciza.html'">Maciza</button>
      </h4>
      <p>¿Por qué conformarte con un solo taco?.</p>
      
    </section>
  
    <section>
      <img src="../imagenes/costilla-resscalado.jpg" alt="costilla">
      <h4>
        <button class="menu-button" onclick="location.href='../VISTA/costilla.html'">Costilla</button>
      </h4>
      <p>Come hasta que estes satisfecho.</p>
     
    </section>


    <section>
      <img src="../imagenes/taco_surtida_rd.jpg" alt="surtida">
      <h4>
        <button class="menu-button" onclick="location.href='../VISTA/surtida.html'">Surtida</button>
      </h4>
      <p>Nada como comer con amigos o en familia.</p>
      
    </section>

    <section>
      <img src="../imagenes/tacos-pastor.jpg" alt="pastor">
      <h4>
        <button class="menu-button" onclick="location.href='../VISTA/pastor.html'">Pastor</button>
      </h4>
      <p>Nada como comer con amigos o en familia.</p>
      
    </section>


    <section>
      
      <img src="../imagenes/bebidas.jpg" alt="Bebidas">
      <h4>
        <button class="menu-button" onclick="location.href='../VISTA/bebidas.html'">Bebidas</button>
      </h4>
      <p>Bebidas variadas para todos los gustos.</p>
 
    </section>
  </div>
  


@endsection
