<?php

 $id_usuario_get=$_GET['idu'];

//$email_sesion= $_SESSION['sesion_email'];
$sql_usuarios = "SELECT usuario.correo,
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
       WHERE ID_usuario= '$id_usuario_get';";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();

$usuarios_tabla = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios_tabla as $usuarios_dato ){
    $nombreUsuario_verusuario=$usuarios_dato['nombreUsuario'];
    $correo_verusuario=$usuarios_dato['correo'];
    $Nombres_verusuario=$usuarios_dato['Nombres'];
    $fechaNacimiento_verusuario=$usuarios_dato['fechaNacimiento'];
    $Sexo_verusuario=$usuarios_dato['Sexo'];
    $Imagen_verusuario=$usuarios_dato['Imagen'];
    $nombre_rol_verusuario=$usuarios_dato['nombre_rol'];
}
?>