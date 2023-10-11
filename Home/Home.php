<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->

<title>Home</title>


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


<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->






