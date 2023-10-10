<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfil</title>

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
    <a href="../Home/Home.php" class="brand-link "style=" border-bottom: var(--rojo-bisonte);">
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
          <a href="../Perfil/perfil.php" class="d-block">User</a>
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
            <h1 class="m-0">Mi Perfil</h1>
          </div><!-- col-sm-6 -->
        </div><!-- row mb-2-->
      </div><!-- container-fluid -->
    </div>
    <!-- Encabezado de contenido -->
    <!-- Contenedor Perfil -->
        <section class="content" >
      <div class="container-fluid">
        <div class="row" >
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card2a card-outline barrasuperior" >
              <div class="card-body box-profile " >
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../public/images/Logo.png"
                       alt="Foto de Usuario">
                </div>

                <h3 class="profile-username text-center">User</h3>

                <p class="text-muted text-center">Rol</p>
                <!-- Datos Usuario -->
                <ul class="list-group list-group-unbordered mb-2">
                  <li class="list-group-item mx-auto " >
                    <b>Correo Electronico:</b> <a > exemple@gmail.com</a>
                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Nombre: </b> <a >Usuario Completo</a>
                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Fecha de Nacimiento:</b> <a>13/12/2000</a>
                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Sexo:</b> <a>Indistinto</a>
                  </li>
                </ul>
                <!-- Datos Usuario -->

                  <!-- Boton --><!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
          <div class="col-md-9  " >
            <div class="card">
              <div class="card-header p-2"><!-- card-header -->
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active " href="#EditarDatos" data-toggle="tab"  >Editar Datos</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                </ul>
              </div><!-- /.card-header -->

              <div class="card-body"><!-- card-body -->
                <div class="tab-content"><!-- tab-content -->
                  <div class="active tab-pane" id="EditarDatos">
                  <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="CorreoElectronico" class="col-sm-2 col-form-label">Correo Electronico</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="CorreoElectronico" placeholder="Correo Electronico">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputNombredeUsuario" class="col-sm-2 col-form-label">Nombre de Usuario</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputNombredeUsuario" placeholder="Nombre de Usuario">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputContraseña" class="col-sm-2 col-form-label">Constraseña</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputContraseña" placeholder="Constraseña">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label for="inputNombreCompleto" class="col-sm-2 col-form-label">Nombre Completo</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputNombreCompleto" placeholder="Nombre Completo">
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="avatar"  class="col-sm-2 col-form-label">Imagen de perfil</label>

                            <input class="ocultaron "  type="file" id="avatar"  name="imagenSubida" accept="image/*"/>

                        <label for="avatar" class="content" > 
                          <div class="myLabel">
                            <img class="myImg2" id="imagenSubida" src="../public/images/Logo.png" />
                            <div>
                                <span id="tituloArchivo">Agregar imagen</span><br />
                                <span id="nombreArchivo"></span>
                            </div>
                            </div>
                        </label>
                      </div>
                      <div class="form-group row">
                        <label for="inputFechadeNacimiento" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="date" name="birthday" id="birthday" required min="1977-01-01" max="2022-12-31">
                              <div id="myBirthday">
                              <br>
                              </div>
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="miComboBox" class= "col-sm-2 col-form-label">Sexo: </label>
                          <div class="col-sm-10">
                            <select id="miComboBox" name="opciones" class="form-control" >
                            <option value="opcion1" >Mujer</option>
                            <option value="opcion2">Hombre</option>
                            <option value="opcion3">Indistinto</option>
                          </select>
                          </div>
                      </div>
                      <!-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-success">Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                  
                  <!-- <div class="tab-pane" id="timeline"> -->

                  <!-- </div>/.tab-pane -->
                  

                  <!-- <div class="tab-pane" id="settings"> -->
                    

                  </div><!-- /.tab-pane -->
                </div> <!-- /.tab-content -->
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
