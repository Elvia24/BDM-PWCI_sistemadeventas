<?php
include ('../../config.php');


    $NombreProducto = $_POST['NombreProducto'];
    $DescripcionProducto = $_POST['DescripcionProducto'];
    // $ArchivoSubido1 = $_POST['ArchivoSubido1_I'];
    // $ArchivoSubido2 = $_POST['ArchivoSubido2_I'];
    // $ArchivoSubido3 = $_POST['ArchivoSubido3_I'];
    // $ArchivoSubido4 = $_POST['ArchivoSubido4_I'];
    $ID_Categoria_producto = $_POST['ID_Categoria_producto'];
    $venta_cotizar = $_POST['opcion'];
    $precioProducto = $_POST['precioProducto'];
    $Cantidad_Disponible = $_POST['CantidadDisponible'];
    $id_usuarioSesion = $_POST['id_usuarioSesion'];

    //*nombre imagen1*// 
    $nombreDelArchivo1=date("Y-m-d-h-i-s");
    $filename1=$nombreDelArchivo1."__".$_FILES['ArchivoSubido1']['name']; //NOMBRE DEL IMAGEN 1
    $location1="../productos/imageProductos/".$filename1; //UBIACION DE LA IMAGEN

    $nombreDelArchivo2=date("Y-m-d-h-i-s");
    $filename2=$nombreDelArchivo2."__".$_FILES['ArchivoSubido2']['name'];//NOMBRE DEL IMAGEN 2
     $location2="../productos/imageProductos/".$filename2;//UBIACION DE LA IMAGEN

    $nombreDelArchivo3=date("Y-m-d-h-i-s");
    $filename3=$nombreDelArchivo3."__".$_FILES['ArchivoSubido3']['name'];//NOMBRE DEL IMAGEN 3
     $location3="../productos/imageProductos/".$filename3;//UBIACION DE LA IMAGEN

     $nombreDelArchivo4=date("Y-m-d-h-i-s");
     $filename4=$nombreDelArchivo4."__".$_FILES['ArchivoSubido4']['name'];//NOMBRE DEL IMAGEN 4
      $location4="../productos/imageProductos/".$filename4;//UBIACION DE LA IMAGEN
 
// MOVEMOS LAS IMAGENES AL SEVIDOR 
move_uploaded_file($_FILES['ArchivoSubido1']['tmp_name'],$location1);
move_uploaded_file($_FILES['ArchivoSubido2']['tmp_name'],$location2);
move_uploaded_file($_FILES['ArchivoSubido3']['tmp_name'],$location3);
move_uploaded_file($_FILES['ArchivoSubido4']['tmp_name'],$location4);





// echo "Nombre del Producto: " . $NombreProducto . "<br>";
// echo "Descripción del Producto: " . $DescripcionProducto  . "<br>";
//  echo "Archivo Subido 1: " . $filename1 . "<br>";
//  echo "Archivo Subido 2: " . $filename2 . "<br>";
//  echo "Archivo Subido 3: " . $filename3 . "<br>";
//  echo "Archivo Subido 4: " . $filename4 . "<br>";
// echo "ID de la Categoría del Producto: " . $ID_Categoria_producto  . "<br>";
// echo "Opción de Venta o Cotización: " .$venta_cotizar. "<br>";
// echo "Precio del Producto: " . $precioProducto . "<br>";
// echo "Cantidad Disponible: " . $Cantidad_Disponible. "<br>";
// echo "ID_usaurio: " . $id_usuarioSesion. "<br>";





    $sentencia= $pdo->prepare("INSERT INTO producto( nombre_prod, descripcion_prod, precio_prod, cantDisp_prod, id_Categoria, id_Usuario, venta_cotizar, imagenP_1, imagenP_2, imagenP_3, VideoP) 
    VALUES (:nombre_prod, :descripcion_prod, :precio_prod, :cantDisp_prod, :id_Categoria, :id_Usuario, :venta_cotizar, :imagenP_1, :imagenP_2, :imagenP_3, :VideoP)");

    $sentencia->bindParam(':nombre_prod',$NombreProducto );
    $sentencia->bindParam(':descripcion_prod',$DescripcionProducto);
    $sentencia->bindParam(':precio_prod',$precioProducto);
    $sentencia->bindParam(':cantDisp_prod',$Cantidad_Disponible);
    $sentencia->bindParam(':id_Categoria',$ID_Categoria_producto);
    $sentencia->bindParam(':id_Usuario',$id_usuarioSesion);
    $sentencia->bindParam(':venta_cotizar',$venta_cotizar);
    $sentencia->bindParam(':imagenP_1',$filename1);
    $sentencia->bindParam(':imagenP_2',$filename2);
    $sentencia->bindParam(':imagenP_3',$filename3);
    $sentencia->bindParam(':VideoP',$filename4);


 if($sentencia->execute()){
     session_start();
     $_SESSION['mensaje']="Se Registro El Producto  de manera correcta";
     $_SESSION['icono']="success";
 ?>
 <script >
    
     location.href="<?php echo $URL;?>/Productos/MisProductos.php";
 </script>
 <?php
 }else{
     session_start();
     $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
     $_SESSION['icono']="error";
 }
?>

