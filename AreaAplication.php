<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar todos los usuarios
$sql = "SELECT * FROM AreaAplication WHERE status=1";
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
    <title>AreaAplication</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">AreaAplication</h1>
        <table class="table table-light">
            <thead>
                <tr>
    
                    <th>dateArea</th>
                    <th>descriptionAreaAplication</th>
                    <th>idArea</th>                                           
                    <th>idEmployee</th>
                    <th>idClass</th>
                    <th>idAuthorization</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                       
                        <td><?php echo $row['dateArea']; ?></td>
                        <td><?php echo $row['descriptionAreaAplication']; ?></td>
                        <td><?php echo $row['idArea']; ?></td>
                        <td><?php echo $row['idEmployee']; ?></td>
                        <td><?php echo $row['idAuthorization']; ?></td>             
                        <td>
                        <form action="eliminar_AreaAplication.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['idAreaAplication']; ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
                <td>
                            <form action="editarAreaAplication.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idAreaAplication']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                <td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
          <a href="../menu.html" class="btn btn-danger">Volver</a>
          <a href="FormAreaAplication.php" class="btn btn-success">Ingresar Nuevo Registro</a>

     
    </div>
</body>
</html>
