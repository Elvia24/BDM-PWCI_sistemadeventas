<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/lista_productos.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Usuarios</title>


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

            <h1 class="m-0">Lista de Productos</h1>
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
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th >Cantidad disponible</th>
                        <th >Calificacion </th>
                        <th >Categoria </th>
                        <th >Vendedor </th>
                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($usuarios_tabla as $usuarios_dato){ 
                      $id_usuario = $usuarios_dato['ID_usuario'];?>
                      
                     <tr >
                        <td>
                            <img src=" <?php echo $URL. "../app/controllers/usuarios/imageUsuarios/" .$usuarios_dato['Imagen'];?>" width="100px" alt="imageUsuarios/">
                        
                        </td>
                        <td><?php echo $usuarios_dato['nombreUsuario'];?></td>
                        <td><?php echo $usuarios_dato['RolNombre'];?></td>
                        <td ><?php echo $usuarios_dato['correo'];?></td>
                        <!-- <td ><?php echo $usuarios_dato['ID_usuario'];?></td> -->
                        <td >
                              <div class="btn-group">
                              <a href="VerUsuario.php?idu=<?php echo $id_usuario;?> " type="button" class="btn btn-info"><i class="fa fa-eye"></i>Ver</a>
                              <a href="EliminarUsuario.php?idu=<?php echo $id_usuario;?> " type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>

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






