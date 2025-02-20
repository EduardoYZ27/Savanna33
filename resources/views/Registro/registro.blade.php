<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/regis.css') }}">
</head>
<body>
    <div class="register-container">
        <h2 class="title">Registrate</h2>
        <form action="registro.php" method="POST" class="register-box">
            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" required>
            </div>
            <div class="input-group">
                <label for="apellido_materno">Apellido Materno</label>
                <input type="text" id="apellido_materno" name="apellido_materno" required>
            </div>
            <div class="input-group">
                <label for="numero_empleado">Número de Empleado</label>
                <input type="text" id="numero_empleado" name="numero_empleado" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Registrarse</button>
        </form>
        <p class="register-footer">¿Ya tienes cuenta? <a href="login.html">Inicia sesión</a></p>
    </div>
</body>
</html>