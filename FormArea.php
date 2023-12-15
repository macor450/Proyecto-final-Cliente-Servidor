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
  <title>Formulario para insertar Areas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Area</h2>
    <form action="insertar_Area.php" method="POST">
                <div>
                         <label for="nameArea">nameArea:</label>
                         <input class="form-control" type="text"  name="nameArea" id="nameArea">
                    </div>
                    <div class="form-group">
                        <label for="number">number:</label>
                        <input class="form-control" type="text"  name="number" id="number">
                    </div>
                    <div class="form-group">
                        <label for="descriptionArea">descriptionArea:</label>
                        <input class="form-control" type="text"  name="descriptionArea" id="descriptionArea">
                    </div>
                    <label for="cmbAreAType" class="form-label">AreaType</label>
               <select name="idAreaType" id="idAreaType" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidAreaType))
                    {
                ?>
		        <option value="<?php echo $datos['idAreaType']?>"> <?php echo $datos['nameArea']?> </option>
		        <?php
	        	}
		        ?>
                </select>
                <br>
            
                <label for="cmbBuilding" class="form-label">Building</label>
               <select name="idBuilding" id="idBuilding" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidBuilding))
                    {
                ?>
		        <option value="<?php echo $datos['idBuilding']?>"> <?php echo $datos['number']?> </option>
		        <?php
	        	}
		        ?>
                </select>
                <br>
      <button type="submit" class="btn btn-primary">Insertar</button>
      
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
