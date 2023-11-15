
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