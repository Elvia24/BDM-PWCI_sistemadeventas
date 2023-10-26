
<?php
include('../../config.php');


    $id_usuario = $_POST['id_usuario'];

    $query = $pdo->prepare("DELETE FROM usuario WHERE ID_usuario = :id_usuario");
    $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);


    $query->execute();
    session_start();
    $_SESSION['mensaje']="Se elimino el usuario correctamente";
    $_SESSION['icono']="success";
    
    header('Location:'.$URL.'/Usuarios/Usuarios.php');


?>