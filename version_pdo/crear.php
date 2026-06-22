<?php
include "conexion.php";
$sql_roles = "SELECT * FROM roles";
$res_roles = $conn->query($sql_roles);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario - PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0 fs-5">Registrar Nuevo Usuario</h3>
            </div>
            <div class="card-body">
                <form action="insertar.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre Completo:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Juan Pérez" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo Electrónico:</label>
                        <input type="email" name="email" class="form-control" placeholder="juan@ejemplo.com" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Edad:</label>
                        <input type="number" name="edad" class="form-control" min="1" max="120" placeholder="Ej. 25" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Asignar Rol Corporativo:</label>
                        <select name="rol_id" class="form-select" required>
                            <option value="">-- Selecciona un Rol --</option>
                            <?php while ($rol = $res_roles->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre_rol']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="d-flex justify-content-between pt-2">
                        <a href="index.php" class="btn btn-secondary">Cancelar y Volver</a>
                        <button type="submit" class="btn btn-success">Guardar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>