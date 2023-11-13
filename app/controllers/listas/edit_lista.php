<?php
include ('../../config.php');
   $nombre_lista = $_POST['nombre_lista'];
    $id_lista_get = $_POST['id_lista_get'];
    $Publica_Privada = $_POST['Publica_Privada'];

    $descripcion_Lista = $_POST['descripcion_Lista'];






//        echo "ID_producto del Producto: " . $ID_producto . "<br>";
//   echo "Nombre del Producto: " . $NombreProducto . "<br>";
//   echo "Descripción del Producto: " . $DescripcionProducto  . "<br>";
//    echo "Archivo Subido 1: " . $filename1 . "<br>";
//    echo "Archivo Subido 2: " . $filename2 . "<br>";
//    echo "Archivo Subido 3: " . $filename3 . "<br>";
//    echo "Archivo Subido 4: " . $filename4 . "<br>";
//   echo "ID de la Categoría del Producto: " . $ID_Categoria_producto  . "<br>";
//   echo "Opción de Venta o Cotización: " .$venta_cotizar. "<br>";
//   echo "Precio del Producto: " . $precioProducto . "<br>";
//  echo "Cantidad Disponible: " . $Cantidad_Disponible. "<br>";
//   //echo "ID_usaurio: " . $id_usuarioSesion. "<br>";


 
  $sentencia= $pdo->prepare("UPDATE lista SET
  nombre_lista=:nombre_lista,
  descripcion=:descripcion_Lista,
  Publica_Privada=:Publica_Privada
   WHERE ID_lista= $id_lista_get;
   ");

  $sentencia->bindParam(':nombre_lista',$nombre_lista );
  $sentencia->bindParam(':descripcion_Lista',$descripcion_Lista);
  $sentencia->bindParam(':Publica_Privada',$Publica_Privada);


 if($sentencia->execute()){
   session_start();
   $_SESSION['mensaje']="Se Actualizo La Lista  de manera correcta";
   $_SESSION['icono']="success";
 ?>
 <script >
 
   location.href="<?php echo $URL;?>/Listas/MisListas.php";
 </script>
 <?php
 }else{
   session_start();
   $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
   $_SESSION['icono']="error";
 }
?>