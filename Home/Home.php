<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- nuevo estilo -->
  <link rel="stylesheet" href="../public/css/Colores.css">
  <!-- viejo estilo -->
  <link rel="stylesheet" href="../dist/css/lte.min.css">
  
  <link rel="stylesheet" href="../prueba.scss">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" >
  <!-- buena noche -->
    <!-- Barra superior -->
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
      <li class="nav-item dropdown">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-cart-plus"></i>
          </a>
        </li> 
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#" role="button">
          <i class="fas fa-arrow-right"></i>
        </a>
      </li>
    </ul>
  <!-- contenedor barra superior parte izquierda -->
  </nav>
    <!-- Barra superior -->

  <!-- Contenedor de barra lateral Derecha -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 " style="background-color: var(--azul-bisonte-barralateral);">
    <!-- Logo -->
    <a href="Home.php" class="brand-link "style=" border-bottom: var(--rojo-bisonte);">
      <img src="../public/images/Logo.png" alt="Ventas Bisontes" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ventas Bisontes</span>
    </a>

    <!-- Contenedor Menu lateral derecho-->
    <div class="sidebar">
      <!-- Panel de usuario de la barra lateral Derecha-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"style=" border-bottom: var(--rojo-bisonte);">
        <div class="image">
          <img src="../public/images/Logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div>
      <!-- Panel de usuario de la barra lateral Derecha-->
      <!-- Menu Lateral Derecha -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!--  clase .nav-icon con font-awesome para los iconos -->
            <!--  USUARIOS-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
                <p>
                    Usuarios
                      <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->  
                </p>
            </a>
          </li>
            <!--  USUARIOS-->
          <!--  CATEGORIAS-->
          <li class="nav-item menu">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-bars"></i>
                <p>
                  Categorias
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <!--  categorias-->
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p></p>
                </a>
              </li>
            </ul>
            <!--  categorias-->
          </li>
          <!--  CATEGORIAS-->


            <!--  PRODUCTOS-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-barcode"></i>
              <p>
                Mis Productos
                  <!-- <span class="right badge badge-danger">0</span> insignia-peligro-->  
              </p>
            </a>
          </li>
            <!--  PRODUCTOS-->
            <!--  COTIZACION-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
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
  
  <!-- El contenido de la página -->
  <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
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
                <h3 class="card-title"> Productos</h3>
              </div><!--card-header -->
              
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>Categoria</th>
                      <th>Imagen</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ascac48748</td>
                      <td>asc</td>
                      <td>scas</td>
                      <td>aqui</td>
                      <td>cass</td>
                      <td>caacsacss</td>
                    </tr>
                  </tbody>
                </table>
              </div><!--card-body table-responsive p-0 -->

            </div> <!--card -->
          </div><!--col-12 -->
        </div><!--row -->
        <!-- Encabezado tabla -->
    </div>
    <!-- Contenedor tabla -->
  </div>
  <!-- El contenido de la página -->

  <!-- barra derecha carrito -->
  <aside class="control-sidebar control-sidebar-dark" style="background-color: var(--bisonte-barralateralderecha); ">
    <!-- El contenido de la barra lateral de control va aquí -->
    <div class="p-3">
      <h5>Carrito</h5>
      <p >Algo</p>
    </div>
  </aside>
  <!-- barra derecha carrito -->



<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  -->
<script src="../dist/js/lte.min.js"></script>
</body>
</html>
