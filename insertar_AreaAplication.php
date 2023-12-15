<?php
require '../conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $dateArea = $_POST['dateArea'];
    $descriptionAreaAplication = $_POST['description'];
    $idArea = $_POST['idArea'];
    $idEmployee = $_POST['idEmployee'];
    $idClass = $_POST['idClass'];
    $idAuthorization = $_POST['idAuthorization'];

    $query = "INSERT INTO AreaAplication (dateArea,descriptionAreaAplication, idArea, idEmployee,idClass, idAuthorization)
              VALUES ('$dateArea','$descriptionAreaAplication', '$idArea', '$idEmployee','$idClass', '$idAuthorization')";

    if (mysqli_query($conexion, $query)) {
        $mensaje = "Registro insertado correctamente.";
        header("Location: AreaAplication.php?mensaje=" . urlencode($mensaje)); 
        exit();
    } else {
        $error = "Error al insertar el registro: " . mysqli_error($conexion);
        header("Location: AreaAplication.php?mensaje=" . urlencode($error)); 
        exit();
    }
} else {
    $mensaje = "Acceso denegado.";
    header("Location: AreaAplication.php?mensaje=" . urlencode($mensaje)); 
    exit();
}
?>
