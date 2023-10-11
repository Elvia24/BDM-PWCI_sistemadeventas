<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Ventas Bisontes </title>


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
<link rel="icon" href="../../icon/bisonte.ico" type="image/x-icon">

</head>
<body class="hold-transition login-page2">

<div class="login-box">
  <!-- /.login-logo -->
  
  <?php 
  session_start();
  //existe  o no la sesion abierta
if(isset($_SESSION["mensje"])){
    $respuesta = $_SESSION["mensje"];?>
    <script>
      Swal.fire({
  position: 'center',
  icon: 'error',
  title: '<?php  echo $respuesta;?>',
  showConfirmButton: false,
  timer: 1500
})
    </script>
    
    <?php 
}
  ?>

  <div class="card2a card-outline barrasuperior">
    <div class="card-header text-center">

    <img src="../public/images/Logo.png" alt="" width="110px" style="display: block; margin: 0 auto;" top="50px">
      <h1> Ventas Bisontes</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicia Sesion</p>
 
      <!-- este sujeto mandara los datos al controlador atraves del metodo post -->
      <form action="../app/controllers/login/login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email_iLogin" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_user_iLogin" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="input-group mb-3">
        <label for="miComboBox" class="content" style="padding: 0px 10px;">Rol: </label>
            <select id="miComboBox" name="opciones_iLogin" class="form-control">
                <option value="3">Privado</option>
                <option value="4">Publico</option>
                <option value="2">Vendedor</option>
                <option value="1">Administrador</option>
              
            </select>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn boton-IniciarSesion btn-block2a">Inicia Sesion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->

      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      <br />
      <p>
        <a href="<?php  include('../app/config.php');  echo $URL;?>../Registro/Registro.php" style="color: var(--azul-bisonte);">Registrarse</a>
      </p>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  -->
<script src="../dist/js/lte.min.js"></script>
</body>
</html>
