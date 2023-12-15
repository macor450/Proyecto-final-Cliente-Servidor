<?php
// Obtener los datos del formulario
$nameClass = $_POST["nameClass"];
$descriptionClass = $_POST["descriptionClass"];
$idCourse = $_POST["idCourse"];
$status=1;

require '../conexion.php';
// Insertar el class en la tabla
$sql = "INSERT INTO class(nameClass,descriptionClass,idCourse,status) VALUES 
('$nameClass','$descriptionClass','$idCourse','$status')";



if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a careerName.php con un mensaje de éxito
    header("Location: class.php?mensaje=class insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar class: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
