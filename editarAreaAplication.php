<?php
// Conexión a la base de datos

require "../conexion.php";
//consultas select a la base de datos,en este caso a las 2 tablas
$selectidArea = mysqli_query($conexion,"SELECT idArea,nameArea  FROM Area");
$selectidEmployee = mysqli_query($conexion,"SELECT idEmployee,nameEmployee  FROM Employee");
$selectidClass = mysqli_query($conexion,"SELECT idClass,nameClass  FROM Class");
$selectidAuthorization = mysqli_query($conexion,"SELECT idAuthorization  FROM authorization_");


// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAreaAplication = $_POST["id"];

    // Obtener los datos de la Area a editar
    $sql = "SELECT * FROM AreaAplication WHERE idAreaAplication = $idAreaAplication";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $AreaAplicacion = $resultado->fetch_assoc();

       
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            
            <meta charset="UTF-8">
            <title> Editar Area</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center">Editar Area</h1>
                <form method="POST" action="guardarAreaAplication.php">
                    <input type="hidden" name="id" value="<?php echo $AreaAplicacion['idAreaAplication']; ?>">
                    <div class="form-group">

                        <label for="dateArea">dateArea:</label>
                        <input type="text" id="dateArea" name="dateArea" value="<?php echo $AreaAplicacion['dateArea']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descriptionAreaAplication">descriptionAreaAplication:</label>
                        <input type="text" id="descriptionAreaAplication" name="descriptionAreaAplication" value="<?php echo $AreaAplicacion['descriptionAreaAplication']; ?>" required>
                    </div>
                    <label for="cmbArea" class="form-label">Area</label>
               <select name="idArea" id="idArea" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidArea))
                    {
                ?>
		        <option value="<?php echo $datos['idArea']?>"> <?php echo $datos['nameArea']?> </option>
		        <?php
	        	}
		        ?>
                </select>
                <br>
            
                <label for="cmbBuilding" class="form-label">Employee</label>
               <select name="idEmployee" id="idEmployee" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidEmployee))
                    {
                ?>
		        <option value="<?php echo $datos['idEmployee']?>"> <?php echo $datos['nameEmployee']?> </option>
		        <?php
	        	}
		        ?>
                </select>
                <br>
                
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
                <br>
            
                <label for="cmbAuthorization" class="form-label">Authorization</label>
               <select name="idAuthorization" id="idAuthorization" class="form-control">
			    <?php 
		    	while($datos = mysqli_fetch_array($selectidAuthorization))
                    {
                ?>
		        <option value="<?php echo $datos['idAuthorization']?>"> <?php echo $datos['idAuthorization']?> </option>
		        <?php
	        	}
		        ?>
                </select>
                <br>
                   
                   
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="AreaAplication.php" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró la AreaAplicacion$AreaAplicacion para editar";
    }
}

// Cerrar mi conexión a la base de datos
$conexion->close();
?>
