<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Savanna</title>
    
    <!-- Enlace al archivo CSS propio -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h4>Iniciar Sesión</h4>
            </div>
            <div class="login-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="number">Número de empleado</label>
                        <input type="text" id="number" name="number" placeholder="Agrega tu número de empleado" pattern="\d*" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
                    </div>
                    <button type="submit" class="btn">Ingresar</button>
                </form>
            </div>
            <div class="login-footer">
                <small>¿No tienes cuenta? <a href="#">Regístrate</a></small>
            </div>
        </div>
    </div>
</body>
</html>
