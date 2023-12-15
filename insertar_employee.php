<?php
// Obtener los datos del formulario
$nameEmployee = $_POST["nameEmployee"];
$lastNameEmployee = $_POST["lastNameEmployee"];
$salary = $_POST["salary"];
$nss = $_POST["nss"];
$rfc = $_POST["rfc"];
$numberphone = $_POST["numberphone"];
$email = $_POST["email"];
$idEmployeeType = $_POST["idEmployeeType"];
$status=1;


require '../conexion.php';
// Insertar el employee en la tabla
$sql = "INSERT INTO employee (nameEmployee,lastNameEmployee,salary,nss,rfc,numberphone,email,idEmployeeType,status) VALUES 
('$nameEmployee','$lastNameEmployee','$salary','$nss','$rfc','$numberphone','$email','$idEmployeeType','$status')";

if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a Area.php con un mensaje de éxito
    header("Location: employee.php?mensaje=employee insertado correctamente");
    exit(); 
} else {
    echo "Error al insertar employee: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
