<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Práctica de Seguridad</title>
</head>
<body>
    <h1>Formulario de Comentarios</h1>

    <!-- 1. Formulario Seguro (Con CSRF) -->
    <h2>Formulario Seguro (Con CSRF)</h2>
    <form method="POST" action="/guardar-seguro">
        @csrf
        <label>Comentario:</label><br>
        <textarea name="contenido" rows="3" cols="50"></textarea><br>
        <button type="submit">Enviar Seguro</button>
    </form>

    <br><hr><br>

    <!-- 2. Formulario Vulnerable (Sin CSRF) -->
    <h2>Formulario Vulnerable (Sin Token CSRF)</h2>
    <form method="POST" action="/guardar-seguro">
        <!-- Aquí NO ponemos @csrf a propósito -->
        <label>Comentario:</label><br>
        <textarea name="contenido" rows="3" cols="50"></textarea><br>
        <button type="submit">Enviar sin Token</button>
    </form>
</body>
</html>