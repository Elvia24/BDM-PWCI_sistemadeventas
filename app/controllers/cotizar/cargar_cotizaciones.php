<?php 


$id_pedido_get=$_GET['id'];

// $email_sesion= $_SESSION['sesion_email'];
$sql_pedido = "SELECT c.ID_Cotizar, 
c.id_usuario AS id_CLIENTE, 
c.id_producto, 
c.Mensaje_Cliente, 
c.Mensaje_Vendedor, 
c.status_cotizar, 
p.ID_producto , 
p.nombre_prod, 
p.descripcion_prod, 
p.precio_prod, 
p.status_prod, 
p.cantDisp_prod, p.calificacion_prod, p.fechaCreacion_prod, p.id_Categoria, p.id_Usuario, p.baja_producto, p.venta_cotizar, p.imagenP_1, p.imagenP_2, p.imagenP_3, p.VideoP,
u.ID_usuario ,
u.correo ,
u.nombreUsuario
FROM cotizar c
INNER JOIN producto p ON c.id_producto = p.ID_producto
INNER JOIN usuario u ON c.id_Usuario= u.ID_usuario
WHERE c.ID_Cotizar =$id_pedido_get AND c.status_cotizar=1;";


$query_pedidos = $pdo->prepare($sql_pedido);
$query_pedidos->execute();

$pedidos_datos = $query_pedidos->fetchAll(PDO::FETCH_ASSOC);


foreach($pedidos_datos AS $pedido_dato){
    //$ID_producto = $pedido_dato['ID_producto'];
    $Mensaje_Cliente = $pedido_dato['Mensaje_Cliente'];
    $Mensaje_Vendedor = $pedido_dato['Mensaje_Vendedor'];
    $ID_usuario_Cliente= $pedido_dato['id_CLIENTE'];
    $correo_Cliente = $pedido_dato['correo'];
    // $ArchivoSubido1 = $_POST['ArchivoSubido1_I'];
    // $ArchivoSubido2 = $_POST['ArchivoSubido2_I'];
    // $ArchivoSubido3 = $_POST['ArchivoSubido3_I'];
    // $ArchivoSubido4 = $_POST['ArchivoSubido4_I'];
    // $NombreCategoria = $pedido_dato['NombreCategoria'];
    // $ID_categoria = $pedido_dato['ID_categoria'];
    // $venta_cotizar = $pedido_dato['venta_cotizar'];
    // $precioProducto = $pedido_dato['PrecioProducto'];
    // $Cantidad_Disponible = $pedido_dato['CantidadDisponible'];
    // $NombreUsuario = $pedido_dato['NombreUsuario'];

    // $imagenP_1 = $pedido_dato['imagenP_1'];
    // $imagenP_2 = $pedido_dato['imagenP_2'];
    // $imagenP_3 = $pedido_dato['imagenP_3'];
    // $VideoP = $pedido_dato['VideoP'];




}


?>