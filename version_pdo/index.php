<?php
include "conexion.php";

try {
    // Consulta SQL para unir las dos tablas
    $sql = "SELECT u.id, u.nombre, u.email, u.edad, r.nombre_rol 
            FROM usuarios u 
            INNER JOIN roles r ON u.rol_id = r.id";
    $resultado = $conn->query($sql);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Seguro con PDO (2 Tablas)</title>
</head>
<body>
    <h2>Lista de Usuarios - Versión Segura (PDO)</h2>
    <a href="crear.php">Nuevo usuario</a><br><br>
    
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Rol (Tabla Roles)</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($fila['id']); ?></td>
            <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
            <td><?php echo htmlspecialchars($fila['email']); ?></td>
            <td><?php echo htmlspecialchars($fila['edad']); ?></td>
            <td><strong><?php echo htmlspecialchars($fila['nombre_rol']); ?></strong></td>
            <td>
                <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> | 
                <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>