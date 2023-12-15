<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consultas select a la base de datos,en este caso a las 2 tablas
$selectidAreaType = mysqli_query($conexion,"SELECT idAreaType,nameArea  FROM AreaType");
$selectidBuilding = mysqli_query($conexion,"SELECT idBuilding,number  FROM Building");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Career Name</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar careerName</h2>
    <form action="insertar_career.php" method="POST">
                  
                    <div class="form-group">
                        <label for="careerName">careerName:</label>
                        <input class="form-control" type="text"  name="careerName" id="careerName">
                    </div>
                    <div class="form-group">
                        <label for="descriptionCareer">descriptionCareer:</label>
                        <input class="form-control" type="text"  name="descriptionCareer" id="descriptionCareer">
                    </div>
              
                <br>
      <button type="submit" class="btn btn-primary">Insertar</button>
      
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
