<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/MIS_productos.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Agregar Producto</title>

<style>
    .product-image {
        max-width: 200px; /* Ajusta el tamaño máximo de la imagen */
        max-height: 200px;
        border: 1px solid #ccc; /* Agrega un borde */
        margin-right: 10px; /* Espacio entre las imágenes */
    }


    .estado-1 {
    background-color: green;
    color: white; /* Cambia el color del texto si es necesario */
}

.estado-0 {
    background-color: red; /* Puedes elegir otro color si lo prefieres */
    color: white; /* Cambia el color del texto si es necesario */
}
</style>

    
    <!-- El contenido de la página -->
    <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
        <!-- Encabezado de contenido  -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Producto</h1>
            </div><!-- col-sm-6 -->
            </div><!-- row mb-2-->
        </div><!-- container-fluid -->
        </div>
        <!-- Encabezado de contenido -->
        <!-- Contenedor Perfil -->
            <section class="content" >
        <div class="container-fluid">
            <div class="row" >
            <div class="col-md-10">

                <!-- Profile Image Box  -->
                <div class="card2a card-outline barrasuperior" >
                <div class="card-body box-profile " ><!-- card-body -->


                    <h3 class="profile-username text-center">Agrega Producto</h3>

                    <!-- Datos Usuario -->
                        
                <div class="card-body " ><!-- card-body -->
                    <div class="tab-content"><!-- tab-content -->
                    <div class="active tab-pane" id="EditarDatos">
                    <form class="form-horizontal" action="../app/controllers/productos/registrar_producto.php " method="POST"  enctype="multipart/form-data"   >
                        
                        <!-- Campos a LLenar -->
                        <div class="form-group row">
                            <label for="inputNombreProducto" class=" col-form-label ">Nombre</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputNombreProducto" placeholder="Nombre" name="NombreProducto" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputDescripcionProducto" class="col-form-label">Descripción</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="inputDescripcionProducto" placeholder="Descripción" name="DescripcionProducto" rows="4" required></textarea>
                            </div>
                        </div>



                        

                                                
                        <!-- <div class="form-group row">
                            <label for="inputCotizaroVenta" class=" col-form-label ">Cotizar o Venta</label>
                            <div class="col-sm-12">
                            
                            <select id="miComboBox" name="opciones" class="form-control" >
                            <option value="opcion1" >Cotizar</option>
                            <option value="opcion2">Venta</option>
                            
                          </select>
                          
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="inputDescripcionProducto" class=" col-form-label ">Precio *Si no establece precio es cotizacion</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputDescripcionProducto" placeholder="0" name="PrecioProducto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputStock" class=" col-form-label ">Stock (Cantidad Disponible)</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputStock" placeholder="0" name="StockProducto">
                            </div>
                        </div>


                            <!-- Campos para cargar imágenes -->
                            <div class="form-group row">
    <label class="col-form-label col-sm-12">Imágenes del Producto (Máximo 3)</label>
    <div class="col-sm-6">
                <table>
            <tr>
                <td>
                    <input type="file" name="ArchivoSubido1" accept="image/*" style="display: none;" id="inputImagenProducto1" required >
                    <label for="inputImagenProducto1" class="btn btn-primary">Subir Imagen 1</label>
                    <img id="imagenPreview1" class="imagen-estilo">
                </td>
                <td>
                    <input type="file" name="ArchivoSubido2" accept="image/*" style="display: none;" id="inputImagenProducto2"required>
                    <label for="inputImagenProducto2" class="btn btn-primary">Subir Imagen 2</label>
                    <img id="imagenPreview2"class="imagen-estilo" >
                </td>

                <td>
                    <input type="file" name="ArchivoSubido3" accept="image/*" style="display: none;" id="inputImagenProducto3"required>
                    <label for="inputImagenProducto3" class="btn btn-primary">Subir Imagen 3</label>
                    <img id="imagenPreview3" class="imagen-estilo"></td>
                </tr>

    
            </table>


        </div>
    </div>



    <!-- Campo para cargar un video -->
    <div class="form-group row">
        <label for="inputVideoProducto" class="col-form-label ">Video Del Producto</label>
        <div class="col-sm-12">
            <input  type="file" id="videoSubido" name="ArchivoSubido4" accept="video/*" required>
            <video id="videoPreview" controls style="display: none;"></video>
        </div>
    </div>

<!-- Vista previa del video -->
<div class="form-group row">
    <label class="col-form-label">Vista previa del video:</label>
    <div class="col-sm-12">
        <video id="videoPreview" controls style="display: none;"></video>
    </div>
</div>
<div class="form-group row">
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
</div>



    <div class="form-group row">
        <label for="inputDescripcionProducto" class="col-form-label">Precio *Si no establece precio es cotización</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="inputDescripcionProducto" placeholder="0">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputStock" class="col-form-label">Stock (Cantidad Disponible)</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="inputStock" placeholder="0">
        </div>
    </div>

    <input type="text" name="id_usuarioSesion" id="ID_usuario_sesion" value="<?php echo $ID_usuario_sesion?>" hidden>


    
                        <!-- Campos a LLenar -->
                        <!-- Boton Guardar -->
                        <div class="form-group row">
                            <div class="offset-sm-5 col-sm-10">
                            <button type="submit" class="btn btn-success"  >Guardar</button>
                            </div>
                        </div>
                        

                        <!-- Boton Guardar -->
                    </form>
                    </div><!-- /.tab-pane -->
                    </div><!-- /.tab-pane -->
                </div> <!-- /.tab-content -->
                    <!-- Datos Usuario -->

                    <!-- Boton --><!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                
                </div><!-- /.card-body -->
                <!-- Profile Image Box  -->
                

                <!-- Caja baja -->
                <!-- <div class="card card-primary ">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                
                </div> -->
                <!-- Caja baja -->
            </div>
            <!-- /.col -->
            <div class="col-md-12  piso-container-borde-fIN" >
                
                <div class="card">
                
                <div class="card-header " ><!-- card-header ENCABEZADO CAJA DERECHA -->
                <h1 class="card-title ">Mis Productos</h1>

                    <!-- <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active " href="#EditarDatos" data-toggle="tab"  >Editar Datos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>

                    </ul> -->
                    

                    
                </div><!-- /.card-header ENCABEZADO CAJA DERECHA-->
                <!--  CAJA DERECHA-->
                <div class="card-body">
                    <!--  CAJA DERECHA CONTENIDO-->
                                <!-- Encabezado tabla -->
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    
                <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <th>Autorizado</th>
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
                      
                     <td class="estado-<?php echo $productos_dato['EstadoProducto']; ?>">
                        <?php
                        if ($productos_dato['EstadoProducto'] == 1) {
                            echo "Autorizado";
                        } elseif ($productos_dato['EstadoProducto'] == 0) {
                            echo "No Autorizado";
                        }
                        ?>
                    </td>


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
                             
                              <!-- <a href="EliminarUsuario.php?idu=<?php echo $id_usuario;?> " type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a> -->

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
                        <!--  CAJA DERECHA CONTENIDO-->
                </div> 
                    <!--  CAJA DERECHA-->
                </div><!-- /.card-body -->


                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- Contenedor Perfil -->
        
    </div>
    <!-- El contenido de la página -->
    <?php include('../layout/mensaje.php');?>
<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->



<script>
// Función para mostrar la vista previa de imágenes
function mostrarVistaPreviaImagen(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var imagen = document.createElement("img");
            imagen.setAttribute("src", e.target.result);
            document.getElementById("previewImages").appendChild(imagen);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Función para mostrar la vista previa del video
function mostrarVistaPreviaVideo(input) {
    if (input.files && input.files[0]) {
        var video = document.getElementById("videoPreview");
        video.style.display = "block";
        video.src = URL.createObjectURL(input.files[0]);
    }
}

// Asignar eventos para mostrar vistas previas al cambiar los archivos
document.querySelector('input[name="ArchivoSubido1"]').addEventListener('change', function() {
    mostrarVistaPreviaImagen(this);
});

document.querySelector('input[name="ArchivoSubido2"]').addEventListener('change', function() {
    mostrarVistaPreviaImagen(this);
});

document.querySelector('input[name="ArchivoSubido3"]').addEventListener('change', function() {
    mostrarVistaPreviaImagen(this);
});

document.querySelector('input[name="ArchivoSubido4"]').addEventListener('change', function() {
    mostrarVistaPreviaVideo(this);
});
</script>
<script>
// Función para mostrar la vista previa de imágenes
function mostrarVistaPreviaImagen(input, imagenPreview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var imagen = document.getElementById(imagenPreview);
            imagen.src = e.target.result;
            imagen.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        var imagen = document.getElementById(imagenPreview);
        imagen.src = "";
        imagen.style.display = "none";
    }
}

// Asignar eventos para mostrar vistas previas al cambiar los archivos
document.querySelector('input[name="ArchivoSubido1"]').addEventListener('change', function() {
    mostrarVistaPreviaImagen(this, 'imagenPreview1');
});

document.querySelector('input[name="ArchivoSubido2"]').addEventListener('change', function() {
    mostrarVistaPreviaImagen(this, 'imagenPreview2');
});

document.querySelector('input[name="ArchivoSubido3"]').addEventListener('change', function() {
    mostrarVistaPreviaImagen(this, 'imagenPreview3');
});
</script>
