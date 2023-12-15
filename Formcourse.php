<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consultas select a la base de datos,en este caso a las 2 tablas
$selectidCareer = mysqli_query($conexion,"SELECT idCareer,careerName  FROM career");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar course</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Course</h2>
    <form action="insertar_course.php" method="POST">
                <div>
               

                         <label for="nameCourse">nameCourse:</label>
                         <input class="form-control" type="text"  name="nameCourse" id="nameCourse">
                    </div>
                    <div class="form-group">
                        <label for="credit">credit:</label>
                        <input class="form-control" type="numeric"  name="credit" id="credit">
                    </div>
                    <div class="form-group">
                        <label for="code">code:</label>
                        <input class="form-control" type="text"  name="code" id="code">
                    </div>
                    <label for="cmbCareer" class="form-label">Career</label>
               <select name="idCareer" id="idCareer" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidCareer))
                    {
                ?>
		        <option value="<?php echo $datos['idCareer']?>"> <?php echo $datos['careerName']?> </option>
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
