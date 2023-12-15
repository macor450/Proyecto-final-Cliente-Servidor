<?php
// Conexión a la base de datos
require '../conexion.php';

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAreaAplication = $_POST["id"];
    $dateArea = $_POST["dateArea"];
    $descriptionAreaAplication = $_POST["descriptionAreaAplication"];
    $idArea = $_POST["idArea"];
    $idEmployee = $_POST["idEmployee"];
    $idAuthorization = $_POST["idAuthorization"];


    $sql = "UPDATE AreaAplication SET dateArea = '$dateArea', descriptionAreaAplication = '$descriptionAreaAplication', idArea = '$idArea', idEmployee = '$idEmployee', idAuthorization = '$idAuthorization' WHERE idAreaAplication = $idAreaAplication";
    if ($conexion->query($sql) === TRUE) {
        echo "Los cambios se han guardado exitosamente.";
        
        header("refresh:2; url=AreaAplication.php");
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}

// Cerrar mi conexion a la base de datos
$conexion->close();
?>
