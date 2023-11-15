<?php
include('../../config.php');

if (isset($_POST['buscarPorNombre']) && !empty($_POST['buscarPorNombre'])) {
     $nombreBusqueda = $_POST['buscarPorNombre'];
     $sql_productos="SELECT 
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
     WHERE p.baja_producto=1 AND p.status_prod=1 AND p.nombre_prod LIKE '%$nombreBusqueda%'";
}



$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_tabla = $query_productos->fetchAll(PDO::FETCH_ASSOC);
?>

                
<section class="content" >
            <div class="container-fluid">
            <!-- Encabezado tabla -->
            <div class="row">
           

                <tbody>
                <?php
                
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS
                    foreach($productos_tabla as $producto_dato){
                                $ID_producto = $producto_dato['ID_producto'];
                                $NombreProducto = $producto_dato['NombreProducto'];
                                $PrecioProducto = $producto_dato['PrecioProducto'];
                                $imagenP_1 =$producto_dato['imagenP_1'];
                                $venta_cotizar =$producto_dato['venta_cotizar'];
                                //$NombreUsuario = $producto_dato['NombreUsuario'];?>
                    <div class="col-lg-3 col-6">

                        <div class="small-box" style="background-color:#495057a2;">
                            <div  class="inner ">
                                <h3 style="background-color: var(--rojo-bisonte); color:#ffffff"  ><?php echo $NombreProducto ;?></h3>
                                <!-- <h5>Usuario: <?php echo $PrecioProducto?></h5>  -->
                                <img  style="width: 50%; height: 50%; object-fit: object-fit;" src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" alt="imageProductos/">
                            </div>
                                        
                            <?php
                            if ($venta_cotizar == 1) {
                                echo '<h4 style="">Precio: ' . $PrecioProducto . ' $ </h4>';
                                echo '<a type="button" class="btn btn-light btn-lg" href="' . $URL . '../Compra/ComprarProducto.php?id=' . $ID_producto . '" >Comprar. </a>';
                                
                            }elseif($venta_cotizar == 0){
                                // echo '<h4 style="">Cotizar </h4>';
                                
                                echo '<a type="button" class="btn btn-dark btn-lg" href="' . $URL . '../Compra/ComprarProducto.php?id=' . $ID_producto . '" >Cotizar. </a>';

                            }
                            ?>

                            <br><br> 
                            <a  style="background-color: var(--azul-bisonte);" href="<?php echo $URL;?>../Productos/VerProducto.php?id=<?php echo $ID_producto; ?>" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>



                    <?php
                    }

                    ?>






                </tbody>





                
            </div>
            <!-- /.col -->
            </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
        </section>