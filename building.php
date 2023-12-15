<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos number y descriptionBuilding de la tabla building
$sql = "SELECT idBuilding,number, descriptionBuilding FROM building WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edificios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edificios</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Descripción</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['descriptionBuilding']; ?></td>
                        <td>
                            <form action="eliminar_building.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idBuilding']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarBuilding.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idBuilding']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormBuilding.php" class="btn btn-success">Nuevo Edificio</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
