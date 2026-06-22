<?php
include "conexion.php";

$id = $_GET['id'];

try {
    // Consulta preparada para eliminación segura
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    
    header("Location: index.php");
} catch (PDOException $e) {
    echo "Error al eliminar: " . $e->getMessage();
}
?>