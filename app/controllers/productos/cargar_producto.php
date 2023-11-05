<?php 


$id_producto_get=$_GET['id'];

// $email_sesion= $_SESSION['sesion_email'];
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
WHERE p.id_Usuario = $ID_usuario_sesion AND p.baja_producto=1  AND p.ID_producto='$id_producto_get' ";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);


foreach($productos_datos AS $productos_dato){
    $ID_producto = $productos_dato['ID_producto'];
    $NombreProducto = $productos_dato['NombreProducto'];
    $DescripcionProducto = $productos_dato['DescripcionProducto'];
    // $ArchivoSubido1 = $_POST['ArchivoSubido1_I'];
    // $ArchivoSubido2 = $_POST['ArchivoSubido2_I'];
    // $ArchivoSubido3 = $_POST['ArchivoSubido3_I'];
    // $ArchivoSubido4 = $_POST['ArchivoSubido4_I'];
    $NombreCategoria = $productos_dato['NombreCategoria'];
    $ID_categoria = $productos_dato['ID_categoria'];
    $venta_cotizar = $productos_dato['venta_cotizar'];
    $precioProducto = $productos_dato['PrecioProducto'];
    $Cantidad_Disponible = $productos_dato['CantidadDisponible'];
    $NombreUsuario = $productos_dato['NombreUsuario'];

    $imagenP_1 = $productos_dato['imagenP_1'];
    $imagenP_2 = $productos_dato['imagenP_2'];
    $imagenP_3 = $productos_dato['imagenP_3'];
    $VideoP = $productos_dato['VideoP'];




}


?>