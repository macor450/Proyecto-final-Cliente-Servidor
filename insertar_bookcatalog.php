<?php
// Obtener los datos del formulario
$bookTitle = $_POST["bookTitle"];
$authorName = $_POST["authorName"];
$publisher = $_POST["publisher"];
$inStock = $_POST["inStock"];
$idArea = $_POST["idArea"];
$idCourse = $_POST["idCourse"];
$status=1;



require '../conexion.php';
// Insertar el Area en la tabla
$sql = "INSERT INTO bookcatalog (bookTitle,authorName,publisher,inStock,idArea,idCourse,status) VALUES 
('$bookTitle','$authorName','$publisher', '$inStock','$idArea', '$idCourse','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a Area.php con un mensaje de éxito
    header("Location: bookcatalog.php?mensaje=Area insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar Area: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
