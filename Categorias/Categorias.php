<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/categorias/lista_categoria.php');
include('../layout/parte1.php'); //<!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->
// include('../app/controllers/usuarios/ver_usuario.php');
?> 

<title>Categorias</title>


  <!-- El contenido de la página -->
<div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categorias</h1>
                </div><!-- col-sm-6 -->
                </div><!-- row mb-2-->
            </div><!-- container-fluid -->
            </div>
    <!-- Encabezado de contenido -->
    <!-- Contenedor Perfil -->
        <section class="content" >
            <div class="container-fluid">
            <!-- Encabezado tabla -->
            <div class="row">

            
                <tbody>
                <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($categoria_tabla as $categoria_dato){ 
                    //   $id_usuario = $usuarios_dato['ID_usuario'];?>

                    <div class="col-lg-3 col-6">

                        <div class="small-box" style="background-color:#495057a2;">
                            <div  class="inner ">
                            
                            <h3 style="background-color: var(--gris-Generico)"  ><?php echo $categoria_dato['nombre_cate'];?></h3>
                            <h4 style="">Descripcion: <?php echo $categoria_dato['descripcion_cate'];?></h4>
                            <h5>Usuario: <?php echo $categoria_dato['nombreUsuario'];?></h5>
                            
                        
                            <div class="btn-group">
                              <a href="#" type="button" class="btn btn-success"><i class="fa fa-pen"></i>Editar</a>
                              <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>

                              </div>
                        </div>

                            <!-- <a  style="background-color: var(--bisonte-rojizo-Letras);" href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a> -->
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
    <!-- Contenedor Perfil -->
    
  </div>
  <!-- El contenido de la página -->

  <?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->
