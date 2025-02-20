<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas - Savanna33</title>
    <link rel="stylesheet" href="{{ asset('css/vent.css') }}">
</head>
<body>
    <header>
    <img src="{{ asset('img/fondo.jpg') }}" alt="Logo SAVANNA" class="logo">
    </header>
    <div class="container text-center">
        <h1 class="title">SAVANNA</h1>
        <p class="subtitle">Restaurante-bar</p>
        <h2 class="section-title">VENTAS</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>CONSUMO</th>
                    <th>PRECIO DE VENTA</th>
                    <th>FECHA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>MESA 1</td>
                    <td>$200</td>
                    <td>2025-02-20</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>MESA 1</td>
                    <td>$150</td>
                    <td>2025-02-20</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>MESA 2</td>
                    <td>$300</td>
                    <td>2025-02-20</td>
                </tr>
            </tbody>
        </table>
    </div>

    <button class="menu-button">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </button>
</body>
</html>
