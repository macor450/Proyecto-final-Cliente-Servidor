<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Edificios</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Edificio</h2>
    <form action="insertar_building.php" method="POST">
                   <div>
                         <label for="number">numero Edificio:</label>
                         <input class="form-control" type="number"  name="number" id="number">
                    </div>
                    <div>
                         <label for="descriptionBuilding">descriptionBuilding:</label>
                         <input class="form-control" type="text"  name="descriptionBuilding" id="descriptionBuilding">
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
