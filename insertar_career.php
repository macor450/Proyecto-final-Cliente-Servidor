<?php
// Obtener los datos del formulario
$careerName = $_POST["careerName"];
$descriptionCareer = $_POST["descriptionCareer"];
$status=1;

require '../conexion.php';
// Insertar el careerName en la tabla
$sql = "INSERT INTO career (careerName,descriptionCareer,status) VALUES 
('$careerName','$descriptionCareer','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a careerName.php con un mensaje de éxito
    header("Location: career.php?mensaje=career insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar careerName: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
