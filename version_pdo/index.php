<?php
include "conexion.php";

try {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Seguro con PDO (2 Tablas)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0 fs-4">Gestión de Usuarios (Panel Seguro PDO)</h2>
                <a href="crear.php" class="btn btn-light btn-sm text-primary fw-bold">+ Nuevo Usuario</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Edad</th>
                                <th>Rol de Usuario</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($fila['id']); ?></td>
                                <td class="fw-semibold"><?php echo htmlspecialchars($fila['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($fila['email']); ?></td>
                                <td><span class="badge bg-secondary"><?php echo htmlspecialchars($fila['edad']); ?> años</span></td>
                                <td><span class="badge bg-info text-dark fw-bold"><?php echo htmlspecialchars($fila['nombre_rol']); ?></span></td>
                                <td class="text-center">
                                    <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm me-1">Editar</a>
                                    <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>