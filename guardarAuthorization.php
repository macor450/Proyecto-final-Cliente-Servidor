<?php
// Conexión a la base de datos
require '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idAuthorization = $_POST["id"];
    $authorizationDate = $_POST["authorizationDate"];
    $descriptionauthorization = $_POST["descriptionauthorization"];
    $idEmployee = $_POST["idEmployee"];

    // Realizar la inserción o actualización en la base de datos
    $sql = "UPDATE authorization_ SET authorizationDate = '$authorizationDate', descriptionauthorization = '$descriptionauthorization', idEmployee = '$idEmployee' WHERE idAuthorization = $idAuthorization";

    if ($conexion->query($sql) === TRUE) {
        echo "Los cambios se han guardado exitosamente.";
        header("refresh:2; url=Authorization.php");
    } else {
        echo "Error al guardar los cambios: " . $conexion->error;
    }
}

// Cerrar mi conexion a la base de datos
$conexion->close();
?>
