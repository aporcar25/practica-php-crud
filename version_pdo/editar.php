<?php
include "conexion.php";
$id = $_GET['id'];

try {
    $sql_user = "SELECT * FROM usuarios WHERE id = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->execute([$id]);
    $usuario = $stmt_user->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        header("Location: index.php");
        exit;
    }

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h3 class="mb-0 fs-5 fw-bold">Modificar Datos del Usuario</h3>
            </div>
            <div class="card-body">
                <form action="actualizar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre Completo:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo Electrónico:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Edad:</label>
                        <input type="number" name="edad" class="form-control" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Rol asignado:</label>
                        <select name="rol_id" class="form-select" required>
                            <?php while ($rol = $res_roles->fetch(PDO::FETCH_ASSOC)) { 
                                $selected = ($rol['id'] == $usuario['rol_id']) ? "selected" : "";
                                ?>
                                <option value="<?php echo $rol['id']; ?>" <?php echo $selected; ?>>
                                    <?php echo htmlspecialchars($rol['nombre_rol']); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="d-flex justify-content-between pt-2">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning fw-bold text-dark">Actualizar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>