<?php
session_start();
if (isset($_SESSION['user'])) {
    
} else {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inicio|PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="mostrar_articulos.php">Articulos</a></li>
            <li><a href="mostrar_categorias.php">Categorias</a></li>
            <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Categorías</h1>
            <hr>

            <br>
           <center> <h2>Listado</h2> </center> <br>   
            <hr>
            <br><br>    
            <?php
            include_once('conexion.php');

            // Consulta SQL
            $sql = "SELECT categorias.id, categorias.descripcion FROM categorias;";

            $ejecucion_sql = $conexion->query($sql);

            // Verificar si hay resultados
            if ($ejecucion_sql->num_rows > 0) {
                echo '<div class="categories-list">';
                while ($fila = $ejecucion_sql->fetch_assoc()) {
                    echo '<article class="category-item">';
                    echo '<div class="data">';
                    echo '<h2> ' . htmlspecialchars($fila['descripcion']) . '</h2>';
                    echo '</div>';
                    echo '</article>';
                    echo '<hr>';
                }
                echo '</div>';
            } else {
                echo '<p>No hay categorías disponibles.</p>';
            }
            ?>
            <hr>
        </div>
    </section>
    <footer>
    <p>PHP con Yahmir &copy; 2024</p>
    </footer>
</body>
</html>
