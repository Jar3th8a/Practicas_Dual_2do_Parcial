<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Comentarios</title>
</head>
<body>
    <h1>Resultados del Comentario</h1>

    <h2>1. Renderizado Seguro con doble llave (Neutraliza XSS):</h2>
    <p>{{ $comentario }}</p>

    <h2>2. Renderizado Peligroso con llaves y exclamaciones (Permite XSS):</h2>
    <p>{!! $comentario !!}</p>
</body>
</html>