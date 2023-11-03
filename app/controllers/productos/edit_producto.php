<?php


include ('../../config.php');

// Recoge los datos del formulario
 $NombreProducto = $_POST['NombreProducto'];
 $DescripcionProducto = $_POST['DescripcionProducto'];
 $PrecioProducto = $_POST['PrecioProducto'];
 $StockProducto = $_POST['StockProducto'];
 $ID_Categoria_producto = $_POST['ID_Categoria_producto'];
 $id_usuarioSesion = $_POST['id_usuarioSesion'];

 $ID_producto = $_POST['ID_producto'];


// Directorio donde se guardarán las imágenes
$directorioImagenes = "../productos/imageProductos/";

// Procesar las imágenes
$imagenesInsertadas = array();
for ($i = 1; $i <= 4; $i++) {
    $nombreCampoImagen = "ArchivoSubido" . $i;

    if (isset($_FILES[$nombreCampoImagen]) && $_FILES[$nombreCampoImagen]['error'] == 0) {
        $nombreDelArchivo = date("Y-m-d-h-i-s") . "__" . $_FILES[$nombreCampoImagen]['name'];
        $location = $directorioImagenes . $nombreDelArchivo;

        if (move_uploaded_file($_FILES[$nombreCampoImagen]['tmp_name'], $location)) {
            // La imagen se ha subido con éxito
            // Guarda el nombre del archivo en el array $imagenesInsertadas
            $imagenesInsertadas[] = $nombreDelArchivo;
        } else {
            echo "Error al subir el archivo";
        }
    }
}


echo "Nombre del Producto: " . $NombreProducto . "<br>";
echo "Descripción del Producto: " . $DescripcionProducto . "<br>";
echo "Precio del Producto: " . $PrecioProducto . "<br>";
echo "Stock del Producto: " . $StockProducto . "<br>";
echo "ID de Categoría del Producto: " . $ID_Categoria_producto . "<br>";
echo "ID del Usuario de Sesión: " . $id_usuarioSesion . "<br>";

// Visualizar los nombres de los archivos subidos
echo "Archivos subidos con éxito:";
echo "<ul>";
foreach ($imagenesInsertadas as $nombreArchivo) {
    echo "<li>$nombreArchivo</li>";
}
echo "</ul>";

        try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    // Supongamos que $id_producto es el ID del producto que deseas editar
    $id_producto = $ID_producto; // Reemplaza 123 con el ID del producto que deseas editar

    // Actualizar datos en la tabla producto
    $query = "UPDATE producto SET nombre_prod = ?, descripcion_prod = ?, precio_prod = ?, cantDisp_prod = ?, id_Categoria = ? WHERE ID_producto =?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$NombreProducto, $DescripcionProducto, $PrecioProducto, $StockProducto, $ID_Categoria_producto, $id_producto]);

    // Actualizar datos en la tabla imagen_video
      // Obtener la lista de IDs de filas existentes en la tabla imagen_video relacionadas con el producto
    $query = "SELECT ID_Img_Vid FROM imagen_video WHERE id_producto = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_producto]);
    $existingIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Actualizar o insertar datos en la tabla imagen_video
    foreach ($imagenesInsertadas as $nombreArchivo) {
        // Verificar si el nombre de archivo ya tiene un ID en la tabla
        if (in_array($nombreArchivo, $existingIDs)) {
            // Actualizar la fila existente
            $query = "UPDATE imagen_video SET Imagen_Video = ? WHERE id_producto = ? AND Imagen_Video = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$nombreArchivo, $id_producto, $nombreArchivo]);
        } 
    }


            // header('Location:'.$URL.'/Productos/Productos.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

?>