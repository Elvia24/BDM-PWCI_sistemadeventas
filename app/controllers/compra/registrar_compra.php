<?php

include('../app/config.php');

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

                //*INSERTAR DATOS EN LA TABLA CARRITO *// 
                // $sql = "INSERT INTO carrito (id_usuario, totalDEcarrito, TotalProductos) VALUES (:id_usuarioSesion, :totalCantidad, :totalSubTotal)";
    
                // // Prepara la consulta
                // $stmt = $pdo->prepare($sql);
                
                // if ($stmt) {
                //     // Vincula los parámetros                    
                //     $stmt->bindParam(':id_usuarioSesion', $id_usuarioSesion);
                //     $stmt->bindParam(':totalCantidad', $totalCantidad);
                //     $stmt->bindParam(':totalSubTotal', $totalSubTotal);

                    
                //     // Ejecuta la consulta
                //     $stmt->execute();
                // } else {
                //     echo 'Error en la preparación de la consulta: ' . $pdo->errorInfo();
                // }
                
                //*INSERTAR DATOS EN LA TABLA CARRITO *// 


// Consulta SQL para obtener el último ID de la tabla 'carrito'
$sql = "SELECT MAX(ID_carrito) as ultimoId FROM carrito";

$resultado = $pdo->prepare($sql);
$resultado->execute();
$ultimoID = $resultado->fetchColumn();

//echo 'El último ID de carrito es: ' . $ultimoID;


                //*INSERTAR EN EL DETALLE CARRITO *// 
                // foreach($datosTabla as $producto){
                //     $idProducto = $producto['idProducto'];
                //     $cantidad = $producto['cantidad'];
                //     $subTotal = $producto['subTotal'];
                //     $sql = "INSERT INTO detalle_carrito (id_carrito, id_producto, cantidad, subTotal) VALUES (:ultimoId, :idProducto, :cantidad, :subTotal)";
                                        
                //     // Prepara la consulta
                //     $stmt = $pdo->prepare($sql);
                    
                //     if ($stmt) {
                //         // Vincula los parámetros                    
                //         $stmt->bindParam(':ultimoId', $ultimoID, PDO::PARAM_INT);
                //         $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
                //         $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
                //         $stmt->bindParam(':subTotal', $subTotal, PDO::PARAM_INT);
                        
                //         // Ejecuta la consulta
                //         $stmt->execute();
                //     } else {
                //         echo 'Error en la preparación de la consulta: ' . implode(', ', $stmt->errorInfo());
                //     }
                // }

                //*INSERTAR EN EL DETALLE CARRITO *// 


                //*INSERTAR DATOS EN LA TABLA COMPRA *// 
                    // $sql = "INSERT INTO compra (id_carrito, id_usuario, Total, cantidad) VALUES (:ultimoId, :id_usuarioSesion, :totalSubTotal, :totalCantidad)";
        
                    // // Prepara la consulta
                    // $stmt = $pdo->prepare($sql);
                    
                    // if ($stmt) {
                    //     // Vincula los parámetros                    
                    //     $stmt->bindParam(':ultimoId', $ultimoID, PDO::PARAM_INT);
                    //     $stmt->bindParam(':id_usuarioSesion', $id_usuarioSesion, PDO::PARAM_INT);
                    //     $stmt->bindParam(':totalSubTotal', $totalSubTotal); 
                    //     $stmt->bindParam(':totalCantidad', $totalCantidad, PDO::PARAM_INT);
                    
    
                        
                    //     // Ejecuta la consulta
                    //     $stmt->execute();
                    // } else {
                    //     echo 'Error en la preparación de la consulta: ' . $pdo->errorInfo();
                    // }
                
                //*INSERTAR DATOS EN LA TABLA COMPRA *// 

            }





?>


