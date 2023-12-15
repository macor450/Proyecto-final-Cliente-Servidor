<?php
// Verificar si se ha pasado un mensaje en la URL
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    // Mostrar el mensaje de alerta
    echo "<script>alert('$mensaje');</script>";
}

require '../conexion.php';
$selectidAreaType = mysqli_query($conexion, "SELECT idArea, nameArea FROM Area");
$selectidCourse = mysqli_query($conexion, "SELECT idCourse, nameCourse FROM Course");
// Consulta select a la base de datos para obtener datos de bookcatalog
$selectBookCatalog = mysqli_query($conexion, "SELECT idBookCatalog, bookTitle, authorName, publisher, inStock, idArea, idCourse FROM bookcatalog");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulario para insertar Libros</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Insertar Libros</h2>
    <form action="insertar_bookcatalog.php" method="POST">
        <div class="form-group">
            <label for="bookTitle">Título del Libro:</label>
            <input class="form-control" type="text" name="bookTitle" id="bookTitle">
        </div>
        <div class="form-group">
            <label for="authorName">Nombre del Autor:</label>
            <input class="form-control" type="text" name="authorName" id="authorName">
        </div>
        <div class="form-group">
            <label for="publisher">Editorial:</label>
            <input class="form-control" type="text" name="publisher" id="publisher">
        </div>
        <div class="form-group">
            <label for="inStock">Stock:</label>
            <input class="form-control" type="number" name="inStock" id="inStock">
        </div>
        <label for="cmbAreAType" class="form-label">Area</label>
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
      
        <label for="cmbCourse" class="form-label">Course</label>
        <select name="idCourse" id="idCourse" class="form-control">
            <?php
            while ($datos = mysqli_fetch_array($selectidCourse)) {
                ?>
                <option value="<?php echo $datos['idCourse'] ?>"> <?php echo $datos['nameCourse'] ?> </option>
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
