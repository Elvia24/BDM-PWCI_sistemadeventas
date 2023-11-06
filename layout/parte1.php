
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icono de la pagina -->
<link rel="icon" href="<?php echo $URL;?>../../icon/bisonte.ico" type="image/x-icon">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL;?>../public/plugins/fontawesome-free/css/all.min.css">
  <!-- nuevo estilo -->
  <link rel="stylesheet" href="<?php echo $URL;?>../public/css/Colores.css">
  <!-- viejo estilo -->
  <link rel="stylesheet" href="<?php echo $URL;?>../dist/css/lte.min.css">
  
  <link rel="stylesheet" href="<?php echo $URL;?>../prueba.scss">


  <link rel="stylesheet" href="<?php echo $URL;?>../dist/css/images_videoProducto.css">


<!-- icono de la pagina -->
  <link rel="icon" href="<?php echo $URL;?>../icon/bisonte.ico" type="image/x-icon">
  <!-- Libreria sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL;?>../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL;?>../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 
<!-- jQuery -->
<script src="<?php echo $URL;?>../public/plugins/jquery/jquery.min.js"></script>
</head>


<body class="hold-transition sidebar-mini">

<script>
  //este sujeto es el mensaje de bienvenido
// Swal.fire({
//   position: 'center',
//   icon: 'success',
//   title: 'Bienvenido al sistema <?php echo $email_sesion;?>',
//   showConfirmButton: false,
//   timer: 1500
// })

</script>
<style>
.tamañoImagenCarrito{width: 70px; height: 70px;}


  
</style>
<div class="wrapper" >
  <!-- buena noche -->



    <!-- BARRA SUPERIOR -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- boton Barra de navegación izquierda -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- boton Barra de navegación izquierda -->

<!-- contenedor barra superior parte izquierda -->
    <ul class="navbar-nav ml-auto" >
      <!--Boton Navbar Buscar -->
      <li class="nav-item">
        <!--Boton -->
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <!--Boton -->
        <!--Buscador -->
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <!--Buscador -->
      </li>
        <!--Boton Navbar Buscar -->

      <!-- Menú desplegable de Compras carrito-->
      <!-- <li class="nav-item dropdown">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-cart-plus"></i>
            
          </a>
        </li> 
      </li> -->


      <li class="nav-item">
                <a type="button" class="nav-link" data-toggle="modal" data-target="#modal-lg">
                <i class="fas fa-cart-plus"></i>
                </a>



                
      </li>

      
      <!-- BOTON DE CERRAR SESION -->
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" role="button">
          <i class="fas fa-arrow-right"></i>
        </a>
      </li>
      <!-- BOTON DE CERRAR SESION -->


      
    </ul>
  <!-- contenedor barra superior parte izquierda -->
  </nav>
    <!-- BARRA SUPERIOR -->




  <!-- Contenedor de barra lateral Derecha -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 " style="background-color: var(--azul-bisonte-barralateral);">
    <!-- Logo -->
    <a href="<?php echo $URL;?>../Home/Home.php" class="brand-link "style=" border-bottom: var(--rojo-bisonte);">
      <img src="<?php echo $URL;?>../public/images/Logo.png" alt="Ventas Bisontes" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ventas Bisontes</span>
    </a>

    <!-- Contenedor Menu lateral derecho-->
    <div class="sidebar">
      <!-- Perfil-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"style=" border-bottom: var(--rojo-bisonte);">
        <div class="image">
          <!-- <img src="<?php echo $URL;?>../public/images/Logo.png" class="img-circle elevation-2" alt="User Image"> -->
          <img   class="img-circle elevation-2" alt="User Image" src="<?php echo $URL. "../app/controllers/usuarios/imageUsuarios/" .$ImagenDusuario_sesion;?>" style="width: 40px; height: 40px;" >


        </div>
        <div class="info">
          <a href="<?php echo $URL;?>../Perfil/perfil.php" class="d-bloc"  style="  font-size: 20px;  " ><?php echo $nombresDusuario_sesion?></a>
        </div>
      </div>
      <!-- Perfil-->
      <!-- Menu Lateral Derecha -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!--  clase .nav-icon con font-awesome para los iconos -->
            <!--  USUARIOS-->
<li class="nav-item">
    <?php if ($Rol_sesion === 'Administrador') : ?>
        <a href="<?php echo $URL;?>../Usuarios/Usuarios.php" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Usuarios
                <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->  
            </p>
        </a>
    <?php endif; ?>
</li>



            <!--  USUARIOS-->
          <!--  CATEGORIAS-->
          <li class="nav-item">

              <?php if ($Rol_sesion === 'Administrador' ||$Rol_sesion === 'Vendedor' ) : ?>
              <a href="<?php echo $URL;?>../Categorias/Categorias.php" class="nav-link">
              <i class="fa fa-tags nav-icon"></i>
              <p>
              Categoria
              <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->  
              </p>
              </a>
              <?php endif; ?>
          </li>

        
          <!--  CATEGORIAS-->


            <!--  PRODUCTOS-->
          <!-- <li class="nav-item">
            <a href="<?php echo $URL;?>../Productos/Productos.php" class="nav-link">
            <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
              <p>
                Productos
                  
              </p>
            </a>
          </li> -->

                      <!-- aqui -->
          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tag"></i>
                <p>
                  Productos
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo $URL;?>../Productos/Productos.php" class="nav-link ">
                  <i class="fa fa-bars "></i>
                  <p> Lista de Producto</p>
                </a>
              </li>
              <li class="nav-item">

                <?php if ($Rol_sesion === 'Administrador' ||$Rol_sesion === 'Vendedor' ) : ?>
                    <a href="<?php echo $URL;?>../Productos/MisProductos.php" class="nav-link">
                        <i class="fa fa-list-ol nav-icon"></i>
                        <p>
                            Mis Productos
                            <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->  
                        </p>
                    </a>
                <?php endif; ?>
              </li>



              <li class="nav-item">

                <?php if ($Rol_sesion === 'Administrador' ||$Rol_sesion === 'Vendedor' ) : ?>
                    <a href="<?php echo $URL;?>../Productos/AgregarProducto.php" class="nav-link">
                        <i class="fa fa-plus-circle nav-icon"></i>
                        <p>
                            Agregar Producto
                            <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->  
                        </p>
                    </a>
                <?php endif; ?>
              </li>



              <li class="nav-item">

                <?php if ($Rol_sesion === 'Administrador'  ) : ?>
                    <a href="<?php echo $URL;?>../Productos/ProductosAutorizados.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Autorizar Productos</p>
                    </a>
                <?php endif; ?>
              </li>
            </ul>
            
          </li>
          

          <!-- aqui -->


            <!--  PRODUCTOS-->
            <!--  COTIZACION-->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i  class="fa fa-handshake" ></i>
              <p>
                Cotizacion
                  <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->  
              </p>
            </a>
          </li>
            <!--  COTIZACION-->
            <!--  REPORTES-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Reportes
                  <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->   
              </p>
            </a>
          </li>
            <!--  REPORTES-->
        </ul>
      </nav>
      <!-- Menu Lateral Derecha -->
    </div>
    <!-- Contenedor Menu lateral derecho-->
  </aside>
  <!-- Contenedor de barra lateral Derecha -->
  

      <!-- /.modal CARRITO-->

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Mi Carrito</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body   table-responsive-sm ">
            
              
                                          <?php include('../app/controllers/carrito/carrito.php');?>
                                        


                                          <?php if (isset($_SESSION['datos'])): ?>
                                              <table class="table">
                                                  
                                                  <thead>
                                                      <tr>
                                                          <th scope="col">#</th>
                                                          <th scope="col">Nombre del Producto</th>
                                                          <th scope="col">ID del Producto</th>
                                                          <th scope="col">Imagen</th>
                                                          <th scope="col">Cantidad</th>
                                                          <th scope="col">subTotal</th>
                                                          <th scope="col">Acción</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php foreach ($_SESSION['datos'] as $indice => $fila): ?>
                                                          <tr>
                                                              <th scope="row"><?= $indice + 1 ?></th>
                                                              <td><?= $fila['NombreProducto'] ?></td>
                                                              <td><?= $fila['idProducto'] ?></td>
                                                              <td><img class="tamañoImagenCarrito" src="../app/controllers/productos/imageProductos/<?= $fila['imagenP_1'] ?>" alt="Imagen del Producto">
                                                              <img class="tamañoImagenCarrito" src="../app/controllers/productos/imageProductos/<?= $fila['imagenP_2'] ?>" alt="Imagen del Producto">
                                                              <img class="tamañoImagenCarrito" src="../app/controllers/productos/imageProductos/<?= $fila['imagenP_3'] ?>" alt="Imagen del Producto">
                                                              </td>
                                                              <td><?= $fila['CantidadDeProductos'] ?></td>
                                                              <td><?= $fila['subTotalDelProducto'] ?></td>
                                                              
                                                              <td><button class="btn btn-danger" onclick="eliminarFila(<?= $indice ?>)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                                          </tr>


                                                      <?php endforeach; ?>
                                                  </tbody>
                                                  <tr>
                                                          <td></td>
                                                          <td></td>
                                                          <td></td>
                                                          <td class="col col-lg-2">Total:</td>
                                                          <td class="p-3 mb-2 bg-secondary text-dark"  id="totalCantidad">0</td>
                                                          <td class="p-3 mb-2 bg-dark text-dark" id="totalSubTotal">0.00</td>
                                                          </tr>
                                              </table>
                                          <?php endif; ?>




                                    <script>
                                    function eliminarFila(indice) {
                                        // Pide confirmación antes de eliminar la fila
                                        if (confirm("¿Estás seguro de que deseas eliminar esta fila?")) {
                                            // Realiza la eliminación en el lado del cliente
                                            var tabla = document.querySelector('table');
                                            if (tabla && tabla.rows.length > indice) {
                                                tabla.deleteRow(indice + 1); // +1 para tener en cuenta la fila de encabezados

                                                // Elimina la fila correspondiente de la matriz en PHP
                                                eliminarFilaEnPHP(indice);
                                            }
                                        }
                                    }

                                    function eliminarFilaEnPHP(indice) {
                                        // Envia una solicitud AJAX al servidor para eliminar la fila en la sesión de PHP
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', '../app/controllers/carrito/eliminar_fila.php?indice=' + indice, true);
                                        xhr.send();

                                        // Puedes manejar la respuesta del servidor si es necesario
                                        xhr.onload = function() {
                                            if (xhr.status === 200) {
                                                // Maneja la respuesta del servidor si es necesario
                                                calcularTotal(); // Llama a la función para recalcular los totales
                                                location.reload(); // Recarga la página actual
                                              }
                                        };
                                    }





                                    // Función para calcular la suma de la columna "Cantidad" y "subTotal"
                                    function calcularTotal() {
                                        var tabla = document.querySelector('table'); // Obtén la tabla
                                        var filas = tabla.querySelectorAll('tbody tr'); // Obtén todas las filas de la tabla
                                        var totalCantidad = 0;
                                        var totalSubTotal = 0;

                                        // Recorre todas las filas y suma las cantidades y subtotales
                                        filas.forEach(function(fila) {
                                            var cantidad = parseInt(fila.querySelector('td:nth-child(5)').textContent); // Columna "Cantidad"
                                            var subTotal = parseFloat(fila.querySelector('td:nth-child(6)').textContent); // Columna "subTotal"
                                            totalCantidad += cantidad;
                                            totalSubTotal += subTotal;
                                        });

                                        // Actualiza los valores totales
                                        document.getElementById('totalCantidad').textContent = totalCantidad;
                                        document.getElementById('totalSubTotal').textContent = totalSubTotal;
                                    }

                                    // Llama a la función para calcular el total al cargar la página
                                    calcularTotal();







                                    </script>



            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-warning">   <i class="fas fa-cart-plus"></i>  Comprar</button>

              <script>
                              // Selecciona el botón por su clase
              const boton = document.querySelector(".btn-warning");

              // Agrega un controlador de eventos para el evento "click"
              boton.addEventListener("click", function() {
                // Este código se ejecutará cuando se haga clic en el botón
                console.log("Se ha hecho clic en el botón.");
                // Puedes agregar aquí cualquier otra lógica que desees ejecutar cuando se haga clic en el botón.
              });

              </script>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <script>

document.querySelector('.btn.btn-warning').addEventListener('click', function() {
    // Verifica si la tabla está vacía
    var tabla = document.querySelector('table');
    if (tabla && tabla.querySelectorAll('tbody tr').length === 0) {
        // Muestra una alerta si la tabla está vacía
        alert('El carrito de compras está vacío. Agrega productos antes de comprar.');
        return;
    }

    // Recopila los datos de la tabla
    var filas = tabla.querySelectorAll('tbody tr');
    var datosDeCompra = [];

    filas.forEach(function(fila) {
        var nombreProducto = fila.querySelector('td:nth-child(2)').textContent;
        var idProducto = fila.querySelector('td:nth-child(3)').textContent;
        var cantidad = parseInt(fila.querySelector('td:nth-child(5)').textContent);
        var subTotal = parseFloat(fila.querySelector('td:nth-child(6)').textContent);

        datosDeCompra.push({
            NombreProducto: nombreProducto,
            idProducto: idProducto,
            CantidadDeProductos: cantidad,
            subTotalDelProducto: subTotal
        });
    });

    // Realiza una solicitud AJAX para enviar los datos al servidor
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../app/controllers/carrito/agregar_compra.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.send(JSON.stringify(datosDeCompra));

    // Maneja la respuesta del servidor si es necesario
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Maneja la respuesta del servidor si es necesario
        }
    };
});

      </script>