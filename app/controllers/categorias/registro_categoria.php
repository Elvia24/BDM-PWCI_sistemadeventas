<?php
include ('../../config.php');

echo $nombre_categoria = $_GET['nombre_categoria'];
echo $descripcion_categoria = $_GET['descripcion_categoria'];
echo $ID_usuario_sesion = $_GET['ID_usuario_sesion'];

$sentencia= $pdo->prepare("INSERT INTO categoria (nombre_cate,descripcion_cate,id_usuario) 
VALUES (:nombre_categoria,:descripcion_categoria,:ID_usuario_sesion)");

$sentencia->bindParam('nombre_categoria',$nombre_categoria);
$sentencia->bindParam('descripcion_categoria',$descripcion_categoria);
$sentencia->bindParam('ID_usuario_sesion',$ID_usuario_sesion);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje']="Se Registro la categoria  de manera correcta";
    $_SESSION['icono']="success";
?>
<script >
    
    location.href="<?php echo $URL;?>/Categorias/Categorias.php";
</script>
<?php
}else{
    session_start();
    $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
    $_SESSION['icono']="error";
}
?>

