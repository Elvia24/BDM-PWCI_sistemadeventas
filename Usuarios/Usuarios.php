<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/usuarios/listado_de_usuarios.php');
include('../layout/parte1.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->

<title>Usuarios</title>


  <!-- El contenido de la página -->
  <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de Usuarios</h1>
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
                    
                <div class="card-body table-responsive p-0 overflow-auto" style="max-height: 500px;">
                    <table class="table  ">
                    <thead>
                        <tr>
                        <th>Foto</th>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>Correo</th>
                        
                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($usuarios_tabla as $usuarios_dato){ ?>
                     <tr>
                        <td>
                            <img src=" <?php echo $usuarios_dato['Imagen'];?>" width="200px" >
                        
                        </td>
                        <td><?php echo $usuarios_dato['nombreUsuario'];?></td>
                        <td><?php echo $usuarios_dato['Nombres'];?></td>
                        <td><?php echo $usuarios_dato['correo'];?></td>

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


<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->






