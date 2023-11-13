<?php
include ('../../config.php');
   $mensaje_vendedor = $_POST['mensaje_vendedor'];
   $id_cotizacion = $_POST['id_cotizacion'];

  $sentencia= $pdo->prepare("UPDATE cotizar
  SET Mensaje_Vendedor = :mensaje_vendedor

  WHERE ID_Cotizar = $id_cotizacion;
  ");

  $sentencia->bindParam(':mensaje_vendedor',$mensaje_vendedor );


 if($sentencia->execute()){
   session_start();
   $_SESSION['mensaje']="Nuevo mensaje Enviado con exito";
   $_SESSION['icono']="success";
 ?>
 <script >
 
   location.href="<?php echo $URL;?>/Cotizar/ProductosaCotizar.php";
 </script>
 <?php
 }else{
   session_start();
   $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
   $_SESSION['icono']="error";
 }
?>