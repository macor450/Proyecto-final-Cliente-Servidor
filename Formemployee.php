<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
$selectidEmployeeType = mysqli_query($conexion,"SELECT idEmployeeType,nameEmployeeType  FROM employeetype");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Employee</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Employee</h2>
    <form action="insertar_employee.php" method="POST">
                <div>
                         <label for="nameEmployee">nameEmployee:</label>
                         <input class="form-control" type="text"  name="nameEmployee" id="nameEmployee">
                    </div>
                    <div class="form-group">
                        <label for="lastNameEmployee">lastNameEmployee:</label>
                        <input class="form-control" type="text"  name="lastNameEmployee" id="lastNameEmployee">
                    </div>
                    <div class="form-group">
                        <label for="salary">salary:</label>
                        <input class="form-control" type="text"  name="salary" id="salary">
                    </div>
                    <div class="form-group">
                        <label for="nss">nss:</label>
                        <input class="form-control" type="text"  name="nss" id="nss">
                    </div>
                    <div class="form-group">
                        <label for="rfc">rfc:</label>
                        <input class="form-control" type="text"  name="rfc" id="rfc">
                    </div>
                    <div class="form-group">
                        <label for="numberphone">numberphone:</label>
                        <input class="form-control" type="text"  name="numberphone" id="numberphone">
                    </div>    
                    <div class="form-group">
                        <label for="email">email:</label>
                        <input class="form-control" type="text"  name="email" id="email">
                    </div>
                    <label for="CmbEmployeeType" class="form-label">EmployeeType</label>
               <select name="idEmployeeType" id="idEmployeeType" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidEmployeeType))
                    {
                ?>
		        <option value="<?php echo $datos['idEmployeeType']?>"> <?php echo $datos['nameEmployeeType']?> </option>
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
