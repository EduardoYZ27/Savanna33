<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVANNA Restaurante-bar</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<body>
    <header>
        <img src="{{ asset('img/fondo.jpg') }}" alt="Logo SAVANNA" class="logo">
        <nav>
            <button class="menu-button">&#9776;</button>
        </nav>
    </header>
    <main>
        <h1>SAVANNA</h1>
        <h2>Restaurante-bar</h2>
        <h3>Selecciones más frecuentes</h3>
        <section class="options">
            <div class="option">
                <img src="compras.jpg" alt="Compras">
                <h4>SECCIÓN DE COMPRAS</h4>
                <p>ADMINISTRA TUS COMPRAS DE INSUMOS</p>
                <button class="btn">IR A COMPRAS</button>
            </div>
            <div class="option">
                <img src="inventario.jpg" alt="Inventario">
                <h4>SECCIÓN DE INVENTARIO</h4>
                <p>ADMINISTRA TU INVENTARIO</p>
                <button class="btn">IR A INVENTARIO</button>
            </div>
            <div class="option">
                <img src="ventas.jpg" alt="Ventas">
                <h4>SECCIÓN DE VENTAS</h4>
                <p>ADMINISTRA TUS VENTAS</p>
                <button class="btn">IR A VENTAS</button>
            </div>
        </section>
    </main>
</body>
</html>
