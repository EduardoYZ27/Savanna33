<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras - SAVANNA Restaurante-bar</title>
    <link rel="stylesheet" href="{{ asset('css/compras.css') }}">
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
        <h3>AGREGA NUEVAS COMPRAS DE TUS INSUMOS</h3>
        
        <section class="add-purchase">
            <h4>AGRECAR UNA NUEVA COMPRA DE INSUMOS</h4>
            <form>
                <div class="form-group">
                    <label for="insumo">INSUMO:</label>
                    <input type="text" id="insumo" placeholder="Piease cuter">
                </div>
                <div class="form-group">
                    <label for="unidad">UNIDAD DE MEDIDA:</label>
                    <input type="text" id="unidad" placeholder="Piease cuter">
                </div>
                <div class="form-group">
                    <label for="cantidad">CANTIDAD:</label>
                    <input type="text" id="cantidad" placeholder="Ingresa alguno de los costos">
                </div>
                <div class="form-group">
                    <label for="costo-unitario">COSTO UNITARIO:</label>
                    <input type="text" id="costo-unitario" placeholder="Piease cuter">
                </div>
                <div class="form-group">
                    <label for="costo-total">COSTO TOTAL:</label>
                    <input type="text" id="costo-total" placeholder="Piease cuter">
                </div>
                <div class="form-actions">
                    <button type="button" class="btn-close">CERRAR</button>
                    <button type="submit" class="btn-save">GUARDAR</button>
                </div>
            </form>
        </section>

        <div class="container mt-4">
            <h2 class="text-center text-warning">Lista de Insumos Comprados</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-warning">
                        <tr>
                            <th>ID</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Unidad de Medida</th>
                            <th>Insumo</th>
                            <th>Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>10</td>
                            <td>$100.00</td>
                            <td>Kg</td>
                            <td>Harina</td>
                            <td>2025-02-20</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>5</td>
                            <td>$50.00</td>
                            <td>Litros</td>
                            <td>Aceite</td>
                            <td>2025-02-19</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
