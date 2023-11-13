<?php
include ('../../config.php');
   $mensaje_cliente = $_POST['mensaje_cliente'];
   $id_pedido = $_POST['id_pedido'];

  $sentencia= $pdo->prepare("UPDATE cotizar
  SET Mensaje_Cliente = :mensaje_cliente

  WHERE ID_Cotizar = $id_pedido;
  ");

  $sentencia->bindParam(':mensaje_cliente',$mensaje_cliente );


 if($sentencia->execute()){
   session_start();
   $_SESSION['mensaje']="Nuevo mensaje Enviado con exito";
   $_SESSION['icono']="success";
 ?>
 <script >
 
   location.href="<?php echo $URL;?>/Cotizar/MisPedidos.php";
 </script>
 <?php
 }else{
   session_start();
   $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
   $_SESSION['icono']="error";
 }
?>