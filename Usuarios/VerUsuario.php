<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php'); //<!-- ESTE SUJETO CONTIENE  -LA BARRA SUPERIOR -LA BARRA IZQUIERDA AZUL -->
include('../app/controllers/usuarios/ver_usuario.php');
?> 

<title>VerUsuario</title>


  <!-- El contenido de la página -->
  <div class=" content-wrapper "style="background-color: var(--gris-bisonte);">
    <!-- Encabezado de contenido  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Usuario:</h1>
          </div><!-- col-sm-6 -->
        </div><!-- row mb-2-->
      </div><!-- container-fluid -->
    </div>
    <!-- Encabezado de contenido -->

    <!-- Contenedor tabla -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card2a card-outline barrasuperior">
              <div class="card-body box-profile ">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo $URL. "../app/controllers/usuarios/imageUsuarios/" .$Imagen_verusuario;?>" alt="Foto de Usuario"  style="width: 100px; height: 100px;">
                </div>

                <h3 class="profile-username text-center">User: <?php echo $nombreUsuario_verusuario;?></h3>

                <p class="text-muted text-center">Rol: <?php echo $nombre_rol_verusuario;?></p>
                <!-- Datos Usuario -->


                <?php
if ($nombre_rol_verusuario !== 'Privado') {
    // Muestra los datos del usuario solo si el rol no es "Privado"
    echo '<ul class="list-group list-group-unbordered mb-2">
            <li class="list-group-item mx-auto">
                <b>Correo Electrónico:</b> <a>' . $correo_verusuario . '</a>
            </li>
            <li class="list-group-item mx-auto">
                <b>Nombre:</b> <a>' . $Nombres_verusuario . '</a>
            </li>
            <li class="list-group-item mx-auto">
                <b>Fecha de Nacimiento:</b> ' . $fechaNacimiento_verusuario . '</a>
            </li>
            <li class="list-group-item mx-auto">
                <b>Sexo:</b> <a>' . $Sexo_verusuario . '</a>
            </li>
          </ul>';
}
?>



                <!-- <ul class="list-group list-group-unbordered mb-2">
                  <li class="list-group-item mx-auto ">
                    <b>Correo Electronico:</b> <a > <?php echo $correo_verusuario;?></a>
                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Nombre: </b> <a><?php echo $Nombres_verusuario;?></a>
                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Fecha de Nacimiento:</b> <a><?php echo $fechaNacimiento_verusuario;?></a>
                  </li>
                  <li class="list-group-item mx-auto">
                    <b>Sexo:</b> <a><?php echo $Sexo_verusuario;?></a>
                  </li>
                </ul> -->



                <!-- Datos Usuario -->

                  <!-- Boton --><!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>

<?php
if ($nombre_rol_verusuario === 'Publico') {
    // Si el rol del usuario es 'Publico', muestra la sección "ParaPublico"
    echo '
    <div class="col-md-9" id="ParaVendedor">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <h2 class="m-0">Lista de Deseos:</h2>
                </ul>
            </div>
    
            <div class="card-body">
                <div class="card-body" style="overflow-y: scroll; max-height: 850px;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre Lista</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>';
                            foreach ($lista_tabla as $dato_lista) {
                                $id_producto_deseado = $dato_lista['ID_lista']; 
                                $id_usuario = $dato_lista['id_usuario']; 
                                echo '
                                <tr>
                                    <td></td>
                                    <td>' . $dato_lista['nombre_lista'] . '</td>
                                    <td>' . $dato_lista['Publica_Privada'] . '</td>

    
                                    <td>
                                        <div class="btn-group">
                                        <a href="../Listas/ElementosDeMiLista.php?id=' . $id_producto_deseado . '&id_usuario=' . $dato_lista['id_usuario'] . '" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Detalles</a>
                                        </div>
                                    </td>
                                </tr>';
                            }
                        echo '</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>';
    

foreach ($productosVendedor_tabla as $productosVendedor_dato) {
    $id_producto = $productosVendedor_dato['ID_producto'];
    ?>

    <tr>
        <td >

            <div class="btn-group">
                    <a href="<?php echo $URL; ?>../Productos/VerProducto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Ver</a>
                
            </div>
        </td>

        <td><?php echo $productosVendedor_dato['NombreProducto']; ?></td>
        
        <td><?php echo $productosVendedor_dato['PrecioProducto']; ?></td>
       
        
        <td><?php echo $productosVendedor_dato['NombreCategoria']; ?></td>
        
        <td class="cotizar-<?php echo $productosVendedor_dato['venta_cotizar']; ?>">
            <?php
            if ($productosVendedor_dato['venta_cotizar'] == 1) {
                echo "Venta";
            } elseif ($productosVendedor_dato['venta_cotizar'] == 0) {
                echo "Cotizar";
            }
            ?>
        </td>
        <td>
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosVendedor_dato['imagenP_1']; ?>" width="100px" alt="imagen1">
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosVendedor_dato['imagenP_2']; ?>" width="100px" alt="imagen2">
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosVendedor_dato['imagenP_3']; ?>" width="100px" alt="imagen3">
        </td>

    </tr>

    <?php
}

echo '</tbody>
    </table>
    </div> <!-- card-body -->
    </div> <!-- card -->
    </div> <!-- col-md-9 -->';

} elseif ($nombre_rol_verusuario === 'Vendedor') {
    // Si el rol del usuario es 'Vendedor', muestra la sección "ParaVendedor"
    echo '<div class="col-md-9" id="ParaVendedor">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <h2 class="m-0">Lista de Productos Autorizados:</h2>
            </ul>
        </div>

        <div class="card-body">
            <div class="card-body" style="overflow-y: scroll; max-height: 850px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th></th>
                            <th>Producto</th>
                            
                            <th>Precio</th>
                           
                            
                            <th>Categoria </th>
                         
                            <th>Venta/Cotizacion </th>
                            <th>Imagenes </th>
                           
                        </tr>
                    </thead>
                    <tbody>';

foreach ($productosVendedor_tabla as $productosVendedor_dato) {
    $id_producto = $productosVendedor_dato['ID_producto'];
    ?>

    <tr>
        <td >

            <div class="btn-group">
                    <a href="<?php echo $URL; ?>../Productos/VerProducto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Ver</a>
                
            </div>
        </td>

        <td><?php echo $productosVendedor_dato['NombreProducto']; ?></td>
        
        <td><?php echo $productosVendedor_dato['PrecioProducto']; ?></td>
       
        
        <td><?php echo $productosVendedor_dato['NombreCategoria']; ?></td>
        
        <td class="cotizar-<?php echo $productosVendedor_dato['venta_cotizar']; ?>">
            <?php
            if ($productosVendedor_dato['venta_cotizar'] == 1) {
                echo "Venta";
            } elseif ($productosVendedor_dato['venta_cotizar'] == 0) {
                echo "Cotizar";
            }
            ?>
        </td>
        <td>
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosVendedor_dato['imagenP_1']; ?>" width="100px" alt="imagen1">
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosVendedor_dato['imagenP_2']; ?>" width="100px" alt="imagen2">
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosVendedor_dato['imagenP_3']; ?>" width="100px" alt="imagen3">
        </td>

    </tr>

    <?php
}

echo '</tbody>
    </table>
    </div> <!-- card-body -->
    </div> <!-- card -->
    </div> <!-- col-md-9 -->';



}elseif ($nombre_rol_verusuario === 'Administrador') {
    // Si el rol del usuario es 'Vendedor', muestra la sección "ParaVendedor"
    echo '<div class="col-md-9" id="ParaVendedor">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <h2 class="m-0">Productos Autorizados Por el Administrador:</h2>
            </ul>
        </div>

        <div class="card-body">
            <div class="card-body" style="overflow-y: scroll; max-height: 850px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th></th>
                            <th>Producto</th>
                            
                            <th>Precio</th>
                           
                            
                            <th>Categoria </th>
                         
                            <th>Venta/Cotizacion </th>
                            <th>Imagenes </th>
                            
                        </tr>
                    </thead>
                    <tbody>';

foreach ($productos_tabla as $productosAdministrador_dato) {
    $id_producto = $productosAdministrador_dato['ID_producto'];
    ?>

    <tr>
        <td >

            <div class="btn-group">
                    <a href="<?php echo $URL; ?>../Productos/VerProducto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i>Ver</a>
                
            </div>
        </td>

        <td><?php echo $productosAdministrador_dato['NombreProducto']; ?></td>
        
        <td><?php echo $productosAdministrador_dato['PrecioProducto']; ?></td>
       
        
        <td><?php echo $productosAdministrador_dato['NombreCategoria']; ?></td>
        
        <td class="cotizar-<?php echo $productosAdministrador_dato['venta_cotizar']; ?>">
            <?php
            if ($productosAdministrador_dato['venta_cotizar'] == 1) {
                echo "Venta";
            } elseif ($productosAdministrador_dato['venta_cotizar'] == 0) {
                echo "Cotizar";
            }
            ?>
        </td>
        <td>
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosAdministrador_dato['imagenP_1']; ?>" width="100px" alt="imagen1">
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosAdministrador_dato['imagenP_2']; ?>" width="100px" alt="imagen2">
            <img src="<?php echo $URL . "../app/controllers/productos/imageProductos/" . $productosAdministrador_dato['imagenP_3']; ?>" width="100px" alt="imagen3">
        </td>

    </tr>

    <?php
}

echo '</tbody>
    </table>
    </div> <!-- card-body -->
    </div> <!-- card -->
    </div> <!-- col-md-9 -->';
}
elseif ($nombre_rol_verusuario === 'Privado') { ?>
    
            <script> Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Perfil PRIVADO.',
            showConfirmButton: false,
            timer: 1500
            })</script>
    <?php 
}
?>



          <!-- /.col -->
            


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>

    
    <!-- Contenedor tabla -->
  </div>

  <!-- El contenido de la página -->


<?php include('../layout/parte2.php');?> <!-- ESTE SUJETO CONTIENE  -LA BARRA DERECHA cARRITO -->






