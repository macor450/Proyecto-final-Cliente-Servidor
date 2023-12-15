<?php
// Obtener los datos del formulario
$authorizationDate = $_POST["authorizationDate"];
$descriptionauthorization = $_POST["descriptionAuthorization"];
$idEmployee = $_POST["idEmployee"];

require '../conexion.php';

// Insertar la Authorization en la tabla
$sql = "INSERT INTO authorization_ (authorizationDate, descriptionAuthorization, idEmployee) VALUES 
('$authorizationDate', '$descriptionauthorization', '$idEmployee')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a Authorization.php con un mensaje de éxito
    header("Location: authorization.php?mensaje=Authorization insertada correctamente");
    exit(); 
} else {
    echo "Error al insertar Authorization: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
