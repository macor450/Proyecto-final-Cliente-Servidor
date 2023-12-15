<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos nameArea, descriptionAreaType y status de la tabla AreaType
$sql = "SELECT idAreaType,nameArea, descriptionAreaType, status FROM AreaType WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Áreas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Áreas</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Name Area</th>
                    <th>Description Area Type</th>
                    <th>Status</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameArea']; ?></td>
                        <td><?php echo $row['descriptionAreaType']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <form action="eliminar_AreaType.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idAreaType']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarAreaType.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idAreaType']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormAreaType.php" class="btn btn-success">Nuevo Registro</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
