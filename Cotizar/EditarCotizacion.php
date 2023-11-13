<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/cotizar/cargar_cotizaciones.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 

?> 



<title>Editar Mensaje</title>


    
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
            Mensaje Cliente
            </h3>
        </div>
        <div class="card-body">
            <div class="card card-light card-outline">
            <div class="card-header">
            <!-- <h5 class="card-title">Update Readme</h5> -->
            <div class="card-tools">
            Correo:                       
            
            <?php echo $correo_Cliente?>
            <!-- <a href="#" class="btn btn-tool">
            <i class="fas fa-pen"></i>
            </a> -->
            </div>
            </div>
            <div class="card-body">
            <p>
                <?php echo $Mensaje_Cliente?>
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
            Mensaje Vendedor
            </h3>
        </div>
        <form class="form-horizontal" action="../app/controllers/cotizar/edit_cotizacion.php " method="POST"  enctype="multipart/form-data"   >

            <div class="card-body">
                <div class="card card-light card-outline">
                

                <input name="id_cotizacion" type="text" value="<?php echo $id_pedido_get ?>" hidden>



                <div class="card-body">
                    <textarea  name="mensaje_vendedor" id="" cols="140" rows="10"><?php echo $Mensaje_Vendedor?></textarea>

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


