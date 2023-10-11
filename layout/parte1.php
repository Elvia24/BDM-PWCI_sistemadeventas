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

<!-- icono de la pagina -->
  <link rel="icon" href="<?php echo $URL;?>../icon/bisonte.ico" type="image/x-icon">
  <!-- Libreria sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      <li class="nav-item dropdown">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-cart-plus"></i>
          </a>
        </li> 
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
    <a href="<?php  include('../app/config.php');    echo $URL;?>../Home/Home.php" class="brand-link "style=" border-bottom: var(--rojo-bisonte);">
      <img src="<?php echo $URL;?>../public/images/Logo.png" alt="Ventas Bisontes" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ventas Bisontes</span>
    </a>

    <!-- Contenedor Menu lateral derecho-->
    <div class="sidebar">
      <!-- Panel de usuario de la barra lateral Derecha-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"style=" border-bottom: var(--rojo-bisonte);">
        <div class="image">
          <!-- <img src="<?php echo $URL;?>../public/images/Logo.png" class="img-circle elevation-2" alt="User Image"> -->
          <img class="img-circle elevation-2" alt="User Image" src="<?php echo $ImagenDusuario_sesion;?>" style="width: 80px; ">


        </div>
        <div class="info">
          <a href="<?php echo $URL;?>../Perfil/perfil.php" class="d-bloc"  style="  font-size: 20px;  " ><?php echo $nombresDusuario_sesion?></a>
        </div>
      </div>
      <!-- Panel de usuario de la barra lateral Derecha-->
      <!-- Menu Lateral Derecha -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!--  clase .nav-icon con font-awesome para los iconos -->
            <!--  USUARIOS-->
          <li class="nav-item">
            <a href="<?php echo $URL;?>../Usuarios/Usuarios.php" class="nav-link">
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
  

