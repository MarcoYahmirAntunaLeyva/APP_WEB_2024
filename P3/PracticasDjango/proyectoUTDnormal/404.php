<?php
// Configurar el código de respuesta HTTP
http_response_code(404);

// Mensaje de alerta en JavaScript
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Error 404</title>
    <script>
        alert('La página que buscas no existe. Serás redirigido al inicio.');
        window.location.href = 'index.php';
    </script>
</head>
<body>
</body>
</html>
";
exit();
?>
