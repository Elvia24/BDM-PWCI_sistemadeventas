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



<title>Compar Producto</title>

<style>



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
            <div class="card card-solid">
            <form action="" id="myForm" onsubmit="return validarCantidad();" method="POST"  enctype="multipart/form-data" >
           
                    <input type="hidden" name="NombreProducto" value="<?php echo $NombreProducto ?>">
                    <input type="hidden" name="DescripcionProducto" value="<?php echo $DescripcionProducto ?>">
                    <input type="hidden" name="vendedor" value="<?php echo $NombreUsuario ?>">
                    <input type="hidden" name="categoria" value="<?php echo $NombreCategoria ?>">
                    <input type="hidden" name="idProducto" value="<?php echo $ID_producto ?>">


                    <input type="hidden" name="imagenP_1" value="<?php echo $imagenP_1 ?>">
                    <input type="hidden" name="imagenP_2" value="<?php echo $imagenP_2 ?>">
                    <input type="hidden" name="imagenP_3" value="<?php echo $imagenP_3 ?>">


                    <input type="hidden" name="subTotalDelProducto" id="subTotalDelProductoHidden">
                    <input type="hidden" name="CantidadDeProductos" id="CantidadDeProductosHidden">

<!-- <a href="../app/controllers/carrito/eliminar_fila.php"></a> -->

        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              
              <div class="col-12">
                <img   src="<?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" class="product-image" alt="Product Imagen"   >
              </div>
              <hr>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img name="imagenP_1" src="<?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_1;?>" alt="Product Imagen"></div>
                <div class="product-image-thumb" ><img name="imagenP_2" src="<?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_2;?>" alt="Product Imagen"></div>
                <div class="product-image-thumb" ><img name="imagenP_3" src="<?php echo $URL. "../app/controllers/productos/imageProductos/" .$imagenP_3;?>" alt="Product Imagen"></div>
<!-- <?php echo $imagenP_1?> -->
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $NombreProducto ?></h3>
              <p>Descripcion: <?php echo $DescripcionProducto?></p>

              
              <h4>Vendedor: <small><?php echo $NombreUsuario  ?> </small></h4>
              <h4>CATEGORIA: <small><?php echo $NombreCategoria  ?> </small></h4>
<hr>

                <input hidden class="form-control" type="text" disabled value="<?php echo $ID_producto ?>">


                                  
                            <?php
                            if ($venta_cotizar == 1) {
                                echo'                <div class="row">

                                <div class="col-6">
                                <h4>Cantidad:</h4>
                                <small><input name="CantidadDeProductos"   id="CantidadDeProductos" class="form-control" type="number" step="1"  min="1" value="1" required></small>
                                </div>
            
                                <div class="col-6">
                                <h4>subTotal:</h4>
                                    <small><input name="subTotalDelProducto" id="subTotalDelProducto" class="form-control" type="text"   disabled></small>
                                </div>
                                
            
                            </div>';

                                echo ' <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                  $' . $precioProducto . '                </h2>
                                  <h4 class="mt-0">
                                    <small>Precio </small>
                                  </h4>
                                </div>';
                                
                            }elseif($venta_cotizar == 0){
                                // echo '<h4 style="">Cotizar </h4>';
                                
                                echo ' <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                  Cotizar</h2>
                                 </div>';

                            }
                            ?>

            


              <div class="mt-4">
                            <?php
                            if ($venta_cotizar == 1) {
                                echo '

                              <button onclick="submitForm(\'../app/controllers/carrito/carrito.php\');" type="submit" class="btn btn-primary btn-lg btn-flat"  ><i class="fas fa-cart-plus fa-lg mr-2"></i>  Agregar al Carrito.</button>';
                                
                            }elseif($venta_cotizar == 0){
                                // echo '<h4 style="">Cotizar </h4>';
                                
                                echo '
                              <button  onclick="submitForm(\'../app/controllers/carrito/cotizar.php\');" type="submit" class="btn btn-primary btn-lg btn-flat"  ><i class="fa fa-handshake fa-lg mr-2"></i> Pedir Cotizar.</button>
                              ';
                                    
                            }
                            ?>

<!-- <a href="../app/controllers/carrito/carrito.php"></a> -->

                <!-- <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div> -->

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Agregar a mi lista
                </div>
              </div>



            </div>
          </div>
          <!-- <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div> -->

            </form>



        </div>
        <!-- /.card-body -->
      </div>

            </div>
          
        </div>
          
    </div>
        </section>
        <!-- Contenedor Perfil -->
        
    </div>
    <!-- El contenido de la página -->
    <?php include('../layout/mensaje.php');?>
<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->
<!-- VISUALIZAR IMAGENES -->
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>

<!-- CALULAR SUBTOTAL DEL PRODUCTO -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var cantidadInput = document.getElementById('CantidadDeProductos');
        var subTotalInput = document.getElementById('subTotalDelProducto');

        // Función para calcular el subtotal
        function calcularSubTotal() {
            var cantidad = parseFloat(cantidadInput.value);
            var precioProducto = parseFloat(<?php echo $precioProducto; ?>);
            var subTotal = cantidad * precioProducto;

            if (!isNaN(subTotal)) {
                subTotalInput.value = subTotal.toFixed(2); // Redondea a dos decimales
            } else {
                subTotalInput.value = '';
            }
        }

        // Calcular el subtotal al cargar la página
        calcularSubTotal();

        // Agregar el evento 'input' para calcular el subtotal cuando se cambia la cantidad
        cantidadInput.addEventListener('input', calcularSubTotal);
    });
</script>

<!-- SOLO NUMEROS ENTEROS PARA LA CANTIDAD DE PRODUCTOS -->
<script>
    document.getElementById('CantidadDeProductos').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // Elimina caracteres no numéricos
    });
</script>
<!-- VETANA CARRITO O VENTAN COTIZAR -->
<script>
function submitForm(action) {
    var form = document.getElementById("myForm");
    form.action = action ; // Asigna la acción según el botón seleccionado
    form.submit(); // Envía el formulario
}
</script>
<!-- ENIVAR CANTIDAD Y SUB TOTAL AL CARRITO -->
<script>
    function submitForm(url) {
    // Obtén el valor de subTotalDelProducto y CantidadDeProductos
    var subTotalDelProducto = document.getElementById("subTotalDelProducto").value;
    var CantidadDeProductos = document.getElementById("CantidadDeProductos").value;

    // Establece los valores en los campos ocultos
    document.getElementById("subTotalDelProductoHidden").value = subTotalDelProducto;
    document.getElementById("CantidadDeProductosHidden").value = CantidadDeProductos;

    // Envía el formulario
    document.getElementById("myForm").action = url;
    document.getElementById("myForm").submit();
}

</script>