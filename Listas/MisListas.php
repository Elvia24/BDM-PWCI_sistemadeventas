<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/listas/listas.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Mis Listas</title>


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

            <h1 class="m-0">Mis Listas
                    <button style="background-color: var(--rojo-bisonte);   color: #ffffff;" type="button" class="btn" data-toggle="modal" data-target="#modal-create">
                      <i class="fas fa-plus"> </i>Agregar Lista
                    </button>
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






            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    
                <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>

                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($lista_tabla as $lista_dato){ 
                      $id_lista = $lista_dato['ID_lista'];
                      $id_usuario_lista = $lista_dato['id_usuario'];?>
                      
                     <tr >

                        <td><?php echo $lista_dato['nombre_lista'];?></td>
                        <td><?php echo $lista_dato['descripcion'];?></td>
                        <td><?php echo $lista_dato['Publica_Privada'];?></td>
                        
                        
                        <td >
                              <div class="btn-group">
                              <a href="EditarLista.php?id=<?php echo $id_lista;?> " type="button" class="btn btn-success"><i class="fa fa-pen"></i>Editar</a>
                              <a href="ElementosDeMiLista.php?id=<?php echo $id_lista; ?>&id_usuario=<?php echo $id_usuario_lista; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Ver</a>
                              <a href="EliminarLista.php?id=<?php echo $id_lista;?> " type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
                              
                              
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





<!-- MODAL PARA REGISTRAR ListaS -->
<div class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header "style="background-color: var(--rojo-bisonte); color:#ffffff" >
              <h4 class="modal-title">Agregar Nueva Lista</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=color:#ffffff;>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                            <input type="text" name="id_usuarioSesion" id="ID_usuario_sesion" value="<?php echo $ID_usuario_sesion?>" hidden>
                            <label for="nombre_Lista">Nombre de la Lista: </label>
                                <input required type="text" id="nombre_Lista" class="form-control">

                            <label for="descripcion_Lista">Descripcion: </label>
                                <textarea required id="descripcion_Lista"  class="form-control" id="descripcion" name="descripcion" rows="4" cols="10"></textarea>

                                <input type="text" name="id_usuarioSesion" id="ID_usuario_sesion" value="<?php echo $ID_usuario_sesion?>" hidden>
                                
                            <label for="Publica_Privada">Publica/Privada </label>
                                <select id="Publica_Privada" class="form-control">
                                  <option value="Publica">Publica</option>
                                  <option value="Privada">Privada</option>
                                  
                                  <!-- Agrega más opciones según sea necesario -->
                                </select>

                            </div>

                        </div>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button style="background-color: var(--rojo-bisonte);" type="button" class="btn btn-primary" id="btn_create">     Agregar Lista </button>
                    <div id="respuesta" hidden>

                    </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<script>
$('#btn_create').click(function() {
    var nombre_Lista = $('#nombre_Lista').val();
    var descripcion_Lista = $('#descripcion_Lista').val();
    var Publica_Privada = $('#Publica_Privada').val();
    var ID_usuario_sesion=$('#ID_usuario_sesion').val();

    var url = "../app/controllers/listas/registro_lista.php";
    $.get(url, {
        nombre_Lista: nombre_Lista,
        descripcion_Lista: descripcion_Lista,
        Publica_Privada: Publica_Privada,
        ID_usuario_sesion:ID_usuario_sesion,

    }, function (datos) {
        // Esta función se ejecutará cuando se complete la solicitud
        // Puedes procesar la respuesta aquí
        console.log(datos); // Muestra la respuesta en la consola
        $('#respuesta').html(datos);
    })
    .done(function() {
        // Esta función se ejecutará si la solicitud tiene éxito
        console.log("Solicitud exitosa");
    })
    .fail(function() {
        // Esta función se ejecutará si la solicitud falla
        console.error("Error en la solicitud");
    });
});


</script>