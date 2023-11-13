<?php
include ('../../config.php');


    $ID_usuario_sesion = $_POST['ID_usuario_sesion'];
    $ID_producto = $_POST['ID_producto'];

    $mensaje_cliente = $_POST['mensaje_cliente'];




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





    $sentencia= $pdo->prepare("INSERT INTO cotizar( id_usuario, id_producto, Mensaje_Cliente) 
    VALUES (:ID_usuario_sesion, :ID_producto, :mensaje_cliente)");

    $sentencia->bindParam(':ID_usuario_sesion',$ID_usuario_sesion );
    $sentencia->bindParam(':ID_producto',$ID_producto);
    $sentencia->bindParam(':mensaje_cliente',$mensaje_cliente);



 if($sentencia->execute()){
     session_start();
     $_SESSION['mensaje']="Se Registro El Mensaje Con Exito";
     $_SESSION['icono']="success";
 ?>
 <script >
    
     location.href="<?php echo $URL;?>/Productos/Productos.php";
 </script>
 <?php
 }else{
     session_start();
     $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
     $_SESSION['icono']="error";
 }
?>

