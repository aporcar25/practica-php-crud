<?php
include "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$rol_id = $_POST['rol_id'];

try {
    // Estructura de actualización con marcadores posicionales
    $sql = "UPDATE usuarios SET nombre = ?, email = ?, edad = ?, rol_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    // Pasamos las variables en el orden exacto de los marcadores
    $stmt->execute([$nombre, $email, $edad, $rol_id, $id]);
    
    header("Location: index.php");
} catch (PDOException $e) {
    echo "Error al actualizar: " . $e->getMessage();
}
?>