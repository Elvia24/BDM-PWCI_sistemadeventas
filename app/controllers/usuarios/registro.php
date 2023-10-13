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
    // if (isset($_FILES['Imagen_r'])) {
    //     $nombreArchivo = $_FILES['Imagen_r']['name'];
    //     echo "Nombre del archivo subido: " . $nombreArchivo;
    // } else {
    //     echo "No se ha subido ningún archivo.";
    // }


     $nombreDelArchivo=date("Y-m-d-h-i-s");
     $filename=$nombreDelArchivo."__".$_FILES['Imagen_r']['name'];
     $location="../usuarios/imageUsuarios/".$filename;

     move_uploaded_file($_FILES['Imagen_r']['tmp_name'],$location);
    

     // Imprimir los datos 
// echo "Correo: " . $correo_registro . "<br>";
// echo "Nombre de usuario: " . $NombreUsuario_registro . "<br>";
// echo "Contraseña: " . $contraseña_registro . "<br>";
// echo "ID de rol: " . $ID_rol_registro . "<br>";
// echo "Nombres: " . $Nombres_registro . "<br>";
// echo "Fecha de nacimiento: " . $FechaNacimiento_registro . "<br>";
// echo "Sexo: " . $Sexo_registro . "<br>";
// echo "Nombre del archivo: " . $filename . "<br>";

    // Escapa las variables para evitar ataques de inyección de SQL
      $correo_registro = $pdo->quote($correo_registro);
      $NombreUsuario_registro = $pdo->quote($NombreUsuario_registro);
      $contraseña_registro = $pdo->quote($contraseña_registro);
      $ID_rol_registro = $pdo->quote($ID_rol_registro);
      $Nombres_registro = $pdo->quote($Nombres_registro);
      $FechaNacimiento_registro = $pdo->quote($FechaNacimiento_registro);
      $Sexo_registro = $pdo->quote($Sexo_registro);
      $filename = $pdo->quote($filename);

      $query = "INSERT INTO usuario (correo, nombreUsuario, contraseña, ID_rol, Nombres, fechaNacimiento, Sexo, Imagen) 
      VALUES ($correo_registro, $NombreUsuario_registro, $contraseña_registro, $ID_rol_registro, $Nombres_registro, $FechaNacimiento_registro, $Sexo_registro, $filename)";

    $pdo->exec($query);
    header('Location:'.$URL.'/Login/index.php');
    //echo "Datos insertados con éxito.";
} catch (PDOException $e) {
    echo "Error de PDO: " . $e->getMessage();
}






?>
<html>


</html>