<?php 

$sql_compras = "SELECT c.ID_Compra AS 'No. de Compra',
c.fechaCreacion AS 'Fecha de Compra',
p.nombre_prod AS 'Producto Comprado',
p.imagenP_1 AS 'imagenP_1',
p.imagenP_2 AS 'imagenP_2',
p.imagenP_3 AS 'imagenP_3',
cat.nombre_cate AS 'Nombre de Categoría',
dc.cantidad AS 'Cantidad',
dc.subTotal AS 'Subtotal',
c.Total AS 'Total'
FROM compra c
JOIN carrito ca ON c.id_carrito = ca.ID_carrito
JOIN detalle_carrito dc ON ca.ID_carrito = dc.id_carrito
JOIN producto p ON dc.id_producto = p.ID_producto
JOIN categoria cat ON p.id_Categoria = cat.ID_categoria
WHERE c.id_usuario = $ID_usuario_sesion;";

$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();

$compras_tabla = $query_compras->fetchAll(PDO::FETCH_ASSOC);
?>