<?php 




// $email_sesion= $_SESSION['sesion_email'];
$sql_productos = "SELECT * FROM vista_menorprecio";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_tabla = $query_productos->fetchAll(PDO::FETCH_ASSOC);





?>