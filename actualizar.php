<?php
include "conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$rol_id = $_POST['rol_id'];

$sql = "UPDATE usuarios SET nombre='$nombre', email='$email', edad='$edad', rol_id='$rol_id' WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error al actualizar: " . $conn->error;
}
?>