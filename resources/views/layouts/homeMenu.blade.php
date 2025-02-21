<!doctype html>
<html lang="en">
<head>
    <title>MENÚ DE ADMINISTRACIÓN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-GuxBXc8XU0Od0g4eHv5Un3Vz5+JkGAi0NHtB1O23Vuj+CXW5IhYK40NHu2DBRm+wPQ76hl8JGFJ1/rZ/M7DE9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        .btn-logout {
            background-color: #EC5F20;
            color: white;
            position: absolute;
            top: 30px;
            left: 1300px;
        }

    </style>
</head>

<body>
    <header>
        <img src="{{ asset('imagenes/LOGO_TAQ_SINFONDO.png') }}" alt="Logo de Taquería Chester" class="logo">
        <h1>Taquería Chester</h1>
        <p>¡En precio y calidad somos la mejor opción!</p>
    </header>

    <h2 class="title-menu">SECCIONES MÁS FRECUENTES</h2>
    <br>
    
    @if (Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-logout">
            Cerrar sesión <i class="fas fa-door-open ml-2"></i>
        </button>
    </form>
    @endif

    @yield('content')

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    <footer>
        <p>&copy; 2024 Taquería Chester</p>
    </footer>
</body>
</html>
