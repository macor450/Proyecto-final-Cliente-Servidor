<?php
// Conexión a la base de datos

require "../conexion.php";
//consultas select a la base de datos,en este caso a las 2 tablas
$selectidAreaType = mysqli_query($conexion,"SELECT idAreaType,nameArea  FROM AreaType");
$selectidBuilding = mysqli_query($conexion,"SELECT idBuilding,number  FROM Building");


// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idArea = $_POST["id"];

    // Obtener los datos de la Area a editar
    $sql = "SELECT * FROM Area WHERE idArea = $idArea";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $asignatura = $resultado->fetch_assoc();

       
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
                <form method="POST" action="guardarArea.php">
                    <input type="hidden" name="id" value="<?php echo $asignatura['idArea']; ?>">
                    <div class="form-group">

                        <label for="nameArea">nameArea:</label>
                        <input type="text" id="nameArea" name="nameArea" value="<?php echo $asignatura['nameArea']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="number">number:</label>
                        <input type="text" id="number" name="number" value="<?php echo $asignatura['number']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descriptionArea">descriptionArea:</label>
                        <input type="text" id="descriptionArea" name="descriptionArea" value="<?php echo $asignatura['descriptionArea']; ?>" required>
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
                   
                   
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="Area.php" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró la asignatura para editar";
    }
}

// Cerrar mi conexión a la base de datos
$conexion->close();
?>
