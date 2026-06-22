<?php
$host = "localhost";
$port = "3307"; 
$usuario = "root";
$password = "";
$bd = "mi_crud";

$conn = new mysqli($host, $usuario, $password, $bd, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>