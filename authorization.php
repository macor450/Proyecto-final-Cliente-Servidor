<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos authorizationDate, descriptionauthorization_ e idEmployee de la tabla authorization_
$sql = "SELECT idAuthorization,authorizationDate, descriptionAuthorization, idEmployee FROM authorization_ WHERE status =1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autorizaciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Autorizaciones</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Authorization Date</th>
                    <th>Description</th>
                    <th>ID Employee</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['authorizationDate']; ?></td>
                        <td><?php echo $row['descriptionAuthorization']; ?></td>
                        <td><?php echo $row['idEmployee']; ?></td>
                        <td>
                            <form action="eliminar_authorization.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idAuthorization']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarAuthorization.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idAuthorization']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormAuthorization.php" class="btn btn-success">Nueva Autorización</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
