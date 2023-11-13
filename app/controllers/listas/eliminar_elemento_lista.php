<?php
include ('../../config.php');
   
   $id_elemento_lista_get=$_GET['id'];

  $sentencia= $pdo->prepare("UPDATE detalle_lista
  SET status_detalle_lista = 0

  WHERE ID_detalle_lista = $id_elemento_lista_get;
  ");

//   $sentencia->bindParam(':mensaje_cliente',$mensaje_cliente );


 if($sentencia->execute()){
   session_start();
   $_SESSION['mensaje']="Eliminar Elemento con Exito";
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