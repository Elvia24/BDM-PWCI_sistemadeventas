<?php
include('../../config.php');

try { 
   
     $correo_editar_usuario = $_POST['correo_editar_usuario'];
     $NombreUsuario_editar_usuario = $_POST['nombreUsuario_editar_usuario'];
     $contraseña_editar_usuario = $_POST['contraseña_editar_usuario'];
    //$ID_rol_editar_usuario = $_POST['ID_rol_editar_usuario'];
     $Nombres_editar_usuario = $_POST['Nombres_editar_usuario'];
     $FechaNacimiento_editar_usuario = $_POST['fechaNacimiento_editar_usuario'];
     $Sexo_editar_usuario = $_POST['Sexo_editar_usuario'];
     $id_editar_usuario= $_POST['id_editar_usuario'];

    // if (isset($_FILES['Imagen_r'])) {
    //     $nombreArchivo = $_FILES['Imagen_r']['name'];
    //     echo "Nombre del archivo subido: " . $nombreArchivo;
    // } else {
    //     echo "No se ha subido ningún archivo.";
    // }


     $nombreDelArchivo=date("Y-m-d-h-i-s");
     $filename=$nombreDelArchivo."__".$_FILES['Imagen_editar_usuario']['name'];
     $location="../usuarios/imageUsuarios/".$filename;

     move_uploaded_file($_FILES['Imagen_editar_usuario']['tmp_name'],$location);
    

     // Imprimir los datos 
//  echo "Correo: " . $correo_editar_usuario . "<br>";
//  echo "Nombre de usuario: " . $NombreUsuario_editar_usuario . "<br>";
//  echo "Contraseña: " . $contraseña_editar_usuario . "<br>";
//  echo "Nombres: " . $Nombres_editar_usuario . "<br>";
//  echo "Fecha de nacimiento: " . $FechaNacimiento_editar_usuario . "<br>";
//  echo "Sexo: " . $Sexo_editar_usuario . "<br>";
//  echo "Nombre del archivo: " . $filename . "<br>";

    // Escapa las variables para evitar ataques de inyección de SQL
       $correo_editar_usuario = $pdo->quote($correo_editar_usuario);
       $NombreUsuario_editar_usuario = $pdo->quote($NombreUsuario_editar_usuario);
       $contraseña_editar_usuario = $pdo->quote($contraseña_editar_usuario);
       //$ID_rol_editar_usuario = $pdo->quote($ID_rol_editar_usuario);
       $Nombres_editar_usuario = $pdo->quote($Nombres_editar_usuario);
       $FechaNacimiento_editar_usuario = $pdo->quote($FechaNacimiento_editar_usuario);
       $Sexo_editar_usuario = $pdo->quote($Sexo_editar_usuario);
       $filename = $pdo->quote($filename);

    //    $query = "INSERT INTO usuario (correo, nombreUsuario, contraseña, ID_rol, Nombres, fechaNacimiento, Sexo, Imagen) 
    //    VALUES ($correo_editar_usuario, $NombreUsuario_editar_usuario, $contraseña_editar_usuario, $ID_rol_editar_usuario, $Nombres_editar_usuario, $FechaNacimiento_editar_usuario, $Sexo_editar_usuario, $filename)";

$query = "UPDATE usuario SET correo= $correo_editar_usuario,
nombreUsuario= $NombreUsuario_editar_usuario,
contraseña=$contraseña_editar_usuario,
Nombres= $Nombres_editar_usuario,
fechaNacimiento= $FechaNacimiento_editar_usuario,
Sexo= $Sexo_editar_usuario,
Imagen=$filename WHERE ID_usuario=$id_editar_usuario";

    $pdo->exec($query);
    //echo "Datos insertados con éxito.";

    header('Location:'.$URL.'/Perfil/perfil.php');
} catch (PDOException $e) {
    echo "Error de PDO: " . $e->getMessage();
}
?>