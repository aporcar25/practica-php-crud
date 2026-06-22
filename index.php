<?php
include "conexion.php";
// Consulta para unir la tabla usuarios con la tabla roles
$sql = "SELECT u.id, u.nombre, u.email, u.edad, r.nombre_rol 
        FROM usuarios u 
        INNER JOIN roles r ON u.rol_id = r.id";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios (2 Tablas)</title>
</head>
<body>
    <h2>Lista de Usuarios Gestionada con Dos Tablas</h2>
    <a href="crear.php">Nuevo usuario</a><br><br>
    
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Rol de Usuario (Tabla Roles)</th>
            <th>Acciones</th>
        </tr>
        <?php while($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['email']; ?></td>
            <td><?php echo $fila['edad']; ?></td>
            <td><strong><?php echo $fila['nombre_rol']; ?></strong></td>
            <td>
                <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> | 
                <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>