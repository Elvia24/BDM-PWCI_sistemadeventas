<?php


echo $id_producto = $_GET['idu'];

$sql_productos = "SELECT
p.ID_producto,
p.nombre_prod AS NombreProducto,
p.descripcion_prod AS DescripcionProducto,
p.precio_prod AS PrecioProducto,
p.status_prod AS EstadoProducto,
p.cantDisp_prod AS CantidadDisponible,
p.calificacion_prod AS CalificacionProducto,
p.fechaCreacion_prod AS FechaCreacionProducto,
p.id_Categoria,
c.nombre_cate AS NombreCategoria,
u.ID_usuario AS IDUsuario,
u.nombreUsuario AS NombreUsuario
FROM producto AS p
LEFT JOIN categoria AS c ON p.id_Categoria = c.ID_categoria
LEFT JOIN usuario AS u ON p.id_Usuario = u.ID_usuario
WHERE p.ID_producto = $id_producto
GROUP BY p.ID_producto;";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_tabla = $query_productos->fetchAll(PDO::FETCH_ASSOC);

// Imprimir los datos
foreach ($productos_tabla as $producto) {
    echo "ID del Producto: " . $producto['ID_producto'] . "<br>";
    echo "Nombre del Producto: " . $producto['NombreProducto'] . "<br>";
    echo "Descripción del Producto: " . $producto['DescripcionProducto'] . "<br>";
    echo "Precio del Producto: " . $producto['PrecioProducto'] . "<br>";
    echo "Estado del Producto: " . $producto['EstadoProducto'] . "<br>";
    
   
echo "Cantidad Disponible: " . $producto['CantidadDisponible'] . "<br>";
    echo "Calificación del Producto: " . $producto['CalificacionProducto'] . "<br>";
    echo "Fecha de Creación del Producto: " . $producto['FechaCreacionProducto'] . "<br>";
    echo "ID de la Categoría: " . $producto['id_Categoria'] . "<br>";
    echo "Nombre de la Categoría: " . $producto['NombreCategoria'] . "<br>";
    echo "ID del Usuario: " . $producto['IDUsuario'] . "<br>";
    echo "Nombre del Usuario: " . $producto['NombreUsuario'] . "<br>";
}

//header('Location:'.$URL.'/Productos/EditarProducto.php');
?>