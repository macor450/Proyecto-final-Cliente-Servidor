<?php
// Conexión a la base de datos
require "../conexion.php";

// Consulta select a la base de datos solo para los campos que necesitas
$selectidAreaType = mysqli_query($conexion, "SELECT idAreaType, nameArea, descriptionAreaType FROM AreaType");

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idArea = $_POST["id"];

    // Obtener los datos de AreaType a editar
    $sql = "SELECT * FROM AreaType WHERE idAreaType = $idArea";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $areaType = $resultado->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Editar AreaType</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center">Editar AreaType</h1>
                <form method="POST" action="guardarAreaType.php">
                    <input type="hidden" name="id" value="<?php echo $areaType['idAreaType']; ?>">
                    <div class="form-group">
                        <label for="nameArea">nameArea:</label>
                        <input type="text" id="nameArea" name="nameArea" value="<?php echo $areaType['nameArea']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descriptionAreaType">descriptionAreaType:</label>
                        <input type="text" id="descriptionAreaType" name="descriptionAreaType" value="<?php echo $areaType['descriptionAreaType']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="Area.php" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </body>
        </html>
<?php
    } else {
        echo "No se encontró el ÁreaType para editar";
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
