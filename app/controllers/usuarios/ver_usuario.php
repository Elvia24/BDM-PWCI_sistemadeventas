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



//*PRODUCTOS DEL VENDEDOR ACEPTADOS*// */

$sql_productosVendedor = "SELECT 
p.ID_producto , 
p.nombre_prod AS NombreProducto,
p.descripcion_prod AS DescripcionProducto, 
p.precio_prod AS PrecioProducto, 
p.status_prod AS EstadoProducto, 
p.cantDisp_prod AS CantidadDisponible, 
p.calificacion_prod AS CalificacionProducto, 
p.fechaCreacion_prod, 
p.baja_producto, 
p.venta_cotizar, 
p.imagenP_1, 
p.imagenP_2, 
p.imagenP_3, 
p.VideoP,
u.ID_usuario, 
u.nombreUsuario AS NombreUsuario, 
c.ID_categoria, 
c.nombre_cate AS NombreCategoria
FROM producto p
JOIN usuario u ON p.id_Usuario = u.ID_usuario
JOIN categoria c ON p.id_Categoria = c.ID_categoria
WHERE  p.baja_producto=1 AND p.id_Usuario =  '$id_usuario_get';";

$query_productosVendedor = $pdo->prepare($sql_productosVendedor);
$query_productosVendedor->execute();

$productosVendedor_tabla = $query_productosVendedor->fetchAll(PDO::FETCH_ASSOC);
//*administrador*// */


$sql_productos = "SELECT 
p.ID_producto , 
p.nombre_prod AS NombreProducto,
p.descripcion_prod AS DescripcionProducto, 
p.precio_prod AS PrecioProducto, 
p.status_prod AS EstadoProducto, 
p.cantDisp_prod AS CantidadDisponible, 
p.calificacion_prod AS CalificacionProducto, 
p.fechaCreacion_prod, 
p.baja_producto, 
p.venta_cotizar, 
p.imagenP_1, 
p.imagenP_2, 
p.imagenP_3, 
p.VideoP,
u.ID_usuario, 
u.nombreUsuario AS NombreUsuario, 
c.ID_categoria, 
c.nombre_cate AS NombreCategoria
FROM producto p
JOIN usuario u ON p.id_Usuario = u.ID_usuario
JOIN categoria c ON p.id_Categoria = c.ID_categoria
WHERE p.baja_producto=1 AND p.status_prod=1";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_tabla = $query_productos->fetchAll(PDO::FETCH_ASSOC);

//*listas*// */

$sql_lista = "SELECT l.ID_lista, 
l.nombre_lista, l.descripcion, 
u.id_usuario, u.nombreUsuario, l.Publica_Privada
FROM lista l
INNER JOIN usuario u ON l.id_usuario = u.ID_usuario 
WHERE l.status_lista=1 AND l.id_usuario=$id_usuario_get;";

$query_lista = $pdo->prepare($sql_lista);
$query_lista->execute();

$lista_tabla = $query_lista->fetchAll(PDO::FETCH_ASSOC);
?>


