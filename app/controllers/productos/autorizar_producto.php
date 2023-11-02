<?php
include('../../config.php');
if (isset($_GET['idu'])) {
    $id_producto = $_GET['idu'];
    // Ahora puedes usar $id_producto en tu código
    //echo "El valor de id_producto es: " . $id_producto;
    $query = $pdo->prepare("UPDATE producto SET `status_prod`=1 WHERE ID_producto=:id_producto");
    $query->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);


    $query->execute();
    session_start();
    $_SESSION['mensaje']="Producto Autroizado";
    $_SESSION['icono']="success";
    
    header('Location:'.$URL.'/Productos/ProductosAutorizados.php');

} else {
    echo "No se proporcionó el parámetro 'idu' en la URL.";
}
?>