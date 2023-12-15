<?php
// Obtener los datos del formulario
$idArea = $_POST["id"];
$nameArea = $_POST["nameArea"];
$number = $_POST["number"];
$descriptionArea = $_POST["descriptionArea"];
$idAreaType = $_POST["idAreaType"];
$idBuilding = $_POST["idBuilding"];
$status=1;

require '../conexion.php';
// Insertar el Area en la tabla
$sql = "INSERT INTO Area (nameArea,number,descriptionArea,idAreaType,idBuilding,status) VALUES 
('$nameArea','$number','$descriptionArea', '$idAreaType','$idBuilding', '$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a Area.php con un mensaje de éxito
    header("Location: Area.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar Area: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
