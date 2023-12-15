<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consulta
$selectidCourse = mysqli_query($conexion,"SELECT idCourse,nameCourse  FROM Course");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar class</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Class</h2>
    <form action="insertar_class.php" method="POST">
   
                <div>
                         <label for="nameClass">nameClass:</label>
                         <input class="form-control" type="text"  name="nameClass" id="nameClass">
                    </div>
                    <div class="form-group">
                        <label for="descriptionClass">descriptionClass:</label>
                        <input class="form-control" type="text"  name="descriptionClass" id="descriptionClass">
                    </div>               
                    <label for="cmbCourse" class="form-label">Course </label>
               <select name="idCourse" id="idCourse" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidCourse))
                    {
                ?>
		        <option value="<?php echo $datos['idCourse']?>"> <?php echo $datos['nameCourse']?> </option>
		        <?php
	        	}
		        ?>
                </select>
                <br>
            
             
                <br>
      <button type="submit" class="btn btn-primary">Insertar</button>
      
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
