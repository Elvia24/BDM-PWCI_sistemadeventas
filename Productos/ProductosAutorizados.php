<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/ListaProductosNoAutorizados.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Autorizar Productos</title>
<style>
  .cotizar-1 {
    background-color: rgba(0, 183, 255, 0.555);
    color: black; /* Cambia el color del texto si es necesario */
}

.cotizar-0 {
    background-color: rgba(0, 4, 255, 0.555);/* Puedes elegir otro color si lo prefieres */
    color: black; /* Cambia el color del texto si es necesario */
}
</style>

<style>
    .product-image {
        max-width: 200px; /* Ajusta el tamaño máximo de la imagen */
        max-height: 200px;
        border: 1px solid #ccc; /* Agrega un borde */
        margin-right: 10px; /* Espacio entre las imágenes */
    }
</style>

  <!-- El contenido de la página -->
  <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <!-- <form method="post" action="../app/controllers/usuarios/listado_de_usuarios.php">
          <input type="text" name="id_usuarioSesion" value="<?php echo $ID_usuario_sesion?>" hidden>
          
        </form> -->

            <h1 class="m-0">Autorizar Productos</h1>
          </div><!-- col-sm-6 -->
        </div><!-- row mb-2-->
      </div><!-- container-fluid -->
    </div>
    <!-- Encabezado de contenido -->




    <!-- Contenedor tabla -->
    <div class="content" style ="padding: 0rem 2rem">


    
            <!-- Encabezado tabla -->
            <div class="row">
            <!-- /.col -->
            <div class="col-md-12  piso-container-borde-fIN" >
                
                <div class="card">
                
                <div class="card-header " ><!-- card-header ENCABEZADO CAJA DERECHA -->
                <!-- <h1 class="card-title ">Mis Productos</h1> -->

                    <!-- <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active " href="#EditarDatos" data-toggle="tab"  >Editar Datos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>

                    </ul> -->
                    

                    
                </div><!-- /.card-header ENCABEZADO CAJA DERECHA-->
                <!--  CAJA DERECHA-->
                <div class="card-body">
                    <!--  CAJA DERECHA CONTENIDO-->
                                <!-- Encabezado tabla -->
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    
                <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <th></th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th >Cantidad disponible</th>
                        <th >Calificacion </th>
                        <th >Categoria </th>
                        <th >Vendedor </th>
                        <th >Venta/Cotizacion </th>
                        <th >Imagenes </th>
                        <th >Video </th>
                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($productos_tabla as $productos_dato){ 
                      $id_producto = $productos_dato['ID_producto'];
                      
                      
                      ?>
                      
                     <tr >
                      
                     <td >
                       
                            <div class="btn-group">
                                    
                                    <a href="../app/controllers/productos/autorizar_producto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-success"><i class="fa  fa-check"></i>Autorizar</a>
                                    
                                    
                         
                            </div>
                        
                    </td>


                        <td><?php echo $productos_dato['NombreProducto'];?>
                    </td>
                        <td><?php echo $productos_dato['DescripcionProducto'];?></td>
                        <td><?php echo $productos_dato['PrecioProducto'];?></td>
                        <td><?php echo $productos_dato['CantidadDisponible'];?></td>
                        
                        <td><?php echo $productos_dato['CalificacionProducto'];?></td>
                        <td><?php echo $productos_dato['NombreCategoria'];?></td>
                        <td><?php echo $productos_dato['NombreUsuario'];?></td>
                        <td class="cotizar-<?php echo $productos_dato['venta_cotizar']; ?>">
                        <?php
                        if ($productos_dato['venta_cotizar'] == 1) {
                            echo "Venta";
                        } elseif ($productos_dato['venta_cotizar'] == 0) {
                            echo "Cotizar";
                        }
                        ?>

                        
                    </td>
                        <td>
                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['imagenP_1'];?>" width="100px" alt="imageUsuarios/">
                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['imagenP_2'];?>" width="100px" alt="imageUsuarios/">
                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['imagenP_3'];?>" width="100px" alt="imageUsuarios/">


                        </td>
                        <td>
                        <video width="320" height="240" controls>
                            <source src="<?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['VideoP'];?>" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>


                        </td>




                     </tr>
                     

                    <?php
                    }
                    
                    ?>
                        
                    </tbody>


                    </table>

                </div> <!--card -->
            </div><!--col-12 -->
            </div><!--row -->
            <!-- Encabezado tabla -->
        </div>
        <!-- Contenedor tabla -->




            </div>
                        <!--  CAJA DERECHA CONTENIDO-->
                </div> 
                    <!--  CAJA DERECHA-->
                </div><!-- /.card-body -->


                </div>
        <!-- Contenedor tabla -->




            </div>

  <!-- El contenido de la página -->

  <?php include('../layout/mensaje.php');?>
<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->






