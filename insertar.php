<?php
include "conexion.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$rol_id = $_POST['rol_id'];

// Insertamos incluyendo la relación de la segunda tabla
$sql = "INSERT INTO usuarios (nombre, email, edad, rol_id) VALUES ('$nombre', '$email', '$edad', '$rol_id')";

if ($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error al insertar: " . $conn->error;
}
?>