<?php
// Configuración de los parámetros de conexión
$host = "localhost";
$port = "3307";
$usuario = "root";
$password = "";
$bd = "mi_crud";

echo "<h2>Panel de Diagnóstico de Conexión</h2>";

// ==========================================
// 1. COMPROBACIÓN CON MYSQLI 
// ==========================================
echo "<h3>Prueba con MySQLi:</h3>";
$conn_mysqli = @new mysqli($host, $usuario, $password, $bd, $port);

if ($conn_mysqli->connect_error) {
    echo "Error conexión"; // Mensaje exacto del paso 5
} else {
    echo "Conexión con MySQLi establecida correctamente en el puerto 3307.<br>";
}

// ==========================================
// 2. COMPROBACIÓN CON PDO
// ==========================================
echo "<h3>Prueba con PDO:</h3>";
try {
    // Creamos la conexión PDO especificando el host, puerto y base de datos
    $dsn = "mysql:host=$host;port=$port;dbname=$bd;charset=utf8";
    $conn_pdo = new PDO($dsn, $usuario, $password);
    
    // Configuramos PDO para que lance excepciones en caso de error
    $conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conexión con PDO establecida correctamente en el puerto 3307.";
} catch (PDOException $e) {
    // Si hay un fallo con PDO, mostrará este mensaje
    echo "Error conexión (PDO): " . $e->getMessage();
}
?>