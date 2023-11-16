<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/filtros/para_cotizar.php');

include('../layout/parte1.php'); //<!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->

// include('../app/controllers/usuarios/ver_usuario.php');


?>

<title>Para Cotizar</title>



  <!-- El contenido de la página -->
<div class=" content-wrapper "style="background-color: var(--gris-bisonte);">




            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><a href="../Productos/Productos.php" type="button" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>Para Cotizar</h1>
                
                </div><!-- col-sm-6 -->

                </div><!-- row mb-2-->
            </div><!-- container-fluid -->
            </div>
   



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
                            <?php if ($Rol_sesion === 'Administrador' ||$Rol_sesion === 'Publico' ||$Rol_sesion === 'Privado') : ?>       
                            <?php
                            if ($venta_cotizar == 1) {
                                echo '<h4 style="">Precio: ' . $PrecioProducto . ' $ </h4>';
                                echo '<a type="button" class="btn btn-light btn-lg" href="' . $URL . '../Compra/ComprarProducto.php?id=' . $ID_producto . '" >Comprar. </a>';
                                
                            }elseif($venta_cotizar == 0){
                                // echo '<h4 style="">Cotizar </h4>';
                                
                                echo '<a type="button" class="btn btn-dark btn-lg" href="' . $URL . '../Compra/ComprarProducto.php?id=' . $ID_producto . '" >Cotizar. </a>';

                            }
                            ?>
                            <?php endif; ?>
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



  </div>
  <!-- El contenido de la página -->

  <?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->









