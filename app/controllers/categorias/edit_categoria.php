<?php
include('../../config.php');

$nombre_categoria = $_POST['nombre_categoria'];
$descripcion_categoria = $_POST['descripcion_categoria'];
$ID_categoria = $_POST['ID_categoria'];

$sentencia = $pdo->prepare("UPDATE categoria SET nombre_cate = :nombre_categoria, descripcion_cate = :descripcion_categoria WHERE ID_categoria = :ID_categoria");

$sentencia->bindValue(':nombre_categoria', $nombre_categoria);
$sentencia->bindValue(':descripcion_categoria', $descripcion_categoria);
$sentencia->bindValue(':ID_categoria', $ID_categoria);

if ($sentencia->execute()) {
    session_start();
    // $_SESSION['mensaje'] = "Se edito la categoría de manera correcta";
    // $_SESSION['icono'] = "success";
    //header('Location:'. $URL.'/Categorias/Categorias.php?refresh=1');
    ?>
     <script>
        // location.href='<?php echo $URL;?>../Categorias/Categorias.php';
      
    </script> 
    <?php
    //exit();
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: no se pudieron registrar los datos de manera correcta";
    $_SESSION['icono'] = "error";
    //header("Location: $URL/Categorias/Categorias.php");
   
    ?>
        <script>
            window.location.reload();
        // location.href='<?php echo $URL;?>/Categorias/Categorias.php';

    </script> 
    <?php
}
?>
