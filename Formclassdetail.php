<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
//consultas select a la base de datos,en este caso a las 2 tablas

$selectidClass = mysqli_query($conexion,"SELECT idClass,nameClass  FROM Class");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Areas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Class Detail</h2>
    <form action="insertar_classdetail.php" method="POST">
    

                    <div class="form-group">
                   <label for="startTime">startTime:</label>
                   <input class="form-control" type="time" name="startTime" id="startTime">
                    </div>
                    <div class="form-group">
                   <label for="endTime">Hora de finalización:</label>
                   <input class="form-control" type="time" name="endTime" id="endTime">
                    </div>

                  <!--Date -->
                  <div class="form-group">
             <label for="dateClassDetail">dateClassDetail:</label>
           <input class="form-control" type="date" name="dateClassDetail" id="dateClassDetail">
            </div>


                    <div class="form-group">
                        <label for="quantityStudent">quantityStudent:</label>
                        <input class="form-control" type="text"  name="quantityStudent" id="quantityStudent">
                    </div>
                    <label for="cmbClass" class="form-label">Class</label>
               <select name="idClass" id="idClass" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidClass))
                    {
                ?>
		        <option value="<?php echo $datos['idClass']?>"> <?php echo $datos['nameClass']?> </option>
		        <?php
	        	}
		        ?>
                </select>
      <button type="submit" class="btn btn-primary">Insertar</button>
      
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
