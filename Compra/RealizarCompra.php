<?php



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recibe los datos enviados en el campo 'datosTabla'
        $datosTablaJSON = $_POST['datosTabla'];
        $totalCantidad = $_POST['totalCantidad'];
        $totalSubTotal = $_POST['totalSubTotal'];

        // Decodifica los datos JSON en un array de PHP
        $datosTabla = json_decode($datosTablaJSON, true);


        
        // Verifica si se han recibido datos
         if (!empty($datosTabla)) {
             echo '<table border="1">';
             echo '<tr>';
             echo '<th>Nombre del Producto</th>';
             echo '<th>ID del Producto</th>';
             echo '<th>Cantidad</th>';
             echo '<th>Subtotal</th>';
             echo '</tr>';
            
             foreach ($datosTabla as $fila) {
                 echo '<tr>';
                 echo '<td>' . $fila['nombreProducto'] . '</td>';
                 echo '<td>' . $fila['idProducto'] . '</td>';
                 echo '<td>' . $fila['cantidad'] . '</td>';
                 echo '<td>' . $fila['subTotal'] . '</td>';
                 echo '</tr>';
             }

             echo '</table>';

         echo '<table >
             <tr>
               <td></td>
               <td></td>
               <td></td>
               <td >Total:</td>
               <td >'.$totalCantidad.'</td>
               <td >'.$totalSubTotal.'</td>
             </tr>

             </table>';




         } else {
             echo 'No se han recibido datos.';
         }

        // Realizar la redirección
// header('Location: ../../../Compra/RealizarCompra.php');
    }
    ?>
    <!-- <a href="../../../Compra/RealizarCompra.php"></a> -->