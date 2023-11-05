<?php
include ('../../config.php');
  echo $ID_producto = $_POST['ID_producto'];

  $sentencia= $pdo->prepare("UPDATE producto SET baja_producto= 0 WHERE ID_producto=:ID_producto");


   $sentencia->bindParam(':ID_producto',$ID_producto);

  if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje']="Se Elimino El Producto  de manera correcta";
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