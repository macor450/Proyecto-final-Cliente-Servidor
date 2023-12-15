<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "areaservices");
// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los campos bookTitle, authorName, publisher, inStock, idArea e idCourse de la tabla bookcatalog
$sql = "SELECT idBookCatalog,bookTitle, authorName, publisher, inStock, idArea, idCourse FROM bookcatalog WHERE status=1";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Catálogo de Libros</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Author Name</th>
                    <th>Publisher</th>
                    <th>In Stock</th>
                    <th>ID Area</th>
                    <th>ID Course</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['bookTitle']; ?></td>
                        <td><?php echo $row['authorName']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                        <td><?php echo $row['inStock']; ?></td>
                        <td><?php echo $row['idArea']; ?></td>
                        <td><?php echo $row['idCourse']; ?></td>
                        <td>
                            <form action="eliminar_book.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idBookCatalog']; ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="editarbookcatalog.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['idBookCatalog']; ?>">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       
        <a href="../menu.html" class="btn btn-danger">Volver</a>
        <a href="Formbookcatalog.php" class="btn btn-success">Nuevo Libro</a>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
