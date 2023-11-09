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
          <div class="col-sm-6">
          <!-- <form method="post" action="../app/controllers/usuarios/listado_de_usuarios.php">
          <input type="text" name="id_usuarioSesion" value="<?php echo $ID_usuario_sesion?>" hidden>
          
        </form> -->

            <h1 class="m-0">Mis Compras</h1>
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
                    
<!-- Formulario de filtro -->





<form method="post" action="../app/controllers/compra/filtrar_compras.php?>">
    <label for="categoria">Filtrar por Categoría:</label>
    <select id="categoria" name="categoria" class="">
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

    <label for="fecha">Filtrar por Fecha:</label>
    <input type="date" name="fecha" id="fecha" required>

    <input type="text" name="ID_usuario" id="ID_usuario" value="<?php echo $ID_usuario_sesion?>">
    <input   type="submit" value="Filtrar">
</form>
<!-- Fin del formulario de filtro -->



                <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <th>No. de Compra</th>
                        <th>Fecha</th>
                        <th>Imagenes</th>
                        <th>Producto Comprado</th>
                        <th>Categoria</th>
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
                        <td><?php echo $NombredeCategoría;?></td>
                        <td><?php echo $Cantidad;?></td>
                        <td ><?php echo $Subtotal;?></td>
                        <td ><?php echo $Subtotal;?></td>
                        <td ><?php echo $ProductoComprado;?></td>
                        <!-- <td ><?php echo $usuarios_dato['ID_usuario'];?></td> -->


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






