<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';

// Consulta select a la base de datos para obtener los campos necesarios de AreaType
$selectidAreaType = mysqli_query($conexion, "SELECT idAreaType, nameArea, descriptionAreaType FROM AreaType");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Áreas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Área</h2>
    <form action="insertar_AreaType.php" method="POST">
  
    <div class="form-group">
        <label for="nameArea">nameArea:</label>
        <input class="form-control" type="text"  name="nameArea" id="nameArea">
      </div>
      
      <div class="form-group">
        <label for="descriptionAreaType">descriptionAreaType:</label>
        <input class="form-control" type="text"  name="descriptionAreaType" id="descriptionAreaType">
      </div>
      
      <button type="submit" class="btn btn-primary">Insertar</button>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
