<?php
include "conexion.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$rol_id = $_POST['rol_id'];

try {
    // 1. Preparamos la plantilla de la consulta con marcadores '?'
    $sql = "INSERT INTO usuarios (nombre, email, edad, rol_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // 2. Ejecutamos vinculando los datos limpios. ¡Inyección SQL evitada!
    $stmt->execute([$nombre, $email, $edad, $rol_id]);
    
    header("Location: index.php");
} catch (PDOException $e) {
    echo "Error al insertar: " . $e->getMessage();
}
?>