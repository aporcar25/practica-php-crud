<?php
include "conexion.php";

$id = $_GET['id'];

try {
    // Preparamos la búsqueda del usuario por ID
    $sql_user = "SELECT * FROM usuarios WHERE id = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->execute([$id]);
    $usuario = $stmt_user->fetch(PDO::FETCH_ASSOC);

    // Si el usuario no existe regresamos al inicio
    if (!$usuario) {
        header("Location: index.php");
        exit;
    }

    // Cargamos los roles para el menú
    $sql_roles = "SELECT * FROM roles";
    $res_roles = $conn->query($sql_roles);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario - PDO</title>
</head>
<body>
    <h2>Editar Usuario (Seguro)</h2>
    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required><br><br>
        
        <label>Edad:</label><br>
        <input type="number" name="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required><br><br>
        
        <label>Rol de Usuario:</label><br>
        <select name="rol_id" required>
            <?php while ($rol = $res_roles->fetch(PDO::FETCH_ASSOC)) { 
                $selected = ($rol['id'] == $usuario['rol_id']) ? "selected" : "";
                ?>
                <option value="<?php echo $rol['id']; ?>" <?php echo $selected; ?>>
                    <?php echo htmlspecialchars($rol['nombre_rol']); ?>
                </option>
            <?php } ?>
        </select><br><br>
        
        <button type="submit">Actualizar Usuario</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>