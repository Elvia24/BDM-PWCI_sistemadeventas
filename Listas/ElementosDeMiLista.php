<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/listas/cargar_lista.php');
include('../app/controllers/listas/cargar_elementosdelista.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Lista</title>


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

            <h1 class="m-0">Elementos de Mi Lista </h1>
            
          </div><!-- col-sm-6 -->
        </div><!-- row mb-2-->
      </div><!-- container-fluid -->
    </div>
    <!-- Encabezado de contenido -->




    <!-- Contenedor tabla -->
    <div class="content" style ="padding: 0rem 2rem">


    
            <!-- Encabezado tabla -->
            <div class="row">
            <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card2a card-outline barrasuperior">
                    <div class="card-body box-profile ">


                        <h3 class="profile-username text-center">Nombre: <?php echo $nombre_lista;?></h3>
                        <hr>
                        <h4 class="profile-username text-center"><?php echo $Publica_Privada;?></h4>
                        <hr>
                        <h5>Descripcion:<p class="text-muted "><?php echo $descripcion;?></p></h5>
                        



                    </div>
                    
                    </div>


            </div>


            <div class="col-md-9">
                <div class="card">
                <div class="card-header">
                    
                <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Imagenes</th>
                        <th>Precio</th>
                        
                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($elementos_listas_datos as $lista_elemento_dato){ 
                      $id_detalle_lista = $lista_elemento_dato['ID_DL'];?>
                      
                     <tr >

                        <td><?php echo $lista_elemento_dato['nombre_prod'];?></td>
                        <td><?php echo $lista_elemento_dato['descripcion_prod'];?></td>
                        <td>
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$lista_elemento_dato['imagenP_1'];?>" width="100px" alt="imageProductos/">
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$lista_elemento_dato['imagenP_2'];?>" width="100px" alt="imageProductos/">
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$lista_elemento_dato['imagenP_3'];?>" width="100px" alt="imageProductos/">
                        </td>
                        <td><?php echo $lista_elemento_dato['precio_prod'];?></td>
                        <td><a href="../app/controllers/listas/eliminar_elemento_lista.php?id=<?php echo $id_detalle_lista;?> " type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a></td>


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






