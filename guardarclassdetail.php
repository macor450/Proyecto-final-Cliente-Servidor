<?php
// Conexión a la base de datos
require '../conexion.php';

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idArea = $_POST["id"];
    $nameArea = $_POST["nameArea"];
    $number = $_POST["number"];
    $descriptionArea = $_POST["descriptionArea"];
    $idAreaType = $_POST["idAreaType"];
    $idBuilding = $_POST["idBuilding"];

 
    // Aquí puedes realizar las acciones de validación y guardar los cambios en la base de datos
    // Por ejemplo, ejecutar una consulta SQL UPDATE para actualizar los datos de la asignatura

    $sql = "UPDATE Area SET nameArea = '$nameArea', number = '$number', descriptionArea = '$descriptionArea', idAreaType = '$idAreaType', idBuilding = '$idBuilding' WHERE idArea = $idArea";
    if ($conexion->query($sql) === TRUE) {
        echo "Los cambios se han guardado exitosamente.";
        header("refresh:2; url=Area.php");
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
