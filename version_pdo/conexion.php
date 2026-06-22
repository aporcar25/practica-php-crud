<?php
$host = "localhost";
$port = "3307";
$bd = "mi_crud";
$usuario = "root";
$password = "";

try {
    // Creamos la conexión por PDO configurando el charset utf8
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$bd;charset=utf8", $usuario, $password);
    // Activamos el manejo de errores y excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
