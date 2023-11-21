<?php
include('../app/config.php');
include('../layout/sesion.php');


include('../app/controllers/listas/listas.php');
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
                                
                                
                                <div class="bg-yellow py-2 px-3 mt-4"> 
                                  <h2 class="mb-0"><?php echo  $Cantidad_Disponible  ?></h2>
                                    <h4 class="mt-0">
                                      En Existencia:
                                    </h4>
                                </div>
            


              <div class="mt-4">
                            <?php
                            if ($venta_cotizar == 1) {

                              if ($Cantidad_Disponible != 0) {
                                echo '

                              <button onclick="submitForm(\'../app/controllers/carrito/carrito.php\');" type="submit" class="btn btn-primary btn-lg btn-flat"  ><i class="fas fa-cart-plus fa-lg mr-2"></i>  Agregar al Carrito.</button>';
                              }  
                            }elseif ($venta_cotizar == 0) {
                              echo '<a href="../Cotizar/PedirCotizacion.php?id=' . $ID_producto . '" type="button" class="btn btn-primary btn-lg btn-flat">
                                      <i class="fas fa-handshake"></i> Pedir Cotizar
                                    </a>';
                          }
                          
                            ?>

                  <button  type="button" class="btn btn-default btn-lg btn-flat" class="btn" data-toggle="modal" data-target="#modal-create">
                    <i class="fas fa-heart fa-lg mr-2"></i>
                    Agregar a mi lista
                  </button>
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





<!-- MODAL PARA REGISTRAR ListaS -->
<div class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary"  >
              <h4 class="modal-title">Agregar Nueva Lista</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=color:#ffffff;>
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
            <div class="card-body " style="overflow-y: scroll; max-height: 850px;">
                    <table class="table   table-striped ">
                    <thead>
                        <tr>
                        <!-- <th hidden>ID_usuario_sesion</th>
                        <th>id_lista</th>
                        <th>id_producto_get</th> -->
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>

                        </tr>
                    </thead>
                
                    <tbody><!--   AQUI VA LA LISTA DE USUARIOS-->
                    <?php
                         //(lista de usuarios de la base de datos AS  mis lista )
                         //VERIFICAR LA CONSULTA PARA VER SOLO ALGUNOS USUARIOS 
                    foreach($lista_tabla as $lista_dato){ 
                      $id_lista = $lista_dato['ID_lista'];?>
                      
                     <tr >
                        <!-- <td><?php echo $ID_usuario_sesion;?></td>
                        <td><?php echo $id_lista;?></td>
                        <td><?php echo $id_producto_get;?></td> -->
                        <td><?php echo $lista_dato['nombre_lista'];?></td>
                        <td><?php echo $lista_dato['descripcion'];?></td>
                        <td><?php echo $lista_dato['Publica_Privada'];?></td>
                        
                        
                        <td >
                              <div class="btn-group">
                              <td><a href="../app/controllers/listas/agregar_elemento.php?
                              id_lista=<?php echo $id_lista; ?>&
                              id_producto_get=<?php echo $id_producto_get; ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                              

                              </td>
                              
                              </div>
                        </td>

                     </tr>
                     

                    <?php
                    }
                    
                    ?>
                        
                    </tbody>


                    </table>


                    
                </div> <!--card -->



            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- <button  type="button" class="btn btn-primary" id="btn_create">     Agregar Lista </button> -->
                    <div id="respuesta" hidden>

                    </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<script>
$('#btn_create').click(function() {
    var nombre_Lista = $('#nombre_Lista').val();
    var descripcion_Lista = $('#descripcion_Lista').val();
    var Publica_Privada = $('#Publica_Privada').val();
    var ID_usuario_sesion=$('#ID_usuario_sesion').val();

    var url = "../app/controllers/listas/registro_lista.php";
    $.get(url, {
        nombre_Lista: nombre_Lista,
        descripcion_Lista: descripcion_Lista,
        Publica_Privada: Publica_Privada,
        ID_usuario_sesion:ID_usuario_sesion,

    }, function (datos) {
        // Esta función se ejecutará cuando se complete la solicitud
        // Puedes procesar la respuesta aquí
        console.log(datos); // Muestra la respuesta en la consola
        $('#respuesta').html(datos);
    })
    .done(function() {
        // Esta función se ejecutará si la solicitud tiene éxito
        console.log("Solicitud exitosa");
    })
    .fail(function() {
        // Esta función se ejecutará si la solicitud falla
        console.error("Error en la solicitud");
    });
});


</script>

<script>
function validarCantidad() {
    // Obtén el valor de la cantidad disponible
    var cantidadDisponible = <?php echo $Cantidad_Disponible; ?>;

    // Obtén el valor de la cantidad ingresada por el usuario
    var cantidadIngresada = document.getElementById("CantidadDeProductos").value;

    // Verifica si la cantidad ingresada es mayor que cero
    if (cantidadIngresada > 0) {
        // Verifica si la cantidad ingresada es menor o igual a la cantidad disponible
        if (cantidadIngresada <= cantidadDisponible) {
            // Llama a la función para enviar el formulario
            submitForm('../app/controllers/carrito/carrito.php');
            return true;
        } else {
            // Muestra un mensaje de alerta si la cantidad ingresada es mayor que la disponible
            alert("La cantidad ingresada es mayor que la cantidad disponible.");
            return false;
        }
    } else {
        // Muestra un mensaje de alerta si la cantidad ingresada no es mayor que cero
        alert("Ingrese una cantidad válida mayor que cero.");
        return false;
    }
}



</script>