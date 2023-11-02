<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/lista_productos.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Productos</title>

<style>
    .product-image {
        max-width: 200px; /* Ajusta el tamaño máximo de la imagen */
        max-height: 200px;
        border: 1px solid #ccc; /* Agrega un borde */
        margin-right: 10px; /* Espacio entre las imágenes */
    }
</style>

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
                        <th >Imagenes </th>
                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($productos_tabla as $productos_dato){ 
                      //$id_producto = $productos_dato['ID_usuario'];
                      
                      
                      ?>
                      
                     <tr >
                      
                     
                        <td><?php echo $productos_dato['NombreProducto'];?></td>
                        <td><?php echo $productos_dato['DescripcionProducto'];?></td>
                        <td><?php echo $productos_dato['PrecioProducto'];?></td>
                        <td><?php echo $productos_dato['CantidadDisponible'];?></td>
                        
                        <td><?php echo $productos_dato['CalificacionProducto'];?></td>
                        <td><?php echo $productos_dato['NombreCategoria'];?></td>
                        <td><?php echo $productos_dato['NombreUsuario'];?></td>
                       <?php 
                        // ... Resto de tus datos
    // Subconsulta para obtener imágenes
    $sql_imagenes = "SELECT Imagen_Video FROM imagen_video WHERE id_producto = :id_producto";
    $query_imagenes = $pdo->prepare($sql_imagenes);
    $query_imagenes->bindParam(':id_producto', $productos_dato['ID_producto']);
    $query_imagenes->execute();
    $imagenes = $query_imagenes->fetchAll(PDO::FETCH_COLUMN);

    // Dirección base de las imágenes en el servidor
    $directorioImagenes = "../app/controllers/productos/imageProductos/"; // Cambia esta URL

    // Abre la celda <td> antes del bucle
    
    echo '<td>';
    $imagenMostrada = false; // Variable para verificar si se muestra al menos una imagen
    
    // Muestra las imágenes en la celda <td>
    foreach ($imagenes as $imagen) {
        echo '<img class="product-image" src="' . $directorioImagenes . $imagen . '"';
        // Verifica si la imagen es válida y, si es el caso, establece el atributo "alt"
        if (file_exists($directorioImagenes . $imagen)) {
           
            $imagenMostrada = true; // Marca que se ha mostrado una imagen
        }
        echo '>';
    }
    
    // Si al menos se mostró una imagen, agrega el reproductor de video
    if ($imagenMostrada) {
        echo '<video controls width="640" height="360">';
        echo '<source src="' . $directorioImagenes . $imagen . '" type="video/mp4">';
        echo 'Tu navegador no soporta la reproducción de videos.';
        echo '</video>';
    }
    
    // Cierra la celda <td>
    echo '</td>';
    
    
                        
                        ?>

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






