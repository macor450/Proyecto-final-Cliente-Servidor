<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos careerName y descriptionCareer de la tabla career
$sql = "SELECT idCareer,careerName, descriptionCareer FROM career WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carreras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Carreras</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre de la Carrera</th>
                    <th>Descripción</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['careerName']; ?></td>
                        <td><?php echo $row['descriptionCareer']; ?></td>
                        <td>
                            <form action="eliminar_career.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idCareer']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarCareer.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idCareer']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormCareer.php" class="btn btn-success">Nueva Carrera</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
