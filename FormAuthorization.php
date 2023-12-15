<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';

// Consulta select a la base de datos para obtener datos de employee
$selectEmployee = mysqli_query($conexion, "SELECT idEmployee, nameEmployee FROM employee");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Authorization</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Authorization</h2>
    <form action="insertar_Authorization.php" method="POST">
    
        <div class="form-group">
    <label for="authorizationDate">Fecha:</label>
    <input class="form-control" type="date" name="authorizationDate" id="authorizationDate">
    </div>
        <div class="form-group">
            <label for="descriptionauthorization">descriptionauthorization:</label>
            <input class="form-control" type="text" name="descriptionauthorization" id="descriptionAuthorization">
        </div>
        <div class="form-group">
            <label for="idEmployee">Employee:</label>
            <select name="idEmployee" id="idEmployee" class="form-control">
                <?php 
                while($employee = mysqli_fetch_array($selectEmployee)) {
                    ?>
                    <option value="<?php echo $employee['idEmployee']; ?>"><?php echo $employee['nameEmployee']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Insertar</button>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
