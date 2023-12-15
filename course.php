<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos de la tabla course
$sql = "SELECT idCourse,nameCourse, credit, code, idCareer FROM course WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cursos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cursos</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre del Curso</th>
                    <th>Crédito</th>
                    <th>Código</th>
                    <th>ID de la Carrera</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameCourse']; ?></td>
                        <td><?php echo $row['credit']; ?></td>
                        <td><?php echo $row['code']; ?></td>
                        <td><?php echo $row['idCareer']; ?></td>
                        <td>
                            <form action="eliminar_course.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idCourse']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarCourse.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idCourse']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormCourse.php" class="btn btn-success">Nuevo Curso</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
