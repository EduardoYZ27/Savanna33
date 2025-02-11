<!-- resources/views/categorias/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorías</title>
</head>
<body>
    <h1>Lista de Categorías</h1>
    <a href="{{ route('categorias.create') }}">Crear Nueva Categoría</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categoria as $categoria)
                <tr>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
