<?php
// Conexión a la base de datos
require "../conexion.php";

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener los datos de las áreas
$selectAreas = mysqli_query($conexion, "SELECT idArea, nameArea FROM area");

// Consulta para obtener los datos de los cursos
$selectCourses = mysqli_query($conexion, "SELECT idcourse, nameCourse FROM course");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idBook = $_POST["id"];

    // Obtener los datos del libro a editar
    $sql = "SELECT * FROM bookcatalog WHERE id=$idBookCatalog";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $book = $resultado->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Editar Libro</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center">Editar Libro</h1>
                <form method="POST" action="guardarLibro.php">
                    <input type="hidden" name="id" value="<?php echo $book['idBookCatalog']; ?>">
                   
                    <div class="form-group">
                        <label for="bookTitle">Título del Libro:</label>
                        <input type="text" id="bookTitle" name="bookTitle" value="<?php echo $book['BookTitle']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="authorName">Nombre del Autor:</label>
                        <input type="text" id="authorName" name="authorName" value="<?php echo $book['AuthorName']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="publisher">Editorial:</label>
                        <input type="text" id="publisher" name="publisher" value="<?php echo $book['Publisher']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="inStock">En Stock:</label>
                        <input type="number" id="inStock" name="inStock" value="<?php echo $book['InStock']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="idArea">ID Área:</label>
                        <select name="idArea" id="idArea" class="form-control" required>
                            <?php 
                            while($area = mysqli_fetch_array($selectAreas)) {
                                ?>
                                <option value="<?php echo $area['idArea']; ?>" <?php if ($area['idArea'] == $book['ID Area']) echo 'selected'; ?>><?php echo $area['areaName']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="idCourse">ID Curso:</label>
                        <select name="idCourse" id="idCourse" class="form-control" required>
                            <?php 
                            while($course = mysqli_fetch_array($selectCourses)) {
                                ?>
                                <option value="<?php echo $course['idCourse']; ?>" <?php if ($course['idCourse'] == $book['ID Course']) echo 'selected'; ?>><?php echo $course['courseName']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="bookcatalog.php" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </body>
        </html>
<?php
    } else {
        echo "No se encontró el libro para editar";
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
