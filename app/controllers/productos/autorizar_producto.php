<?php
include ('../../config.php');
  echo $ID_producto = $_GET['id'];

  $sentencia= $pdo->prepare("UPDATE producto SET status_prod= 1 WHERE ID_producto=:ID_producto");


   $sentencia->bindParam(':ID_producto',$ID_producto);

  if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje']="Producto AUTORIZADO";
    $_SESSION['icono']="success";
  ?>
  <script >
 
    location.href="<?php echo $URL;?>/Productos/ProductosAutorizados.php";
  </script>
  <?php
  }else{
    session_start();
    $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
    $_SESSION['icono']="error";
  }
?>