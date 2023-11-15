<?php 

// $email_sesion= $_SESSION['sesion_email'];
$sql_ventas = "SELECT 
p.ID_producto, 
p.nombre_prod, 
p.imagenP_1, 
p.precio_prod, 
p.cantDisp_prod, 
u.ID_usuario, 
u.correo, 
u.nombreUsuario, 
u.contraseña, 
v.ID_venta, 
v.Id_producto AS Id_producto_venta, 
v.fechaCreacion AS fechaCreacion_venta,
c.ID_categoria, 
c.nombre_cate

FROM producto p
JOIN ventas v ON p.ID_producto = v.Id_producto
JOIN usuario u ON p.id_Usuario = u.ID_usuario
JOIN categoria c ON p.id_Categoria = c.ID_categoria
WHERE u.ID_usuario =$ID_usuario_sesion ;";



$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();

$ventas_tabla = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

///SEGUNDA CONSULTA DE VENTAS

$sql_ventas2 = "SELECT
p.ID_producto,
p.nombre_prod,
c.nombre_cate AS nombre_categoria,
COUNT(*) AS totalVentas,
MAX(v.fechaCreacion) AS fechaUltimaVenta
FROM producto p
JOIN ventas v ON p.ID_producto = v.Id_producto
JOIN usuario u ON p.id_Usuario = u.ID_usuario
JOIN categoria c ON p.id_Categoria = c.ID_categoria
WHERE u.ID_usuario = $ID_usuario_sesion -- Reemplaza con el ID del usuario específico
GROUP BY p.ID_producto, p.nombre_prod, c.nombre_cate;

";



$query_ventas2 = $pdo->prepare($sql_ventas2);
$query_ventas2->execute();

$ventas_tabla2 = $query_ventas2->fetchAll(PDO::FETCH_ASSOC);
?>