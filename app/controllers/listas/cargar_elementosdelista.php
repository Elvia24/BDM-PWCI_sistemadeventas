<?php 


$id_lista_get=$_GET['id'];

// $email_sesion= $_SESSION['sesion_email'];
$sql_lista = "SELECT p.ID_producto, p.nombre_prod, 
p.descripcion_prod, p.precio_prod, p.status_prod, 
p.cantDisp_prod, p.calificacion_prod, p.fechaCreacion_prod, 
p.id_Categoria, p.id_Usuario, p.baja_producto, p.venta_cotizar, 
p.imagenP_1, p.imagenP_2, p.imagenP_3, p.VideoP, dl.ID_detalle_lista AS ID_DL
FROM lista l
INNER JOIN detalle_lista dl ON l.ID_lista = dl.id_lista
INNER JOIN producto p ON dl.id_producto = p.ID_producto
WHERE l.ID_lista = $id_lista_get AND dl.status_detalle_lista=1;";


$query_elementos_listas = $pdo->prepare($sql_lista);
$query_elementos_listas->execute();

$elementos_listas_datos = $query_elementos_listas->fetchAll(PDO::FETCH_ASSOC);


// foreach($elementos_listas_datos AS $lista_elemento_dato){
    
//     $nombre_prod = $lista_elemento_dato['nombre_prod'];
//     $descripcion_prod = $lista_elemento_dato['descripcion_prod'];
//     $precio_prod = $lista_elemento_dato['precio_prod'];
//     $venta_cotizar = $lista_elemento_dato['venta_cotizar'];
//     $imagenP_1 = $lista_elemento_dato['imagenP_1'];
// }


?>