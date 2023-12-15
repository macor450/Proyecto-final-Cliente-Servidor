<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos nameClass, descriptionClass e idCourse de la tabla class
$sql = "SELECT idClass,nameClass, descriptionClass, idCourse FROM class WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clases</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Clases</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre de la Clase</th>
                    <th>Descripción</th>
                    <th>ID del Curso</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameClass']; ?></td>
                        <td><?php echo $row['descriptionClass']; ?></td>
                        <td><?php echo $row['idCourse']; ?></td>
                        <td>
                            <form action="eliminar_class.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idClass']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarClass.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idClass']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormClass.php" class="btn btn-success">Nueva Clase</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
