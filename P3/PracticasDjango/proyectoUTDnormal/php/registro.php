<?php
//session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Desactivar las noticias y mostrar los errores
    error_reporting(E_ALL ^ E_NOTICE);

    // 1.- Conectarse a la BD
    include_once("conexion.php");

    // 2.- Traer los datos del formulario
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // Validar que las contraseñas coincidan
    if ($pass === $confirm_pass) {
        // 3.- Crear la consulta SQL
        $sql = "INSERT INTO usuarios (username, password, privilegio) VALUES ('$usuario', '$pass', 'cliente');";

        // 4.- Ejecutar la consulta
        $ejecutar_sql = $conexion->query($sql);

        if ($ejecutar_sql) {
            echo "<script>   
                      alert('... Usuario Agregado Correctamente ... ');
                  </script>";
        } else {
            echo "<script>   
                    alert('... No fue posible agregar al usuario, verifique por favor... ');
                  </script>";
        }
    } else {
        echo "<script>
                alert('... Las contraseñas no coinciden, intente nuevamente ...');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio|PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="inicio_sesion.php">Iniciar sesión</a></li>
            <li><a href="registro.php">Registrarse</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Registrarse</h1>
            <hr>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
            <table align="center">
                <tr>
                    <td><label for="us">Usuario:</label></td>
                    <td><input type="text" name="usuario" id="us" autofocus required></td>
                </tr>
                <tr>
                    <td><label for="ps">Contraseña:</label></td>
                    <td><input type="password" name="pass" id="ps" required></td>
                </tr>
                <tr>
                    <td><label for="cp">Confirmar contraseña:</label></td>
                    <td><input type="password" name="confirm_pass" id="cp" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Entrar" name="entrar"></td>
                </tr>
            </table>
            </form>
       </div>
    </section>
    <footer>
    <p>PHP con Yahmir &copy; 2024</p>
    </footer>
</body>
</html>
