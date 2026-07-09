<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 300px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; background: #3490dc; color: white; border: none; padding: 10px; border-radius: 4px; font-weight: bold; cursor: pointer; }
        button:hover { background: #2779bd; }
        .errors { color: red; font-size: 14px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Iniciar Sesión</h2>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div class="form-group">
            <label>Correo Electrónico:</label>
            <input type="email" name="email" required autofocus>
        </div>
        
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Ingresar</button>
    </form>
</div>

</body>
</html>
