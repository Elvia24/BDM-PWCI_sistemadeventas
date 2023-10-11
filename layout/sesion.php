<?php
session_start();
if(isset( $_SESSION['sesion_email'])){
  //echo "si existe seccion de  ".$_SESSION['sesion_email'];
    $email_sesion= $_SESSION['sesion_email'];
    $sql = "SELECT usuario.correo,
     usuario.contraseña, 
     rol.nombre AS nombre_rol, 
     usuario.nombreUsuario, 
     usuario.Nombres, 
     usuario.fechaNacimiento, 
     usuario.Sexo, 
     usuario.Imagen, 
     usuario.fechaCreacion
            FROM usuario
            INNER JOIN rol ON usuario.ID_rol = rol.ID_Rol
            WHERE usuario.correo = '$email_sesion'";

    $query = $pdo->prepare($sql);
    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($usuarios as $usuario){
             $nombres_sesion=$usuario['Nombres'];
             $nombresDusuario_sesion=$usuario['nombreUsuario'];
             $ImagenDusuario_sesion=$usuario['Imagen'];
    }
}else{
  echo "no existe secion";

  header('Location:'.$URL.'/Login/index.php');
}

?>