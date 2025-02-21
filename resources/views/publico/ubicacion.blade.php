@extends('layouts.homeUbicacion')

@section('content')

<nav>
    <a href="{{url('homePublico')}}">Inicio</a>
  </nav>

  <h3>VEN A CONOCERNOS</h3>
  
  <section>
    <div class="mapaContenedor">
        <iframe class="mapa"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d593.6375833823358!2d-99.76005575960183!3d19.36945151430437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d279b6d19ee2d3%3A0xc3757e9432b8df5!2sTaqueria%20Chester!5e1!3m2!1ses-419!2smx!4v1695923937723!5m2!1ses-419!2smx"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

<div>
<div class="boton-modal">
    <label for="btn-modal">
        Abrir
    </label>
</div>

<input type="checkbox" id="btn-modal">
<div class="container-modal">
    <div class="content-modal">
        <h2>¡UBICANOS EN!</h2>
        <p>Si te interesa venir a probar nuestra comida y pasar un momento agradable en compañia de tu
            familia
            puedes encontrarnos en: Manzana 005, 50900 Villa de Almoloya de Juárez, México.
        </p>
        <div class="btn-cerrar">
            <label for="btn-modal">Cerrar</label>
        </div>
    </div>
    <label for="btn-modal" class="cerrar-modal"></label>
</div>


</div>
</div>
</section>



@endsection
