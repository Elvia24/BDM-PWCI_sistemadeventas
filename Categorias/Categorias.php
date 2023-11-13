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
                    <h1 class="m-0">Categorias
                    <button style="background-color: var(--rojo-bisonte);   color: #ffffff;" type="button" class="btn" data-toggle="modal" data-target="#modal-create">
                    <i class="fas fa-plus"> </i>Agregar Categoria
                    </button>


                    </h1>






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
                                $ID_categoria = $categoria_dato['ID_categoria'];
                                $nombre_categoria = $categoria_dato['nombre_cate'];
                                $descripcion_cate = $categoria_dato['descripcion_cate'];?>
                    <div class="col-lg-3 col-6">

                        <div class="small-box" style="background-color:#495057a2;">
                            <div  class="inner ">

                            <h3 style="background-color: var(--rojo-bisonte); color:#ffffff"  ><?php echo $categoria_dato['nombre_cate'];?></h3>
                            <h4 style="">Descripcion: <?php echo $categoria_dato['descripcion_cate'];?></h4>
                            <h5>Usuario: <?php echo $categoria_dato['nombreUsuario'];?></h5>


                            <div class="btn-group">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit<?php echo $ID_categoria;?>">
                                    <i class="fas fa-pen"> </i>Editar
                            </button>
                                <!-- <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a> -->


                                        <!-- MODAL PARA EDITAR CATEGORIAS -->
                                        <div class="modal fade" id="modal-edit<?php echo $ID_categoria;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #67b150; color:#ffffff">
                                                    <h4 class="modal-title">Editar Categoria</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=color:#ffffff;>
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <label for="">Nombre de la Categoria: </label>
                                                                    <input type="text" id="ID_categoria" value="<?php echo $ID_categoria  ?>" class="form-control" hidden>
                                                                        <input type="text" id="nombre_categoria<?php echo $ID_categoria;?>" value="<?php echo $nombre_categoria  ?>" class="form-control">

                                                                    <label for="">Descripcion: </label>
                                                                        <textarea id="descripcion_categoria<?php echo $ID_categoria;?>" class="form-control"  name="descripcion" rows="4" cols="10" ><?php echo $descripcion_cate  ?></textarea>



                                                                    </div>

                                                                </div>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    <button style="background-color: #67b150; color:#ffffff" type="button" class="btn btn-primary" id="btn_edit<?php echo $ID_categoria;?> "data-id="<?php echo $ID_categoria;?>"> Editar</button>

                                                </div>
                                                <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>
                                            <!-- MODAL PARA EDITAR CATEGORIAS -->

                                            <!-- script PARA EDITAR CATEGORIAS -->
                                            <script>
                                                $('#btn_edit<?php echo $ID_categoria;?>').click(function() {
                                                    //alert('Guardar');
                                                        var nombre_categoria=$('#nombre_categoria').val();
                                                        var descripcion_categoria=$('#descripcion_categoria').val();
                                                        var ID_categoria='<?php echo $ID_categoria;?>';


                                                        // alert("Nombre de la Categoría: " + nombre_categoria);
                                                        // alert("Descripción de la Categoría: " + descripcion_categoria);


                                                        var url="../app/controllers/categorias/edit_categoria.php";
                                                        $.get(url,{nombre_categoria:nombre_categoria,descripcion_categoria:descripcion_categoria,ID_categoria:ID_categoria},function(datos_edit){
                                                            //alert("hola");
                                                             $('#respuesta_edit<?php echo $ID_categoria;?>').html(datos_edit);
                                                        });
                                                    });

                                            </script>
                                             <div id="respuesta_edit<?php echo $ID_categoria;?> "  ></div>
                                             <div id="respuesta2<?php echo $ID_categoria;?> "  ></div>
                                            <!-- script PARA EDITAR CATEGORIAS -->



                            </div>

                        </div>

                            <a  style="background-color: var(--azul-bisonte);" href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
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

<!-- MODAL PARA REGISTRAR CATEGORIAS -->
<div class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header "style="background-color: var(--rojo-bisonte); color:#ffffff" >
              <h4 class="modal-title">Agregar Nueva Categoria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=color:#ffffff;>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="">Nombre de la Categoria: </label>
                                <input type="text" id="nombre_categoria" class="form-control">

                            <label for="">Descripcion: </label>
                                <textarea id="descripcion_categoria"  class="form-control" id="descripcion" name="descripcion" rows="4" cols="10"></textarea>

                                <input type="text" name="id_usuarioSesion" id="ID_usuario_sesion" value="<?php echo $ID_usuario_sesion?>" hidden>

                            </div>

                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button style="background-color: var(--rojo-bisonte);" type="button" class="btn btn-primary" id="btn_create">     Agregar Categoria </button>
                    <div id="respuesta" hidden>

                    </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
      <!-- /.modal -->

        <script>
            $('#btn_create').click(function() {
                //alert('Guardar');
                    var nombre_categoria=$('#nombre_categoria').val();
                    var descripcion_categoria=$('#descripcion_categoria').val();
                    var ID_usuario_sesion=$('#ID_usuario_sesion').val();

                    // alert("Nombre de la Categoría: " + nombre_categoria);
                    // alert("Descripción de la Categoría: " + descripcion_categoria);


                    var url="../app/controllers/categorias/registro_categoria.php";
                    $.get(url,{nombre_categoria:nombre_categoria,descripcion_categoria:descripcion_categoria,ID_usuario_sesion:ID_usuario_sesion},function(datos){
                        $('#respuesta').html(datos);
                    });
                });

        </script>

<script>
$(document).ready(function () {
    // Agrega un evento click al botón "Editar" dentro del modal
    $('[id^="btn_edit"]').click(function() {
        var ID_categoria = $(this).attr("data-id"); // Obtiene el ID de la categoría desde el botón
        var nombre_categoria = $('#nombre_categoria' + ID_categoria).val();
        var descripcion_categoria = $('#descripcion_categoria' + ID_categoria).val();

        //alert(descripcion_categoria);
        // Realiza la solicitud AJAX para enviar los datos al servidor
         $.ajax({
             type: "POST", // Puedes usar "POST" o "GET" según tus necesidades
             url: "../app/controllers/categorias/edit_categoria.php",
             data: {
                 ID_categoria: ID_categoria,
                 nombre_categoria: nombre_categoria,
                 descripcion_categoria: descripcion_categoria
             },
             success: function (response) {
                $('#respuesta2').html(response);
                 // Maneja la respuesta del servidor aquí
                 //console.log(response); // Puedes mostrar un mensaje de éxito o hacer otras acciones necesarias
                                 // Recargar la página después de que la solicitud se complete con éxito
                                     
                                 window.location.reload();
                }
         });
    });
});
</script>