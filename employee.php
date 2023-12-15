<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos de la tabla employee
$sql = "SELECT idEmployee,nameEmployee, lastNameEmployee, salary, nss, rfc, numberphone, email FROM employee WHERE Status = 1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Empleados</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Salario</th>
                    <th>NSS</th>
                    <th>RFC</th>
                    <th>Número de Teléfono</th>
                    <th>Email</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['nameEmployee']; ?></td>
                        <td><?php echo $row['lastNameEmployee']; ?></td>
                        <td><?php echo $row['salary']; ?></td>
                        <td><?php echo $row['nss']; ?></td>
                        <td><?php echo $row['rfc']; ?></td>
                        <td><?php echo $row['numberphone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <form action="eliminar_employee.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idEmployee']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarEmployee.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idEmployee']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="FormEmployee.php" class="btn btn-success">Nuevo Empleado</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
