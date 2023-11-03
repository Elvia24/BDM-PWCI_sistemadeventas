<?php
include('../app/config.php');
include('../layout/sesion.php');

// include('../app/controllers/productos/buscar_producto.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 

<?php


$id_producto = $_GET['idu'];

$sql_productos = "SELECT
p.ID_producto,
p.nombre_prod AS NombreProducto,
p.descripcion_prod AS DescripcionProducto,
p.precio_prod AS PrecioProducto,
p.status_prod AS EstadoProducto,
p.cantDisp_prod AS CantidadDisponible,
p.calificacion_prod AS CalificacionProducto,
p.fechaCreacion_prod AS FechaCreacionProducto,
p.id_Categoria,
c.nombre_cate AS NombreCategoria,
u.ID_usuario AS IDUsuario,
u.nombreUsuario AS NombreUsuario
FROM producto AS p
LEFT JOIN categoria AS c ON p.id_Categoria = c.ID_categoria
LEFT JOIN usuario AS u ON p.id_Usuario = u.ID_usuario
WHERE p.ID_producto = $id_producto
GROUP BY p.ID_producto;";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_tabla = $query_productos->fetchAll(PDO::FETCH_ASSOC);

// Imprimir los datos
foreach ($productos_tabla as $producto) {
     "ID del Producto: " . $producto['ID_producto'] . "<br>";
     "Nombre del Producto: " . $producto['NombreProducto'] . "<br>";
     "Descripción del Producto: " . $producto['DescripcionProducto'] . "<br>";
     "Precio del Producto: " . $producto['PrecioProducto'] . "<br>";
     "Estado del Producto: " . $producto['EstadoProducto'] . "<br>";
    
   
 "Cantidad Disponible: " . $producto['CantidadDisponible'] . "<br>";
     "Calificación del Producto: " . $producto['CalificacionProducto'] . "<br>";
     "Fecha de Creación del Producto: " . $producto['FechaCreacionProducto'] . "<br>";
     "ID de la Categoría: " . $producto['id_Categoria'] . "<br>";
     "Nombre de la Categoría: " . $producto['NombreCategoria'] . "<br>";
     "ID del Usuario: " . $producto['IDUsuario'] . "<br>";
     "Nombre del Usuario: " . $producto['NombreUsuario'] . "<br>";
}


//imagenes del producto
$sql_imagen_productos = "SELECT ID_Img_Vid, Imagen_Video FROM imagen_video WHERE id_producto =$id_producto";


$query_imagen_productos = $pdo->prepare($sql_imagen_productos);
$query_imagen_productos->execute();

$productos_imagen_tabla = $query_imagen_productos->fetchAll(PDO::FETCH_ASSOC);

// Imprimir los datos
foreach ($productos_imagen_tabla as $productoimagen_) {
    $imagenURL = $URL . "../app/controllers/productos/imageProductos/" . $productoimagen_['Imagen_Video'];
    $altText = isset($productoimagen_['AltText']) ? $productoimagen_['AltText'] : ''; // Verificar si 'AltText' está definido
       echo '<img src="' . $imagenURL . '" alt="' . $altText . '"><br>';
       echo'_________________________________________________________________________________________'. $productoimagen_['ID_Img_Vid'] ;
}
// echo '<video width="320" height="240" controls>
// <source src="' . $imagenURL . '" type="video/mp4"> <!-- Ajusta el tipo de archivo según el formato de tu video -->
// Your browser does not support the video tag.
// </video><br>';



?>

<title>Editar Producto</title>

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


/* En tu archivo CSS o en línea en el HTML */
.imagen-pequena {
    width: 100px; /* Ajusta el ancho según tus necesidades */
    height: auto; /* Mantiene la proporción de aspecto */
    margin-right: 10px; /* Espacio a la derecha para separar las imágenes */
}

</style>

    
    <!-- El contenido de la página -->
    <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
        <!-- Encabezado de contenido  -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0">Editar Producto</h1> -->
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


                    <h3 class="profile-username text-center">Editar Producto</h3>

                    <!-- Datos Usuario -->
                        
                <div class="card-body " ><!-- card-body -->
                    <div class="tab-content"><!-- tab-content -->
                    <div class="active tab-pane" id="EditarDatos">
                    <form class="form-horizontal" action="../app/controllers/productos/edit_producto.php " method="POST"  enctype="multipart/form-data"   >
                        
                        <!-- Campos a LLenar -->
                        <div class="form-group row">
                            <label for="inputNombreProducto" class=" col-form-label ">Nombre</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputNombreProducto" placeholder="Nombre" name="NombreProducto" required value="<?php echo $producto['NombreProducto']?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputDescripcionProducto" class="col-form-label">Descripción</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="inputDescripcionProducto" placeholder="Descripción" name="DescripcionProducto" rows="4" required  ><?php echo $producto['DescripcionProducto']?></textarea>
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
                            <input type="text" class="form-control" id="inputDescripcionProducto" placeholder="0" name="PrecioProducto" value="<?php echo $producto['PrecioProducto']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputStock" class=" col-form-label ">Stock (Cantidad Disponible)</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputStock" placeholder="0" name="StockProducto" value="<?php echo $producto['CantidadDisponible']?>"required>
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
</tr>

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
    <label class="col-form-label">Video Anterior:</label>
    <div class="col-sm-12">
        <video id="videoPreview" controls style="display: none;"></video>
       
    </div>

    <?php
echo '<video id="videoPreview" width="520" height="440" controls>
<source src="' . $imagenURL . '" type="video/mp4"> <!-- Ajusta el tipo de archivo según el formato de tu video -->
Your browser does not support the video tag.
</video><br>';

?>
</div>



<div class="form-group row">
    <label for="miComboBox" class="content" style="padding: 0px 10px;">Categoría: </label>
    <select id="miComboBox" name="ID_Categoria_producto" class="form-control">
        <?php
        // Realiza una consulta para obtener las categorías desde la base de datos
        $consultaCategorias = "SELECT `ID_categoria`, `nombre_cate` FROM `categoria`";
        foreach ($pdo->query($consultaCategorias) as $row) {
            $idCategoria = $row['ID_categoria'];
            $nombreCategoria = $row['nombre_cate'];
            
            // Verifica si la categoría es la misma que la del producto actual
            $seleccionada = ($idCategoria == $producto['id_Categoria']) ? 'selected' : '';
            
            echo "<option value='$idCategoria' $seleccionada>$nombreCategoria</option>";
        }
        ?>
    </select>
</div>


<input type="text" name="ID_producto" id="ID_producto" value="<?php echo $producto['ID_producto'] ?>" hidden>




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
<!-- JavaScript para cargar imágenes y video en la vista previa -->
<!-- Agrega esta función JavaScript en el bloque de scripts de tu página -->
<script type="text/javascript">
    window.onload = function () {
        function mostrarImagen(imagenURL, elementoImagen) {
            if (imagenURL) {
                elementoImagen.src = imagenURL;
                elementoImagen.style.display = 'block';
                
            }
        }


        <?php
        $contador = 1;
        foreach ($productos_imagen_tabla as $productoimagen_) {?>
            mostrarImagen('<?php echo $URL. "../app/controllers/productos/imageProductos/" .$productoimagen_['Imagen_Video']; ?>', document.getElementById('imagenPreview<?php echo $contador; ?>'));
        <?php
        $contador++;
        }?>
    }
</script>




<script>
    // Escuchar el evento de cambio en el campo de entrada de video
    document.getElementById("videoSubido").addEventListener("change", function () {
        var videoPreview = document.getElementById("videoPreview");
        var fileInput = this;
        
        // Verificar si se seleccionó un archivo
        if (fileInput.files.length > 0) {
            var videoFile = fileInput.files[0];
            
            // Establecer la fuente del video con la URL del archivo seleccionado
            videoPreview.src = URL.createObjectURL(videoFile);
            
            // Mostrar la etiqueta de video
            videoPreview.style.display = "block";
        } else {
            // Ocultar la etiqueta de video si no se selecciona ningún archivo
            videoPreview.style.display = "none";
        }
    });
</script>

