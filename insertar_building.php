<?php
// Obtener los datos del formulario
$number = $_POST["number"];
$descriptionBuilding = $_POST["descriptionBuilding"];
$status=1;

require '../conexion.php';
// Insertar el Area en la tabla
$sql = "INSERT INTO building (number,descriptionBuilding,status) VALUES 
('$number','$descriptionBuilding','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a Area.php con un mensaje de éxito
    header("Location: building.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar Area: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
