<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/cargar_producto.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 

?> 



<title>Mensaje</title>


    
    <!-- El contenido de la página -->
    <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
        <!-- Encabezado de contenido  -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0">Producto</h1> -->
            </div><!-- col-sm-6 -->
            </div><!-- row mb-2-->
        </div><!-- container-fluid -->
        </div>
        <!-- Encabezado de contenido -->
        <!-- Contenedor Perfil -->

        <section class="content">
<div class="row">
<div class="col-md-3">
    <div class="card card-row card-default">
        <div class="card-header bg-dark">
            <h3 class="card-title">
            Info Vendedor
            </h3>
        </div>
        <div class="card-body">
            <div class="card card-light card-outline">
            <div class="card-header">
            <!-- <h5 class="card-title">Update Readme</h5> -->
            <div class="card-tools">
            Correo:                       
            <?php echo $correo?>
            <!-- <a href="#" class="btn btn-tool">
            <i class="fas fa-pen"></i>
            </a> -->
            </div>
            </div>
            <div class="card-body">
            <p>Producto:   <?php echo $NombreProducto;?>
            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" width="100px" alt="imageProductos/">

            </p>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-9">
<div class="card card-row card-default">
        <div class="card-header bg-light">
            <h3 class="card-title">
            Mensaje Cliente
            </h3>
        </div>
        <form class="form-horizontal" action="../app/controllers/cotizar/registar_cotizacion.php " method="POST"  enctype="multipart/form-data"   >

            <div class="card-body">
                <div class="card card-light card-outline">
                <input name="ID_producto" type="text" value="<?php echo $ID_producto ?>" hidden>
                <input name="ID_usuario_sesion" type="text" value="<?php echo $ID_usuario_sesion  ?>" hidden>


                



                <div class="card-body">
                    <textarea  name="mensaje_cliente" id="" cols="100" rows="10"></textarea>

                    <button type="submit" href="#" class="btn btn-success"> Enviar Mensaje
                        <i class="fas fa-envelope"></i>
                    </button>

                </div>
                </div>
            </div>

        </form>
    </div>
</div>

</div>

</section>



        
    </div>
    <!-- El contenido de la página -->
    <?php include('../layout/mensaje.php');?>
<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->


