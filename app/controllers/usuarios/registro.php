<?php 
include('../../config.php');

try {
    $correo_registro = $_POST['correo_registro'];
    $NombreUsuario_registro = $_POST['nombreUsuario_registro'];
    $contraseña_registro = $_POST['contraseña_registro'];
    $ID_rol_registro = $_POST['ID_rol_registro'];
    $Nombres_registro = $_POST['Nombres_registro'];
    $FechaNacimiento_registro = $_POST['fechaNacimiento_registro'];
    $Sexo_registro = $_POST['Sexo_registro'];
    $Imagen_registro = $_FILES['Imagen_registro'];



    

    // Escapa las variables para evitar ataques de inyección de SQL
    $correo_registro = $pdo->quote($correo_registro);
    $NombreUsuario_registro = $pdo->quote($NombreUsuario_registro);
    $contraseña_registro = $pdo->quote($contraseña_registro);
    $ID_rol_registro = $pdo->quote($ID_rol_registro);
    $Nombres_registro = $pdo->quote($Nombres_registro);
    $FechaNacimiento_registro = $pdo->quote($FechaNacimiento_registro);
    $Sexo_registro = $pdo->quote($Sexo_registro);
    $Imagen_registro = $pdo->quote($Imagen_registro);

    $query = "INSERT INTO usuario (correo, nombreUsuario, contraseña, ID_rol, Nombres, fechaNacimiento, Sexo, Imagen) 
    VALUES ($correo_registro, $NombreUsuario_registro, $contraseña_registro, $ID_rol_registro, $Nombres_registro, $FechaNacimiento_registro, $Sexo_registro, $Imagen_registro)";

    $pdo->exec($query);
    echo "Datos insertados con éxito.";
} catch (PDOException $e) {
    echo "Error de PDO: " . $e->getMessage();
}






?>