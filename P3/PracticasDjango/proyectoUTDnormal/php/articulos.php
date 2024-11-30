<?php
// Conexión a la base de datos
$conn = new PDO('mysql:host=localhost;dbname=php', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $sql = "SELECT * FROM articulos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $articulos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($articulos as $articulo) {
        echo "<div class='articulo'>";
        echo "<h2>" . htmlspecialchars($articulo['titulo']) . "</h2>";
        echo "<p>" . htmlspecialchars($articulo['contenido']) . "</p>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null; // Cerrar la conexión
?>