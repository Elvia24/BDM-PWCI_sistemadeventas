<?php 





//$email_sesion= $_SESSION['sesion_email'];
$sql_categoria = "SELECT * FROM vista_categorias";

$query_categoria = $pdo->prepare($sql_categoria);
$query_categoria->execute();

$categoria_tabla = $query_categoria->fetchAll(PDO::FETCH_ASSOC);
?>