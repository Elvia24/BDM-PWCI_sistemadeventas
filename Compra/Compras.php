<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/compra/listado_compras.php');


 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 



?> 



<title>Mis Compras</title>


  <!-- El contenido de la página -->
  <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> <h1 class="m-0">Mis Compras  </h1></div>
          
          
          <div class="col-sm-3">
          <!-- <form method="post" action="../app/controllers/usuarios/listado_de_usuarios.php">
          <input type="text" name="id_usuarioSesion" value="<?php echo $ID_usuario_sesion?>" hidden>
          
        </form> -->

            

            <label for="miComboBox" class="content" style="padding: 0px 10px;">Categoría: </label>
    <select id="miComboBox" name="ID_Categoria_producto" class="form-control">
        <?php
        // Realiza una consulta para obtener las categorías desde la base de datos
        // Asegúrate de ajustar esta consulta según tu estructura de base de datos
        $consultaCategorias = "SELECT `ID_categoria`, `nombre_cate` FROM `categoria`";

        // Ejecuta la consulta y recorre los resultados
        foreach ($pdo->query($consultaCategorias) as $row) {
            $idCategoria = $row['ID_categoria'];
            $nombreCategoria = $row['nombre_cate'];
            echo "<option value='$idCategoria'>$nombreCategoria</option>";
        }
        ?>
    </select>
            <!-- Large modal -->
<button onclick="buscarPorCategoria()" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" >Buscar</button>


<script>
    function buscarPorCategoria() {
        var categoriaSeleccionada = $('#miComboBox').val();

        // Realizar la solicitud AJAX
        $.ajax({
            type: 'GET',
            url: '../app/controllers/filtros/filtrar_compra_categoria.php',
            data: { categoria: categoriaSeleccionada },
            success: function(response) {
                // Puedes manejar la respuesta aquí
                console.log(response);

                // Si deseas, puedes hacer algo con la respuesta, como mostrarla en algún elemento HTML
                $('#resultado').html(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resultados de la busqueda </h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="resultado"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
          <!-- Large modal -->
          </div>

<!--  -->

          <div class="col-sm-3">
          <label for="Porfecha" class="content" style="padding: 0px 10px;">Categoría: </label>
          <input  name="Porfecha" value="" class="form-control" type="date" name="Porfecha" id="Porfecha"  min="1977-01-01"  required>

            <!-- Large modal -->
<button onclick="buscarPorFecha()" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg2">Buscar</button>
<script>
    function buscarPorFecha() {
        var fechaSeleccionada = $('#Porfecha').val();

        // Realizar la solicitud AJAX
        $.ajax({
            type: 'GET',
            url: '../app/controllers/filtros/filtrar_compra_fecha.php',
            data: { fecha: fechaSeleccionada },
            success: function(response) {
                // Puedes manejar la respuesta aquí
                console.log(response);

                // Si deseas, puedes hacer algo con la respuesta, como mostrarla en algún elemento HTML
                $('#resultado2').html(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>


<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resultados de la busqueda </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div id="resultado2"></div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
          <!-- Large modal -->



          </div>
<!--  -->

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
                    
<!-- Formulario de filtro -->





<!-- Fin del formulario de filtro -->



                <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <th>No. de Compra</th>
                        <th>Fecha</th>
                        <th>Imagenes</th>
                        <th>Producto Comprado</th>
                        <th>Categoria </th>
                        <th>Cantidad</th>
                        <th >SubTotal</th>
                        <th >Total</th>
                        
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($compras_tabla as $compras_dato){ 
                      $ID_Compra = $compras_dato['No. de Compra'];
                      $Fecha_de_Compra = $compras_dato['Fecha de Compra'];
                      $imagenP_1 = $compras_dato['imagenP_1'];
                      $imagenP_2 = $compras_dato['imagenP_2'];
                      $imagenP_3 = $compras_dato['imagenP_3'];
                      $NombredeCategoría = $compras_dato['Nombre de Categoría'];
                      $Cantidad = $compras_dato['Cantidad'];
                      $Subtotal = $compras_dato['Subtotal'];
                      $Total = $compras_dato['Total'];
                      $ProductoComprado = $compras_dato['Producto Comprado'];
                      ?>
                      
                     <tr >
                        <td><?php echo $ID_Compra;?></td>
                        <td><?php echo  $Fecha_de_Compra;?></td>
                        <td>
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" width="100px" alt="imageProducto/">
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_2;?>" width="100px" alt="imageProducto/">
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_3;?>" width="100px" alt="imageProducto/">
                        
                        </td>
                        <td ><?php echo $ProductoComprado;?></td>
                        <td><?php echo $NombredeCategoría;?></td>
                        <td><?php echo $Cantidad;?></td>
                        <td ><?php echo $Subtotal;?></td>
                        <td ><?php echo $Total;?></td>
                        
                        

                     </tr>
                     

                    <?php
                    }
                    
                    ?>
                        
                    </tbody>


                    </table>

                </div> 
            </div><!--col-12 -->
            </div><!--row -->
            <!-- Encabezado tabla -->
        </div>
        <!-- Contenedor tabla -->




            </div>

  <!-- El contenido de la página -->

  <?php include('../layout/mensaje.php');?>
<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->






