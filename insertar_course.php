<?php
// Obtener los datos del formulario
$nameCourse = $_POST["nameCourse"];
$credit = $_POST["credit"];
$code = $_POST["code"];
$idCareer = $_POST["idCareer"];
$status=1;


require '../conexion.php';
// Insertar el course en la tabla
$sql = "INSERT INTO course (nameCourse,credit,code,idCareer,status) VALUES 
('$nameCourse','$credit','$code', '$idCareer','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a Area.php con un mensaje de éxito
    header("Location: course.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar course: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
