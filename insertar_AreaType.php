<?php
// Obtener los datos del formulario
$idAreaType = $_POST["id"];
$nameArea = $_POST["nameArea"];
$descriptionAreaType = $_POST["descriptionAreaType"];

require '../conexion.php';

// Insertar los datos en la tabla AreaType
$sql = "INSERT INTO AreaType (nameArea, descriptionAreaType) VALUES ('$nameArea', '$descriptionAreaType')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a AreaType.php con un mensaje de éxito
    header("Location: AreaType.php?mensaje=Área insertada correctamente");
    exit(); 
} else {
    echo "Error al insertar Área: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
