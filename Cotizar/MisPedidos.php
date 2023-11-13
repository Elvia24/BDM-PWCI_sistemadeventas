<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/cotizar/listaMispedidos.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Mis Pedidos</title>


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

            <h1 class="m-0">Lista de Mis Pedidos</h1>
          </div><!-- col-sm-6 -->
        </div><!-- row mb-2-->
      </div><!-- container-fluid -->
    </div>
    <!-- Encabezado de contenido -->




    <!-- Contenedor tabla -->
    <div class="content" style ="padding: 0rem 2rem">


    
            <!-- Encabezado tabla -->
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    
                <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <th>Nombre Producto</th>
                        <th>Imagenes Producto</th>
                        <th>Vendedor</th>
                        <th>Mensaje</th>
                        <th>Mensaje del Vendedor</th>
                        
                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($pedidos_tabla as $pedido_dato){ 
                      $ID_Cotizar = $pedido_dato['ID_Cotizar'];
                     
                      ?>
                      
                     <tr >
                        <td><?php echo $pedido_dato['nombre_prod'];?></td>
                        <td>
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$pedido_dato['imagenP_1'];?>" width="100px" alt="imageProductos/">
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$pedido_dato['imagenP_2'];?>" width="100px" alt="imageProductos/">
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$pedido_dato['imagenP_3'];?>" width="100px" alt="imageProductos/">
                        
                        </td>
                        <td><?php echo $pedido_dato['correo'];?></td>
                        
                        <td ><?php echo $pedido_dato['Mensaje_Cliente'];?></td>
                       <td ><?php echo $pedido_dato['Mensaje_Vendedor'];?></td>
                        <td >
                              <div class="btn-group">
                              <a href="EditarPedido.php?id=<?php echo $ID_Cotizar;?> " type="button" class="btn btn-success"><i class="fa fa-pen"></i>Editar Mensaje</a>
                              <a href="EliminarPedido.php?id=<?php echo $ID_Cotizar;?> " type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar Pedido</a>

                              </div>
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

  <!-- El contenido de la página -->

  <?php include('../layout/mensaje.php');?>
<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->






