<?php
include('../../config.php');
include('../../../layout/sesion.php');

// Verifica si se recibió el parámetro 'categoria'
if (isset($_GET['categoria'])) {
    // Obtiene el valor del parámetro 'categoria' y lo convierte a un entero para mayor seguridad
    $categoriaSeleccionada = intval($_GET['categoria']);

    // Consulta SQL preparada
    $sql_compras_categorias = "SELECT 
        c.ID_Compra AS 'No. de Compra',
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
    WHERE c.id_usuario = :id_usuario
    AND cat.ID_categoria = :id_categoria";

    // Prepara la consulta
    $query_compras_categorias = $pdo->prepare($sql_compras_categorias);

    // Asigna valores a los parámetros
    $query_compras_categorias->bindParam(':id_usuario', $ID_usuario_sesion, PDO::PARAM_INT);
    $query_compras_categorias->bindParam(':id_categoria', $categoriaSeleccionada, PDO::PARAM_INT);

    // Ejecuta la consulta
    $query_compras_categorias->execute();

    // Obtiene los resultados
    $compras_categorias_tabla = $query_compras_categorias->fetchAll(PDO::FETCH_ASSOC);

} else {
    // Si no se recibió el parámetro 'categoria', puedes manejar la situación de alguna manera
    echo "No se proporcionó la categoría.";
}

?>

<div class="card-body " style="overflow-y: scroll; max-height: 500px;">
    <table class="table   table-striped ">
        <thead>
            <tr>
                <th>No. de Compra</th>
                <th>Fecha</th>
                <th>Imagenes</th>
                <th>Producto Comprado</th>
                <th>Categoria</th>
                <th>Cantidad</th>
                <th>SubTotal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($compras_categorias_tabla as $compras_dato) {
                $ID_Compra = $compras_dato['No. de Compra'];
                $Fecha_de_Compra = $compras_dato['Fecha de Compra'];
                $imagenP_1 = $compras_dato['imagenP_1'];
                $imagenP_2 = $compras_dato['imagenP_2'];
                $imagenP_3 = $compras_dato['imagenP_3'];
                $NombredeCategoría = $compras_dato['Nombre de Categoría'];
                $Cantidad = $compras_dato['Cantidad'];
                $Subtotal = $compras_dato['Subtotal'];
                $Total = $compras_dato['Total'];
                $ProductoComprado = $compras_dato['Producto Comprado'];
            ?>
                <tr>
                    <td><?php echo $ID_Compra; ?></td>
                    <td><?php echo  $Fecha_de_Compra; ?></td>
                    <td>
                        <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $imagenP_1; ?>" width="100px" alt="imageProducto/" />
                    </td>
                    <td><?php echo $ProductoComprado; ?></td>
                    <td><?php echo $NombredeCategoría; ?></td>
                    <td><?php echo $Cantidad; ?></td>
                    <td><?php echo $Subtotal; ?></td>
                    <td><?php echo $Total; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
