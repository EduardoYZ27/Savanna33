<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección de Órdenes</title>
    <link rel="stylesheet" href="{{ asset('css/Ordenes/index.css') }}">
</head>
<body>
<header>
    <img src="{{ asset('img/fondo.jpg') }}" alt="Logo SAVANNA" class="logo">
    
    <div class="header-text">
        <h1>SAVANNA</h1>
        <p>¡En precio y calidad somos la mejor opción!</p>
    </div>
    
    <nav>
        <button class="menu-button">&#9776;</button>
    </nav>
</header>



    <h2 class="title">BIENVENIDO A LA SECCIÓN DE ÓRDENES</h2>

    <section class="orders">
        <div class="order-card">
        <img src="/img/mesa.jpg" alt="Mesa" class="option-img">
            <div class="order-number">1</div>
            <h3>MESA</h3>
            <p>Mesa 1 para clientes</p>
            <button class="btn" onclick="location.href='{{ route('ordenes.darmesa') }}'">Dar mesa 1</button>
        </div>

        <div class="order-card">
            <img src="/img/mesa.jpg" alt="Mesa" class="option-img">
            <div class="order-number">2</div>
            <h3>MESA</h3>
            <p>Mesa 2 para clientes</p>
            <button class="btn">Dar mesa 2</button>
        </div>

        <div class="order-card">
            <img src="/img/mesa.jpg" alt="Mesa" class="option-img">
            <div class="order-number">3</div>
            <h3>MESA</h3>
            <p>Mesa 3 para clientes</p>
            <button class="btn">Dar mesa 3</button>
        </div>

        <div class="order-card">
            <img src="/img/mesa.jpg" alt="Mesa" class="option-img">
            <div class="order-number">4</div>
            <h3>MESA 4</h3>
            <p>Mesa 4 para clientes</p>
            <button class="btn">Dar mesa 4</button>
        </div>
    </section>
</body>
</html>
