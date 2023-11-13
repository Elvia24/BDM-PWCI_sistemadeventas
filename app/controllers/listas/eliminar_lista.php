<?php
include ('../../config.php');
   
   $id_lista_get=$_GET['id'];

  $sentencia= $pdo->prepare("UPDATE lista
  SET status_lista = 0

  WHERE ID_lista = $id_lista_get;
  ");

//   $sentencia->bindParam(':mensaje_cliente',$mensaje_cliente );


 if($sentencia->execute()){
   session_start();
   $_SESSION['mensaje']="Lista Eliminada Con Exito";
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