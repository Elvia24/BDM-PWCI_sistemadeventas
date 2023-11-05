<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/cargar_producto.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 

 

//  foreach($productos_datos AS $productos_dato){
//      $NombreProducto = $productos_dato['NombreProducto'];
//      $DescripcionProducto = $productos_dato['DescripcionProducto'];
//      // $ArchivoSubido1 = $_POST['ArchivoSubido1_I'];
//      // $ArchivoSubido2 = $_POST['ArchivoSubido2_I'];
//      // $ArchivoSubido3 = $_POST['ArchivoSubido3_I'];
//      // $ArchivoSubido4 = $_POST['ArchivoSubido4_I'];
//      $NombreCategoria = $productos_dato['NombreCategoria'];
//      $venta_cotizar = $productos_dato['venta_cotizar'];
//      $precioProducto = $productos_dato['PrecioProducto'];
//      $Cantidad_Disponible = $productos_dato['CantidadDisponible'];
//      $NombreUsuario = $productos_dato['NombreUsuario'];

//      $imagenP_1 = $productos_dato['imagenP_1'];
//      $imagenP_2 = $productos_dato['imagenP_2'];
//      $imagenP_3 = $productos_dato['imagenP_3'];
//      $VideoP = $productos_dato['VideoP'];




//  }



?> 



<title>Eliminar Producto</title>

<style>
    .product-image {
        max-width: 200px; /* Ajusta el tamaño máximo de la imagen */
        max-height: 200px;
        border: 1px solid #ccc; /* Agrega un borde */
        margin-right: 10px; /* Espacio entre las imágenes */
    }


    .estado-1 {
    background-color: rgba(51, 255, 0, 0.555);
    color: black; /* Cambia el color del texto si es necesario */
}

.estado-0 {
    background-color: rgba(255, 0, 0, 0.555); 
    color: black; 
}
/*cotizar o no*/

.cotizar-1 {
    background-color: rgba(0, 183, 255, 0.555);
    color: black; /* Cambia el color del texto si es necesario */
}

.cotizar-0 {
    background-color: rgba(0, 4, 255, 0.555);/* Puedes elegir otro color si lo prefieres */
    color: black; /* Cambia el color del texto si es necesario */
}


  .form-group.row input[type="radio"] {
    margin: 10px; /* Agregar margen derecho de 10px entre los radios */
  }

</style>

    
    <!-- El contenido de la página -->
    <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
        <!-- Encabezado de contenido  -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1 class="m-0">Producto</h1> -->
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


                    <h3 class="profile-username text-center">Eliminar</h3>

                    <!-- Datos Usuario -->
                        
                <div class="card-body " ><!-- card-body -->
                    <div class="tab-content"><!-- tab-content -->
                    <div class="active tab-pane" id="EditarDatos">
                    <form class="form-horizontal" action="../app/controllers/productos/eliminar_producto.php " method="POST"  enctype="multipart/form-data"   >
                        
                        <!-- Campos a LLenar -->
                        <div class="form-group row">
                            <label for="inputNombreProducto" class=" col-form-label ">Nombre</label>
                            <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputNombreProducto" placeholder="Nombre" name="NombreProducto" required value="<?php echo $NombreProducto ?>" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputDescripcionProducto" class="col-form-label">Descripción</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="inputDescripcionProducto" placeholder="Descripción" name="DescripcionProducto" rows="4" required disabled><?php echo $DescripcionProducto?></textarea>
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




                            <!-- Campos para cargar imágenes -->
                            <div class="form-group row">
                                    <label class="col-form-label col-sm-12">Imágenes del Producto (Máximo 3)</label>
                                            <div class="col-sm-12">
                                                    <table  class="col-sm-12">
                                                <tr>
                                                    <td>
                                                        <!-- <input type="file" name="ArchivoSubido1" accept="image/*" style="display: none;" id="inputImagenProducto1" required >
                                                        <label for="inputImagenProducto1" class="btn btn-primary">Subir Imagen 1</label>
                                                        <img id="imagenPreview1" class="imagen-estilo"> -->
                                                        
                                                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" width="200px" >
                                                    </td>
                                                    <td>
                                                        <!-- <input type="file" name="ArchivoSubido2" accept="image/*" style="display: none;" id="inputImagenProducto2"required>
                                                        <label for="inputImagenProducto2" class="btn btn-primary">Subir Imagen 2</label>
                                                        <img id="imagenPreview2"class="imagen-estilo" > -->
                                                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_2;?>" width="200px" >

                                                    </td>

                                                    <td>
                                                        <!-- <input type="file" name="ArchivoSubido3" accept="image/*" style="display: none;" id="inputImagenProducto3"required>
                                                        <label for="inputImagenProducto3" class="btn btn-primary">Subir Imagen 3</label>
                                                        <img id="imagenPreview3" class="imagen-estilo"></td> -->
                                                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_3;?>" width="200px" >
                                                    </tr>

                                        
                                                </table>


                                        </div>
                            </div>



                            <!-- Campo para cargar un video -->
                            <div class="form-group row">
                                <!-- <label for="inputVideoProducto" class="col-form-label ">Video Del Producto</label>
                                <div class="col-sm-12">
                                    <input  type="file" id="videoSubido" name="ArchivoSubido4" accept="video/*" required>
                                    <video id="videoPreview" controls style="display: none;"></video>
                                </div> -->
                                <div class="col-sm-12">
                                <video width="620" height="440" controls>
                                    <source src="<?php echo $URL. "../app/controllers/productos/imageProductos/" .$VideoP;?>" type="video/mp4">
                                    Tu navegador no soporta el elemento de video.
                                </video>
                                </div> 
                            </div>

                        <!-- Vista previa del video -->
                        <!-- <div class="form-group row">
                            <label class="col-form-label">Vista previa del video:</label>
                            <div class="col-sm-12">
                                <video id="videoPreview" controls style="display: none;"></video>
                            </div>
                        </div> -->

                        
                        <div class="form-group row">
                            <label for="inputNombreCategoria" class=" col-form-label ">Categoria</label>
                            <div class="col-sm-12">
                    <input type="text" class="form-control" id="inputNombreCategoria" placeholder="Nombre" name="NombreCategoria" required value="<?php echo $NombreCategoria ?>" disabled>
                            </div>
                        </div>





                        <div id="precioField" style="display: none">
                            <div class="form-group row">
                                <label for="inputDescripcionProducto" class="col-form-label">Precio</label>
                                <div class="col-sm-12">
                                    <input name="precioProducto" type="text" class="form-control" id="inputDescripcionProducto" placeholder="0" disabled value="<?php echo $precioProducto; ?>">
                                </div>
                            </div>
                        </div>

                        <div id="otroDiv" style="display: none">
                            <div class="form-group row">
                            <label style=" background-color: rgba(0, 4, 255, 0.555);" for="inputDescripcionProducto" class="col-form-label">Cotizar</label>
                            </div>
                        </div>
                        <script>
                            var ventaCotizarValue = <?php echo $venta_cotizar; ?>; // Obtén el valor de venta_cotizar desde PHP

                            if (ventaCotizarValue === 1) {
                                // Muestra el primer div si ventaCotizarValue es igual a 1
                                document.getElementById("precioField").style.display = "block";
                            } else if (ventaCotizarValue === 0) {
                                // Muestra el segundo div si ventaCotizarValue es igual a 0
                                document.getElementById("otroDiv").style.display = "block";
                            }
                        </script>




    <div class="form-group row">
        <label for="inputStock" class="col-form-label">Stock (Cantidad Disponible)</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="inputStock" placeholder="0" name="CantidadDisponible" disabled value="<?php echo $Cantidad_Disponible; ?>">
            
        </div>

        
    </div>
    




    <input type="text" name="ID_producto" id="ID_producto" value="<?php echo $ID_producto?>"hidden >


    <input type="text" name="id_usuarioSesion" id="ID_usuario_sesion" value="<?php echo $ID_usuario_sesion?>" hidden>


    
                        <!-- Campos a LLenar -->
                        <!-- Boton Guardar -->
                        <div class="form-group row">
                            <div class="offset-sm-5 col-sm-10">
                            <button type="submit" class="btn btn-danger"  >Eliminar</button>
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


<!-- OCULTAR PRECIO -->
<script>
    const opcionVenta = document.getElementById("opcion1");
    const opcionCotizar = document.getElementById("opcion2");
    const precioField = document.getElementById("precioField");

    opcionVenta.addEventListener("change", function() {
        if (opcionVenta.checked) {
            precioField.style.display = "block";
        } else {
            precioField.style.display = "none";
        }
    });

    opcionCotizar.addEventListener("change", function() {
        if (opcionCotizar.checked) {
            precioField.style.display = "none";
        }
    });
</script>

