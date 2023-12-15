<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
// Consultas select a la base de datos, en este caso a las tablas
$selectidAreaType = mysqli_query($conexion, "SELECT idArea, nameArea FROM Area");
$selectidClass = mysqli_query($conexion, "SELECT idClass, nameClass FROM Class");
$selectidAuthorization = mysqli_query($conexion, "SELECT idAuthorization FROM authorization_");
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
    <form action="insertar_AreaAplication.php" method="POST">
  
    <div class="form-group">
    <label for="dateArea">Fecha:</label>
    <input class="form-control" type="date" name="dateArea" id="dateArea">
</div>
 
        <div class="form-group">
            <label for="descriptionArea">descriptionArea:</label>
            <input class="form-control" type="text" name="description" id="descriptions">
        </div>
        <label for="cmbAreAType" class="form-label">AreaType</label>
        <select name="idArea" id="idArea" class="form-control">
            <?php
            while ($datos = mysqli_fetch_array($selectidAreaType)) {
                ?>
                <option value="<?php echo $datos['idArea'] ?>"> <?php echo $datos['nameArea'] ?> </option>
                <?php
            }
            ?>
        </select>
        <br>

        <br>

        <!-- ComboBox para idClass -->
        <div class="form-group">
            <label for="idClass">ID de Clase:</label>
            <select name="idClass" id="idClass" class="form-control">
                <?php
                while ($class = mysqli_fetch_array($selectidClass)) {
                    echo "<option value='" . $class['idClass'] . "'>" . $class['nameClass'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- ComboBox para idEmployee -->
        <div class="form-group">
            <label for="idEmployee">ID de Empleado:</label>
            <select name="idEmployee" id="idEmployee" class="form-control">
                <?php
                $selectidEmployee = mysqli_query($conexion, "SELECT idEmployee, nameEmployee FROM employee");
                while ($employee = mysqli_fetch_array($selectidEmployee)) {
                    echo "<option value='" . $employee['idEmployee'] . "'>" . $employee['nameEmployee'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- ComboBox para idAuthorization -->
        <div class="form-group">
            <label for="idAuthorization">ID de Autorización:</label>
            <select name="idAuthorization" id="idAuthorization" class="form-control">
                <?php
                while ($authorization = mysqli_fetch_array($selectidAuthorization)) {
                    echo "<option value='" . $authorization['idAuthorization'] . "'>" . $authorization['idAuthorization'] . "</option>";
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
