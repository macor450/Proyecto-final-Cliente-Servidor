<?php
// Conexión a la base de datos
require "../conexion.php";

// Consulta para obtener los datos de la tabla Authorization
$selectAuthorization = mysqli_query($conexion, "SELECT idAuthorization, authorizationDate, descriptionauthorization, idEmployee FROM authorization_");

// Consulta para obtener los datos de la tabla Employee
$selectEmployee = mysqli_query($conexion, "SELECT idEmployee,nameEmployee FROM employee");

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAuthorization = $_POST["id"];

    // Obtener los datos de Authorization a editar
    $sql = "SELECT * FROM authorization_ WHERE idAuthorization = $idAuthorization";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $authorization = $resultado->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Editar Authorization</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center">Editar Authorization</h1>
                <form method="POST" action="guardarAuthorization.php">
                    <input type="hidden" name="id" value="<?php echo $authorization['idAuthorization']; ?>">
                    <div class="form-group">
                        <label for="authorizationDate">authorizationDate:</label>
                        <input type="text" id="authorizationDate" name="authorizationDate" value="<?php echo $authorization['authorizationDate']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="descriptionauthorization">descriptionauthorization:</label>
                        <input type="text" id="descriptionauthorization" name="descriptionauthorization" value="<?php echo $authorization['descriptionAuthorization']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="idEmployee">idEmployee:</label>
                        <select name="idEmployee" id="idEmployee" class="form-control">
                            <?php 
                            while($employee = mysqli_fetch_array($selectEmployee)) {
                                ?>
                                <option value="<?php echo $employee['idEmployee']; ?>" <?php if ($employee['idEmployee'] == $authorization['idEmployee']) echo 'selected'; ?>><?php echo $employee['nameEmployee']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="Authorization.php" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </body>
        </html>
<?php
    } else {
        echo "No se encontró la autorización para editar";
    }
}

// Cerrar mi conexión a la base de datos
$conexion->close();
?>
