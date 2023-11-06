<?php

if (!isset($_SESSION)) {
    session_start(); // Inicia la sesión si no está activa
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopila los datos de $_POST en un arreglo
    $nuevoDato = array(
        'NombreProducto' => $_POST['NombreProducto'],
        'idProducto' => $_POST['idProducto'],
        'imagenP_1' => $_POST['imagenP_1'],
        'imagenP_2' => $_POST['imagenP_2'],
        'imagenP_3' => $_POST['imagenP_3'],
        'CantidadDeProductos' => $_POST['CantidadDeProductos'],
        'subTotalDelProducto' => $_POST['subTotalDelProducto']
    );

    // Agrega el nuevo dato a un arreglo en la sesión
    if (!isset($_SESSION['datos'])) {
        $_SESSION['datos'] = array();
    }
    $_SESSION['datos'][] = $nuevoDato;

    // Redirige al usuario a la siguiente vista
    header("Location: http://localhost/BDM-PWCI_sistemadeventas/Productos/Productos.php");
    exit; // Asegúrate de que el script se detenga después de la redirección
}


