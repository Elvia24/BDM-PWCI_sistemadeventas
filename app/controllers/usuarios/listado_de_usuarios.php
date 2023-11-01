<?php 





// $email_sesion= $_SESSION['sesion_email'];
$sql_usuarios = "SELECT usuario.ID_usuario,usuario.correo,
usuario.contraseña, 
usuario.nombreUsuario, 
usuario.Nombres, 
usuario.fechaNacimiento, 
usuario.Sexo, 
usuario.Imagen, 
usuario.fechaCreacion,
rol.nombre AS RolNombre
       FROM usuario 
       INNER JOIN rol ON usuario.ID_Rol = rol.ID_Rol
       WHERE  usuario.ID_usuario <> $ID_usuario_sesion AND status_usuario=1;";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();

$usuarios_tabla = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
?>