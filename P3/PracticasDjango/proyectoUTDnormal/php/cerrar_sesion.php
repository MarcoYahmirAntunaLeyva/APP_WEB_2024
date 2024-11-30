<?php
session_start();

// Verificar si existen variables de sesión
if (isset($_SESSION)) {
    // Destruir la sesión
    session_destroy();

    // Crear una cookie para el mensaje de "Cerró sesión"
    setcookie("mensaje", "cerro_sesion", time() + 5, "/"); // La cookie expirará en 5 segundos

    // Redirigir al index
    header("Location: ../index.php");
    exit();
}
?>
