<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/MIS_productos.php');
 include('../layout/parte1.php');  //ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL 


?> 



<title>Mis Productos</title>

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
        <!-- Contenedor Perfil -->
        <section class="content" >
        <div class="container-fluid">
            <div class="row" >

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
                        <th >Venta/Cotizacion </th>
                        <th >Imagenes </th>
                        <th >Video </th>
                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($productos_tabla as $productos_dato){ 
                      $id_producto = $productos_dato['ID_producto'];
                      
                      
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
                            <div class="btn-group">
                                <?php if ($productos_dato['EstadoProducto'] == 0): ?>
                                    <a href="<?php echo $URL;?>../Productos/VerProducto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Ver</a>
                                    <a href="<?php echo $URL;?>../Productos/EditarProducto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-success"><i class="fa  fa-pen"></i>Editar</a>
                                    <a href="<?php echo $URL;?>../Productos/EliminarProducto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Eliminar</a>
                                    
                                <?php endif; ?>
                            </div>
                        
                    </td>


                        <td><?php echo $productos_dato['NombreProducto'];?>
                    </td>
                        <td><?php echo $productos_dato['DescripcionProducto'];?></td>
                        <td><?php echo $productos_dato['PrecioProducto'];?></td>
                        <td><?php echo $productos_dato['CantidadDisponible'];?></td>
                        
                        <td><?php echo $productos_dato['CalificacionProducto'];?></td>
                        <td><?php echo $productos_dato['NombreCategoria'];?></td>
                        <td><?php echo $productos_dato['NombreUsuario'];?></td>
                        <td class="cotizar-<?php echo $productos_dato['venta_cotizar']; ?>">
                        <?php
                        if ($productos_dato['venta_cotizar'] == 1) {
                            echo "Venta";
                        } elseif ($productos_dato['venta_cotizar'] == 0) {
                            echo "Cotizar";
                        }
                        ?>

                        
                    </td>
                        <td>
                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['imagenP_1'];?>" width="100px" alt="imageUsuarios/">
                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['imagenP_2'];?>" width="100px" alt="imageUsuarios/">
                        <img src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['imagenP_3'];?>" width="100px" alt="imageUsuarios/">


                        </td>
                        <td>
                        <video width="320" height="240" controls>
                            <source src="<?php echo $URL. "../app/controllers/productos/imageProductos/" .$productos_dato['VideoP'];?>" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>


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
        <!-- Encabezado de contenido -->

        
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

