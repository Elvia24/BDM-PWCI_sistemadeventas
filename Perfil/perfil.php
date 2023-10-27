<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php'); //<!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->
// include('../app/controllers/usuarios/ver_usuario.php');
?> 

<title>Perfil</title>


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
                  <img  class="profile-user-img img-fluid img-circle"
                       src="<?php echo $URL. "../app/controllers/usuarios/imageUsuarios/" .$ImagenDusuario_sesion;?>"
                       alt="Foto de Usuario"
                       style="width: 100px; height: 100px;">
                </div>

                <h3 class="profile-username text-center">User: <?php echo $nombresDusuario_sesion;?></h3>

                <p class="text-muted text-center">Rol: <?php echo $Rol_sesion;?></p>
                <!-- Datos Usuario -->
                <ul class="list-group list-group-unbordered mb-2">
                  <li class="list-group-item mx-auto " >
                    <b>Correo Electronico: </b> <a > <?php echo $correo_sesion;?></a>
                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Nombre: </b> <a ><?php echo $nombres_sesion;?></a>
                  </li>
                  <li class="list-group-item mx-auto">
                  <b>Fecha de Nacimiento:</b> <a><?php echo $fechaNacimiento_sesion; ?></a>

                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Sexo:</b> <a><a><?php echo $Sexo_sesion;?></a>
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
                  
                  <form action="../app/controllers/usuarios/editar_usuario.php"  class="form-horizontal "method="post"  enctype="multipart/form-data">
                  <input hidden type="text" name="id_editar_usuario" value="<?php echo $ID_usuario_sesion ?>">     
                  <div class="form-group row">
                        <label for="CorreoElectronico" class="col-sm-2 col-form-label">Correo Electronico</label>
                        <div class="col-sm-10">
                          <input required name="correo_editar_usuario" value="<?php echo $correo_sesion?>" type="email" class="form-control" id="CorreoElectronico" placeholder="Correo Electronico">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputNombredeUsuario" class="col-sm-2 col-form-label">Nombre de Usuario</label>
                        <div class="col-sm-10">
                          <input required name="nombreUsuario_editar_usuario" value="<?php echo $nombresDusuario_sesion?>" type="text" class="form-control" id="inputNombredeUsuario" placeholder="Nombre de Usuario">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputContraseña" class="col-sm-2 col-form-label">Constraseña</label>
                        <div class="col-sm-10">
                          <input required  name="contraseña_editar_usuario"  type="text" class="form-control" id="inputContraseña" placeholder="Constraseña">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label  for="inputNombreCompleto" class="col-sm-2 col-form-label">Nombre Completo</label>
                        <div class="col-sm-10">
                          <input required  name="Nombres_editar_usuario" value="<?php echo $nombres_sesion?>" type="text" class="form-control" id="inputNombreCompleto" placeholder="Nombre Completo">
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="avatar"  class="col-sm-2 col-form-label">Imagen de perfil</label>

                          <input required name="Imagen_editar_usuario" class="ocultaron" type="file" id="avatar" name="imagenSubida" accept="image/*">

                        <label for="avatar" class="content" > 
                          <div class="myLabel">
                            <img  name="Imagen_editar_usuario" class="myImg2" id="imagenSubida" src="<?php echo $URL. "../app/controllers/usuarios/imageUsuarios/" .$ImagenDusuario_sesion;?>" />
                            <div>
                                <span id="tituloArchivo">Agregar imagen</span><br />
                                <span id="nombreArchivo"></span>
                            </div>
                            </div>
                        </label>

                        <script>
                          document.addEventListener('DOMContentLoaded', function () {
                              const inputImagen = document.getElementById('avatar');
                              const imagenSubida = document.getElementById('imagenSubida');

                              inputImagen.addEventListener('change', function () {
                                  const file = inputImagen.files[0];
                                  if (file) {
                                      const url = URL.createObjectURL(file);
                                      imagenSubida.src = url;
                                  }
                              });
                          });
                      </script>

                      </div>
                      <div class="form-group row">
                        <label for="inputFechadeNacimiento" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-sm-10">
                          <input  name="fechaNacimiento_editar_usuario" value="<?php echo $fechaNacimiento_sesion?>" class="form-control" type="date" name="birthday" id="birthday"  min="1977-01-01" max="2022-12-31"><!--   required -->
                              <div id="myBirthday">
                              <br>
                              </div>
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="miComboBox" class="col-sm-2 col-form-label">Sexo: </label>
                          <div class="col-sm-10">
                              <select id="miComboBox" name="Sexo_editar_usuario" class="form-control">
                                  <option value="Mujer" <?php if ($Sexo_sesion == 'Mujer') echo 'selected'; ?>>Mujer</option>
                                  <option value="Hombre" <?php if ($Sexo_sesion == 'Hombre') echo 'selected'; ?>>Hombre</option>
                                  <option value="Indistinto" <?php if ($Sexo_sesion == 'Indistinto') echo 'selected'; ?>>Indistinto</option>
                              </select>
                          </div>
                      </div>

<!-- <div id="selectedValue"></div> Agregar esta línea -->

<!-- <script>
    var miComboBox = document.getElementById('miComboBox');
    var selectedValue = document.getElementById('selectedValue');

    miComboBox.addEventListener('change', function() {
        selectedValue.innerHTML = 'Seleccionado: ' + miComboBox.value;
    });
</script> -->


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
                        <button type="submit" class="btn btn-success">Guardar</button>
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

  <?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->
