<?php
include ('../../config.php');

$id_lista = $_GET['id_lista'];
$id_producto_get = $_GET['id_producto_get'];



    //  echo "id_lista: " . $id_lista  . "<br>";
    //  echo "id_producto_get: " . $id_producto_get . "<br>";


        $sentencia= $pdo->prepare("INSERT INTO detalle_lista (id_lista,id_producto) 
        VALUES (:id_lista,:id_producto_get)");

        $sentencia->bindParam(':id_lista', $id_lista);
        $sentencia->bindParam(':id_producto_get', $id_producto_get);



        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje']="Producto Agregado Con Exito";
            $_SESSION['icono']="success";
            header('Location: ' . $URL . '/Productos/Productos.php');

        }else{
            session_start();
            $_SESSION['mensaje']="Error no se pudieron registrar de manera correcta los datos";
            $_SESSION['icono']="error";
        }
?>