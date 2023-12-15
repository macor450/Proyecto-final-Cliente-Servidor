<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos startTime, endTime, dateClassDetail, quantityStudent, idClass de la tabla classdetail
$sql = "SELECT startTime, endTime, dateClassDetail, quantityStudent, idClass FROM classdetail WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Clase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Detalles de Clase</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Hora de Inicio</th>
                    <th>Hora de Finalización</th>
                    <th>Fecha</th>
                    <th>Cantidad de Estudiantes</th>
                    <th>ID de la Clase</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['startTime']; ?></td>
                        <td><?php echo $row['endTime']; ?></td>
                        <td><?php echo $row['dateClassDetail']; ?></td>
                        <td><?php echo $row['quantityStudent']; ?></td>
                        <td><?php echo $row['idClass']; ?></td>
                        <td>
                            <form action="eliminar_classdetail.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idClass']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarClassDetail.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idClass']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormClassDetail.php" class="btn btn-success">Nuevo Detalle de Clase</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
