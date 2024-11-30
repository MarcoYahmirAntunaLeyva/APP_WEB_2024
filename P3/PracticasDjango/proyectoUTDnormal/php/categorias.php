<?php
// Conexión a la base de datos
$conn = new PDO('mysql:host=localhost;dbname=tu_base_de_datos', 'tu_usuario', 'tu_contraseña');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $sql = "SELECT * FROM categorias";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($categorias as $categoria) {
        echo "<div class='categoria'>";
        echo "<h2>" . htmlspecialchars($categoria['nombre']) . "</h2>";
        echo "<p>" . htmlspecialchars($categoria['descripcion']) . "</p>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null; // Cerrar la conexión
?>