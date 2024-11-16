<?php
// 404.php
header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
    <script>
        alert('Esta página no existe, será redireccionado a la página de inicio.');
        window.location.href = 'index.php'; // Cambia a la ruta de tu página de inicio
    </script>
</head>
<body>
    <h1>Error 404 - Página no encontrada</h1>
    <p>Lo sentimos, la página que buscas no existe.</p>
</body>
</html>