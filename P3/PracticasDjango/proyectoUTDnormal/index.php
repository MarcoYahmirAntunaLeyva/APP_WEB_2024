<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inicio|PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <?php
            if (isset($_SESSION['user'])) {
                echo '
                <li><a href="index.php" >Inicio</a></li>
                <li><a href="php/mision.php">Mision</a></li>
                <li><a href="php/vision.php">Vision</a></li>
                <li><a href="php/acercade.php">Acerca de</a></li>
                <li><a href="php/mostrar_articulos.php">Articulos</a></li>
                <li><a href="php/mostrar_categorias.php">Categorias</a></li>
                <li><a href="php/cerrar_sesion.php">Cerrar sesión</a></li>
                ';
            } else {
                echo '
                <li><a href="index.php" >Inicio</a></li>
                <li><a href="php/registro.php">Registrarse</a></li>
                <li><a href="php/inicio_sesion.php">Iniciar sesión</a></li>
            
                ';
            }
            ?>
            
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <?php
            if (isset($_SESSION['mensaje'])=="inicio_secion") {
                echo '<div class="alert-success">
                    Inicio de secion exitoso
                </div>';
                unset($_SESSION['mensaje']); // Eliminar el mensaje después de mostrarlo
            }
            ?>

            <h1>Inicio</h1>
            <hr>
            <?php
            if (isset($_SESSION['user'])) {
                echo "<p>.:: ¡Bienvenido a mi página de Inicio, " . htmlspecialchars($_SESSION['user']) . "! ::.</p>";
            } else {
                echo "<p>.:: Bienvenido, visitante. Por favor, inicia sesión. ::.</p>";
            }
            ?>
       </div>
    </section>
    <footer>
    <p>PHP con Yahmir &copy; 2024</p>
    </footer>
</body>
</html>