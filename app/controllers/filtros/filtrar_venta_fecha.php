<?php
include('../../config.php');
include('../../../layout/sesion.php');

// Verifica si se recibió el parámetro 'fecha'
if (isset($_GET['fecha'])) {
    // Obtiene el valor del parámetro 'fecha'
    $fechaSeleccionada = $_GET['fecha'];
    // Consulta SQL preparada
    $sql_venta_fecha = "SELECT 
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
WHERE u.ID_usuario = :id_usuario
AND DATE(v.fechaCreacion) = DATE(:fecha_compra)";

    // Prepara la consulta
    $query_venta_fecha = $pdo->prepare($sql_venta_fecha);

    // Asigna valores a los parámetros
    $query_venta_fecha->bindParam(':id_usuario', $ID_usuario_sesion, PDO::PARAM_INT);
    $query_venta_fecha->bindParam(':fecha_compra', $fechaSeleccionada, PDO::PARAM_STR); // Cambiado a PDO::PARAM_STR
    
    // Ejecuta la consulta
    $query_venta_fecha->execute();

    // Obtiene los resultados
    $venta_fecha_tabla = $query_venta_fecha->fetchAll(PDO::FETCH_ASSOC);

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
                    foreach($venta_fecha_tabla as $ventas_dato){ 
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
