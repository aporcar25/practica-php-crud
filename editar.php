<?php
include "conexion.php";

$id = $_GET['id'];
$sql_user = "SELECT * FROM usuarios WHERE id = $id";
$res_user = $conn->query($sql_user);
$usuario = $res_user->fetch_assoc();

// Obtenemos todos los roles existentes para armar el menú
$sql_roles = "SELECT * FROM roles";
$res_roles = $conn->query($sql_roles);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br><br>
        
        <label>Edad:</label><br>
        <input type="number" name="edad" value="<?php echo $usuario['edad']; ?>" required><br><br>
        
        <label>Rol de Usuario:</label><br>
        <select name="rol_id" required>
            <?php while($rol = $res_roles->fetch_assoc()) { 
                // Marcamos como 'selected' el rol que el usuario ya tiene asignado
                $selected = ($rol['id'] == $usuario['rol_id']) ? "selected" : "";
                ?>
                <option value="<?php echo $rol['id']; ?>" <?php echo $selected; ?>>
                    <?php echo $rol['nombre_rol']; ?>
                </option>
            <?php } ?>
        </select><br><br>
        
        <button type="submit">Actualizar Usuario</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>