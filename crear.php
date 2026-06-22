<?php
include "conexion.php";
// Obtenemos los roles de la base de datos para el desplegable
$sql_roles = "SELECT * FROM roles";
$res_roles = $conn->query($sql_roles);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Usuario</title>
</head>
<body>
    <h2>Nuevo Usuario</h2>
    <form action="insertar.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Edad:</label><br>
        <input type="number" name="edad" required><br><br>
        
        <label>Asignar Rol:</label><br>
        <select name="rol_id" required>
            <option value="">-- Selecciona un Rol --</option>
            <?php while($rol = $res_roles->fetch_assoc()) { ?>
                <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre_rol']; ?></option>
            <?php } ?>
        </select><br><br>
        
        <button type="submit">Guardar Usuario</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>