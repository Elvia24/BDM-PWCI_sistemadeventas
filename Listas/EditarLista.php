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

            <h1 class="m-0">Lista
            </h1>
            
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

<form class="form-horizontal" action="../app/controllers/listas/edit_lista.php " method="POST"  enctype="multipart/form-data" >
                        <h3 class="profile-username text-center">Nombre: 
                            <input type="text" name="nombre_lista" value="<?php echo $nombre_lista?>" class="form-control">
                            <input type="text" name="id_lista_get" value="<?php echo $id_lista_get?>" class="form-control" hidden>
                        </h3>
                        <hr>
                        <h4 class="profile-username text-center">Publica/Privada
                        
                        <select name="Publica_Privada" id="Publica_Privada" class="form-control">
                                <option value="Publica" <?php if ($Publica_Privada === 'Publica') echo 'selected'; ?>>Publica</option>
                                <option value="Privada" <?php if ($Publica_Privada === 'Privada') echo 'selected'; ?>>Privada</option>
                                <!-- Agrega más opciones según sea necesario -->
                        </select>

                        </h4>
                        <hr>
                        <h5>Descripcion:<textarea required id="descripcion_Lista"  class="form-control text-muted"  name="descripcion_Lista" rows="4" cols="10"><?php echo $descripcion;?></textarea> </h5>
                        <button  type="submit"class="btn btn-success"><i class="fa fa-pen"></i>Guardar</button>
</form>



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






