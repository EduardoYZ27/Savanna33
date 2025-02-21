<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órdenes de la Mesa</title>
    <link rel="stylesheet" href="{{ asset('css/Ordenes/darmesa.css') }}">
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

    <h1 class="title">ÓRDENES DE LA MESA 1</h1>

    <div class="order-actions">
        <a href="{{ url('/ordenes') }}" class="btn btn-back">⬅ Volver</a>
        <button class="btn btn-primary">AGREGAR NUEVA ORDEN</button>
        <button class="btn btn-success">COBRAR TODAS LAS ÓRDENES</button>
    </div>

    <!-- Contenedor para mostrar tres órdenes por fila -->
    <div class="orders-container">
        <div class="order-container">
            <h3>ORDEN NO. 17</h3>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>DETALLES ADICIONALES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Orden de 3 Tacos al Pastor</td>
                        <td>1</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>

            <div class="total-section">
                <strong>TOTAL</strong>
                <span>$30.00</span>
            </div>

            <div class="order-actions">
                <button class="btn btn-danger">Cancelar orden</button>
                <button class="btn btn-primary">Cobrar por separado</button>
            </div>
        </div>

        <div class="order-container">
            <h3>ORDEN NO. 18</h3>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>DETALLES ADICIONALES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Orden de 2 Burritos de Carne Asada</td>
                        <td>1</td>
                        <td>Con extra de queso</td>
                    </tr>
                </tbody>
            </table>

            <div class="total-section">
                <strong>TOTAL</strong>
                <span>$45.00</span>
            </div>

            <div class="order-actions">
                <button class="btn btn-danger">Cancelar orden</button>
                <button class="btn btn-primary">Cobrar por separado</button>
            </div>
        </div>

        <div class="order-container">
            <h3>ORDEN NO. 19</h3>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>DETALLES ADICIONALES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pizza Mediana de Pepperoni</td>
                        <td>1</td>
                        <td>Sin cebolla</td>
                    </tr>
                </tbody>
            </table>

            <div class="total-section">
                <strong>TOTAL</strong>
                <span>$120.00</span>
            </div>

            <div class="order-actions">
                <button class="btn btn-danger">Cancelar orden</button>
                <button class="btn btn-primary">Cobrar por separado</button>
            </div>
        </div>
    </div>
</body>
</html>
