<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Realizar Compra </title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- viejo estilo -->
  <link rel="stylesheet" href="../dist/css/lte.min.css">
 <!-- nuevo estilo -->
  <link rel="stylesheet" href="../public/css/Colores.css">
  <link rel="stylesheet" href="../prueba.scss">

     <!-- Libreria sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- icono de la pagina -->
  <link rel="icon" href="<?php echo $URL;?>../icon/bisonte.ico" type="image/x-icon">


</head>
<body class="hold-transition login-page2">

<div class="">

<br>
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">



            <!-- Main content -->
            <div class="invoice p-3 mb-3">



            <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos enviados en el campo 'datosTabla'
    $datosTablaJSON = $_POST['datosTabla'];
    $totalCantidad = $_POST['totalCantidad'];
    $totalSubTotal = $_POST['totalSubTotal'];

    $id_usuarioSesion = $_POST['id_usuarioSesion'];
    $nombresDusuario_sesion = $_POST['nombresDusuario_sesion'];
    $correo_sesion = $_POST['correo_sesion'];
    // Decodifica los datos JSON en un array de PHP
    $datosTabla = json_decode($datosTablaJSON, true);
    
    
    
    
    ?>




              <!-- title row -->
              <div class="row">
              <a href="<?php  include('../app/config.php');  echo $URL;?>/Productos/Productos.php" type="button" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Volver</a>

              
                <div class="col-12">
                   <br>
                  <h4>
                
                        <div class="row invoice-info">
                            

                            
                            <div class="col-sm-6 ">
                                <h4>
                                <img src="../public/images/Logo.png" alt="Logo de Ventas Bisontes" width="50" height="50">  <strong>Ventas Bisontes.</strong>
                                    
                                </h4>
                            </div>

                            
                                                        
                            <div class="col-sm-6">
                                    <b>Fecha: <span id="fechaActual"></span></b>
                            </div>

                            
                        </div>
                  </h4>
                  
                </div>
                
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                  <input type="text" value="<?php echo $id_usuarioSesion ?>" disabled hidden>
                  <address>
                    <strong>Cliente</strong><br>
                    Usuario: <?php echo $nombresDusuario_sesion?>               <br>
                    
                    Email: <?php echo $correo_sesion?>
                  
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-6">

                  <b>Orden ID:</b> 4F3S8J<br>
                 
                </div>
                <!-- /.col -->
              </div>

              
              <!-- /.row -->

              <!-- Table row -->



<?php ?>




<?php
if (!empty($datosTabla)) {

?>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                     
                      <th>Producto</th>
                      <th>Imagenes</th>
                      <th>idProducto</th>
                      <th>Cantidad</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>

<?php  foreach ($datosTabla as $indice => $fila) {
                // Accede a las rutas de las imágenes individuales para la fila actual
                $imagenP1 = $_POST['imagenP1_' . $indice];
                $imagenP2 = $_POST['imagenP2_' . $indice];
                $imagenP3 = $_POST['imagenP3_' . $indice];
     ?>
                    <tbody>
                    <tr>
                      
                      <td><?php echo $fila['nombreProducto']?></td>
                      <td>      
                        <img src="<?php echo $imagenP1?> " alt="Imagen 1" width="100" height="100">
                        <img src="<?php echo $imagenP2?> " alt="Imagen 2" width="100" height="100">
                        <img src="<?php echo $imagenP3?> " alt="Imagen 3" width="100" height="100">
                    
                      </td>
                      <td><?php echo $fila['idProducto']?></td>
                      <td><?php echo $fila['cantidad']?></td>
                      <td><?php echo $fila['subTotal']?></td>
                    </tr>
                


                    </tbody>
<?php  }?>





                  </table>
                </div>
                <!-- /.col -->
              </div>




              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->

                <!-- /.col -->
                <div class="col-12">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                    
                      <tr>
                        <th>Total Productos:</th>
                        <td><?php echo $totalCantidad?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$<?php echo $totalSubTotal?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->






              <div class="row no-print">
                <div class="col-12">
                
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>

                </div>
              </div>


<?php
    } else {
        echo 'No se han recibido datos.';
    }
  } 
  ?>
            </div>







            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  -->
<script src="../dist/js/lte.min.js"></script>
</body>
</html>




<!-- FECHA ACURAL -->
<script>
function actualizarFecha() {
    // Obtén la fecha actual
    const fecha = new Date();

    // Formatea la fecha como desees (por ejemplo, DD/MM/AAAA)
    const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    const fechaFormateada = fecha.toLocaleDateString(undefined, options);

    // Actualiza el contenido del elemento con id "fechaActual"
    document.getElementById("fechaActual").textContent = fechaFormateada;
}

// Llama a la función para actualizar la fecha cuando la página se carga
actualizarFecha();

// Actualiza la fecha cada segundo (puedes ajustar este intervalo si es necesario)
setInterval(actualizarFecha, 1000);
</script>
