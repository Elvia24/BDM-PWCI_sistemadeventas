<?php
include ('../../config.php');

echo $nombre_Lista = $_GET['nombre_Lista'];
echo $descripcion_Lista = $_GET['descripcion_Lista'];
echo $Publica_Privada = $_GET['Publica_Privada'];
echo $ID_usuario_sesion = $_GET['ID_usuario_sesion'];


    $sentencia= $pdo->prepare("INSERT INTO lista (nombre_lista,descripcion,Publica_Privada,id_usuario) 
    VALUES (:nombre_Lista,:descripcion_Lista,:Publica_Privada,:ID_usuario_sesion)");

    $sentencia->bindParam('nombre_Lista',$nombre_Lista);
    $sentencia->bindParam('descripcion_Lista',$descripcion_Lista);
    $sentencia->bindParam('Publica_Privada',$Publica_Privada);
    $sentencia->bindParam('ID_usuario_sesion',$ID_usuario_sesion);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje']="Se Registro la lista de manera correcta";
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