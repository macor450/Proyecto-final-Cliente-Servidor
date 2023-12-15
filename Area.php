<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar todos los usuarios
$sql = "SELECT * FROM Area WHERE status=1";
$resultado = $conexion->query($sql);

// Obtener el número total de usuarios
$totalUsuarios = $resultado->num_rows;

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Area</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Area</h1>
        <table class="table table-light">
            <thead>
                <tr>
               
                    <th>nameArea</th>
                    <th>number</th>
                    <th>descriptionArea</th>                                           
                    <th>idAreaType</th>
                    <th>idBuilding</th>
                    <th>status</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                       
                        <td><?php echo $row['nameArea']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['descriptionArea']; ?></td>
                        <td><?php echo $row['idAreaType']; ?></td>
                        <td><?php echo $row['idBuilding']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                        <form action="eliminar_Area.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['idArea']; ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
                <td>
                            <form action="editarArea.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idArea']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                <td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
          <a href="../menu.html" class="btn btn-danger">Volver</a>
          <a href="FormArea.php" class="btn btn-success">Nuevo Registro</a>

     
    </div>
</body>
</html>
