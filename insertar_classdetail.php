<?php
// Obtener los datos del formulario
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$dateClassDetail = $_POST["dateClassDetail"];
$quantityStudent = $_POST["quantityStudent"];
$idClass = $_POST["idClass"];
$status=1;

require '../conexion.php';
// Insertar el classdetail en la tabla
$sql = "INSERT INTO classdetail (startTime,endTime,dateClassDetail,quantityStudent,idClass,status) VALUES 
('$startTime','$endTime','$dateClassDetail', '$quantityStudent','$idClass', '$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a classdetail.php con un mensaje de éxito
    header("Location: classdetail.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar classdetail: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
