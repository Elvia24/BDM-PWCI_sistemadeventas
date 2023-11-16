<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../app/controllers/productos/productos_por_categoria.php');

include('../layout/parte1.php'); //<!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->

// include('../app/controllers/usuarios/ver_usuario.php');










?>

<title>Ver mas Productos</title>



  <!-- El contenido de la página -->
<div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
    <div class="content-header ">
            <!--Buscador -->
        
<!-- Formulario de búsqueda -->
<form class="form-inline" id="formBusqueda">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar por nombre" aria-label="Search" id="buscarPorNombre">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="button" id="btnBuscar">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>

<!-- Contenedor para mostrar resultados de búsqueda -->



            <!--Buscador -->
    </div>



            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Productos</h1>
                
                </div><!-- col-sm-6 -->

                </div><!-- row mb-2-->
            </div><!-- container-fluid -->
            </div>
    <!-- Encabezado de contenido -->
    <!-- Contenedor Perfil -->
    <div id="resultadosBusqueda"></div>
    <!-- Contenedor Perfil -->
<hr>


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
                                $imagenP_1 =$producto_dato['imagenP_1'];
                                $venta_cotizar =$producto_dato['venta_cotizar'];
                                //$NombreUsuario = $producto_dato['NombreUsuario'];?>
                    <div class="col-lg-3 col-6">

                        <div class="small-box" style="background-color:#495057a2;">
                            <div  class="inner ">
                                <h3 style="background-color: var(--rojo-bisonte); color:#ffffff"  ><?php echo $NombreProducto ;?></h3>
                                <!-- <h5>Usuario: <?php echo $PrecioProducto?></h5>  -->
                                <img  style="width: 50%; height: 50%; object-fit: object-fit;" src=" <?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" alt="imageProductos/">
                            </div>
                                        
                            <?php
                            if ($venta_cotizar == 1) {
                                echo '<h4 style="">Precio: ' . $PrecioProducto . ' $ </h4>';
                                echo '<a type="button" class="btn btn-light btn-lg" href="' . $URL . '../Compra/ComprarProducto.php?id=' . $ID_producto . '" >Comprar. </a>';
                                
                            }elseif($venta_cotizar == 0){
                                // echo '<h4 style="">Cotizar </h4>';
                                
                                echo '<a type="button" class="btn btn-dark btn-lg" href="' . $URL . '../Compra/ComprarProducto.php?id=' . $ID_producto . '" >Cotizar. </a>';

                            }
                            ?>

                            <br><br> 
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



  </div>
  <!-- El contenido de la página -->

  <?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->





  <script>
    $(document).ready(function() {
        // Acción al escribir en el campo de búsqueda
        $("#buscarPorNombre").on("input", function() {
            // Obtener el término de búsqueda
            var nombreBusqueda = $(this).val();

            // Verificar si buscarPorNombre está vacío
            if (nombreBusqueda.trim() === "") {
                // Mostrar otro resultado o realizar alguna acción cuando el término está vacío
                $("#resultadosBusqueda").html("<p>Por favor, ingresa un término de búsqueda.</p>");
            } else {
                // Realizar la petición AJAX
                $.ajax({
                    type: "POST",
                    url: "../app/controllers/productos/buscar.php", // Archivo PHP para procesar la búsqueda
                    data: { buscarPorNombre: nombreBusqueda },
                    success: function(response) {
                        // Mostrar los resultados en el contenedor designado
                        $("#resultadosBusqueda").html(response);
                    }
                });
            }
        });
    });
</script>



