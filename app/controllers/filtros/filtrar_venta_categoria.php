<?php
include('../../config.php');
include('../../../layout/sesion.php');

// Verifica si se recibió el parámetro 'categoria'
if (isset($_GET['categoria'])) {
    // Obtiene el valor del parámetro 'categoria' y lo convierte a un entero para mayor seguridad
    $categoriaSeleccionada = intval($_GET['categoria']);

    // Consulta SQL preparada
    $sql_venta_categorias = "SELECT 
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
    p.id_Categoria,  -- Agregado el campo ID de la Categoría
    c.nombre_cate
FROM producto p
JOIN ventas v ON p.ID_producto = v.Id_producto
JOIN usuario u ON p.id_Usuario = u.ID_usuario
JOIN categoria c ON p.id_Categoria = c.ID_categoria
WHERE u.ID_usuario =  :id_usuario
AND p.id_Categoria = :id_categoria";

    // Prepara la consulta
    $query_venta_categorias = $pdo->prepare($sql_venta_categorias);

    // Asigna valores a los parámetros
    $query_venta_categorias->bindParam(':id_usuario', $ID_usuario_sesion, PDO::PARAM_INT);
    $query_venta_categorias->bindParam(':id_categoria', $categoriaSeleccionada, PDO::PARAM_INT);

    // Ejecuta la consulta
    $query_venta_categorias->execute();

    // Obtiene los resultados
    $venta_categorias_tabla = $query_venta_categorias->fetchAll(PDO::FETCH_ASSOC);

} else {
    // Si no se recibió el parámetro 'categoria', puedes manejar la situación de alguna manera
    echo "No se proporcionó la categoría.";
}

?>
                <div class="card-body " style="overflow-y: scroll; max-height: 500px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        
                        <th>Fecha</th>
                        <th>Categoria</th>
                        <th>Producto </th>
                        <th>Imagen </th>
                        <th>Precio</th>
                        <th>Cantidad Disponible</th>
                        
                        
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($venta_categorias_tabla as $ventas_dato){ 
                      $fechaCreacion_venta = $ventas_dato['fechaCreacion_venta'];
                      $nombre_prod = $ventas_dato['nombre_prod'];
                      $nombre_cate = $ventas_dato['nombre_cate'];
                      $imagenP_1 = $ventas_dato['imagenP_1'];
                      $precio_prod = $ventas_dato['precio_prod'];
                      $cantDisp_prod = $ventas_dato['cantDisp_prod'];
                      
                      ?>
                      
                     <tr >
                        <td><?php echo $fechaCreacion_venta;?></td>
                        <td><?php echo  $nombre_cate;?></td>
                        <td><?php echo  $nombre_prod;?></td>
                        <td>
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" width="100px" alt="imageProducto/">
                   
                        </td>
                        <td><?php echo $precio_prod;?></td>
                        <td><?php echo $cantDisp_prod;?></td>



                     </tr>
                     

                    <?php
                    }
                    
                    ?>
  
                    </tbody>


                    </table>

                </div> <!--card -->
