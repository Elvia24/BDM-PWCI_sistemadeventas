<?php

include('../../config.php');
// Verificar si se enviaron datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['categoria']) && isset($_POST['fecha'])) {
        // Los datos del formulario se han enviado
        $id_categoria = $_POST['categoria'];
        $fechaFiltro = $_POST['fecha'];
        $ID_usuario = $_POST['ID_usuario'];
        $fechaFormateada = date("Y-m-d", strtotime($fechaFiltro));
        // Puedes realizar acciones adicionales con los datos del formulario si es necesario
        // ...
        echo '<script>alert("Datos enviados:\nCategoría: ' . $id_categoria . '\nFecha: ' . $fechaFormateada . '\nUsuario: ' . $ID_usuario . '");</script>';
        // Ahora puedes utilizar $categoriaFiltro y $fechaFiltro en tu lógica de filtrado
    
        $sql_filtrado_compras = "SELECT c.ID_Compra AS 'No. de Compra',
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
        WHERE c.id_usuario = $ID_usuario AND c.fechaCreacion = $fechaFormateada AND p.id_Categoria= $id_categoria ;";
        
        $query_filtrado_compras = $pdo->prepare($sql_filtrado_compras);
        $query_filtrado_compras->execute();
        
        $compras_tabla2 = $query_filtrado_compras->fetchAll(PDO::FETCH_ASSOC);
    

    } else {
        // El formulario se envió, pero falta al menos uno de los campos
        echo '<script>alert("Por favor, complete todos los campos del formulario.");</script>';

    }
}
?>
<?php
// Aquí puedes agregar estilos adicionales o personalizar según tu necesidad

// Verificar si hay resultados para mostrar
if (!empty($compras_tabla2)) {
    echo '<table border="1">
            <tr>
                <th>No. de Compra</th>
                <th>Fecha de Compra</th>
                <th>Producto Comprado</th>
                <th>Nombre de Categoría</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Total</th>
            </tr>';

    foreach ($compras_tabla2 as $compra) {
        echo '<tr>
                <td>' . $compra['No. de Compra'] . '</td>
                <td>' . $compra['Fecha de Compra'] . '</td>
                <td>' . $compra['Producto Comprado'] . '</td>
                <td>' . $compra['Nombre de Categoría'] . '</td>
                <td>' . $compra['Cantidad'] . '</td>
                <td>' . $compra['Subtotal'] . '</td>
                <td>' . $compra['Total'] . '</td>
              </tr>';
    }

    echo '</table>';
} else {
    echo '<p>No se encontraron resultados para el filtro seleccionado.</p>';
}
?>