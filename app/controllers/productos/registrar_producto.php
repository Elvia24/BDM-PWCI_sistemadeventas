<?php
include ('../../config.php');

// Recoge los datos del formulario
$NombreProducto = $_POST['NombreProducto'];
$DescripcionProducto = $_POST['DescripcionProducto'];
$PrecioProducto = $_POST['PrecioProducto'];
$StockProducto = $_POST['StockProducto'];
$ID_Categoria_producto = $_POST['ID_Categoria_producto'];
$id_usuarioSesion = $_POST['id_usuarioSesion'];

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

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    // Insertar datos en la tabla producto
    $query = "INSERT INTO producto (nombre_prod, descripcion_prod, precio_prod, cantDisp_prod, id_Categoria, id_Usuario) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$NombreProducto, $DescripcionProducto, $PrecioProducto, $StockProducto, $ID_Categoria_producto, $id_usuarioSesion]);
    
    // Obtén el ID del producto recién insertado
    $id_producto = $pdo->lastInsertId();

    // Insertar datos en la tabla imagen_video
    foreach ($imagenesInsertadas as $nombreImagen) {
        $query = "INSERT INTO imagen_video (Imagen_Video, id_producto) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$nombreImagen, $id_producto]);
    }

    header('Location:'.$URL.'/Productos/Productos.php');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


// // Procesar el campo de video
// if (isset($_FILES['videoSubido']) && $_FILES['videoSubido']['error'] == 0) {
//     $nombreDelArchivoVideo = date("Y-m-d-h-i-s") . "__" . $_FILES['videoSubido']['name'];
//     $locationVideo = $directorioImagenes . $nombreDelArchivoVideo;

//     if (move_uploaded_file($_FILES['videoSubido']['tmp_name'], $locationVideo)) {
//         echo("la video se a subiro con exito");
//         // El video se ha subido con éxito
//         // Puedes hacer lo que necesites con la información del video
//     } else {
//         echo("Error al subir la video");
//         // Error al mover el video
//     }
// }


// $sentencia= $pdo->prepare("INSERT INTO categoria (nombre_cate,descripcion_cate,id_usuario) 
// VALUES (:nombre_categoria,:descripcion_categoria,:ID_usuario_sesion)");

// $sentencia->bindParam('nombre_categoria',$nombre_categoria);
// $sentencia->bindParam('descripcion_categoria',$descripcion_categoria);
// $sentencia->bindParam('ID_usuario_sesion',$ID_usuario_sesion);

// if($sentencia->execute()){
//     session_start();
//     $_SESSION['mensaje']="Se Registro la categoria  de manera correcta";
//     $_SESSION['icono']="success";
// ?>
 <script >
    
    //  location.href="<?php echo $URL;?>/Categorias/Categorias.php";
 </script>
 <?php
// }else{
//     session_start();
//     $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
//     $_SESSION['icono']="error";
// }
?>

