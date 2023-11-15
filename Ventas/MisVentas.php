<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/ventas/misventas.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 



?> 



<title>Mis ventas</title>


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

            <h1 class="m-0">Mis Ventas</h1>
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





<form method="post" action="../app/controllers/compra/filtrar_ventas.php?>">
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



                <div class="card-body " style="overflow-y: scroll; max-height: 500px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        
                        <th>Fecha</th>
                        <th>Categoria</th>
                        <th>Producto </th>
                        <th>Imagen </th>
                        <th>Precio</th>
                        <th>Cantidad Disponible</th>
                        
                        
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($ventas_tabla as $ventas_dato){ 
                      $fechaCreacion_venta = $ventas_dato['fechaCreacion_venta'];
                      $nombre_prod = $ventas_dato['nombre_prod'];
                      $nombre_cate = $ventas_dato['nombre_cate'];
                      $imagenP_1 = $ventas_dato['imagenP_1'];
                      $precio_prod = $ventas_dato['precio_prod'];
                      $cantDisp_prod = $ventas_dato['cantDisp_prod'];
                      
                      ?>
                      
                     <tr >
                        <td><?php echo $fechaCreacion_venta;?></td>
                        <td><?php echo  $nombre_cate;?></td>
                        <td><?php echo  $nombre_prod;?></td>
                        <td>
                            <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" width="100px" alt="imageProducto/">
                   
                        </td>
                        <td><?php echo $precio_prod;?></td>
                        <td><?php echo $cantDisp_prod;?></td>



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
        <div class="col-12">
                <div class="card">

                
                <div class="card-header">
                    
<!-- Formulario de filtro -->





<form method="post" action="../app/controllers/compra/filtrar_ventas.php?>">
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



                <div class="card-body " style="overflow-y: scroll; max-height: 500px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        
                        <th>Fecha</th>
                        <th>Categoria</th>
                        <th>Ventas </th>

                        
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($ventas_tabla2 as $ventas_dato2){ 
                      $fechaCreacion_venta = $ventas_dato2['fechaUltimaVenta'];
                      $nombre_categoria = $ventas_dato2['nombre_categoria'];
                      $totalVentas = $ventas_dato2['totalVentas'];
                
                      
                      ?>
                      
                     <tr >
                        <td><?php echo $fechaCreacion_venta;?></td>
                        <td><?php echo  $nombre_categoria;?></td>
                        <td><?php echo  $totalVentas;?></td>




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



            </div>

  <!-- El contenido de la página -->

  <?php include('../layout/mensaje.php');?>
<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->






