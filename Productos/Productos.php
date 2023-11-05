<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/listaAutorizados.php');
include('../layout/parte1.php'); //<!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->
// include('../app/controllers/usuarios/ver_usuario.php');
?>

<title>Productos</title>



  <!-- El contenido de la página -->
<div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Productos



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
                    foreach($productos_tabla as $producto_dato){
                                $ID_producto = $producto_dato['ID_producto'];
                                $NombreProducto = $producto_dato['NombreProducto'];
                                $PrecioProducto = $producto_dato['PrecioProducto'];
                                $imagenP_1 =$producto_dato['imagenP_1']
                                //$NombreUsuario = $producto_dato['NombreUsuario'];?>
                    <div class="col-lg-3 col-6">

                        <div class="small-box" style="background-color:#495057a2;">
                            <div  class="inner ">

                            <h3 style="background-color: var(--rojo-bisonte); color:#ffffff"  ><?php echo $NombreProducto ;?></h3>
                           <h4 style="">Precio: <?php echo $PrecioProducto;?> $ </h4>
                            <!-- <h5>Usuario: <?php echo $PrecioProducto?></h5>  -->
                            <img  style="width: 50%; height: 50%; object-fit: object-fit;" src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" alt="imageProductos/">



                        </div>

                            <a  style="background-color: var(--azul-bisonte);" href="<?php echo $URL;?>../Productos/VerProducto.php?id=<?php echo $ID_producto; ?>" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
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