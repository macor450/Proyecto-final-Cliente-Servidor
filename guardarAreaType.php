<?php
// Conexión a la base de datos
require '../conexion.php';

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAreaType = $_POST["id"];
    $nameArea = $_POST["nameArea"];
    $descriptionAreaType = $_POST["descriptionAreaType"];

    $sql = "UPDATE AreaType SET nameArea = '$nameArea', descriptionAreaType = '$descriptionAreaType' WHERE idAreaType = $idAreaType";

    if ($conexion->query($sql) === TRUE) {
        echo "Los cambios se han guardado exitosamente.";
        header("refresh:2; url=AreaType.php");
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}

// Cerrar mi conexión a la base de datos
$conexion->close();
?>
