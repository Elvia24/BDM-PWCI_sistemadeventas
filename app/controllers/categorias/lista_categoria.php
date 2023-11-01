<?php 





//$email_sesion= $_SESSION['sesion_email'];
$sql_categoria = "SELECT c.ID_categoria, c.nombre_cate, c.descripcion_cate, c.id_usuario, u.nombreUsuario
FROM categoria c
INNER JOIN usuario u ON c.id_usuario = u.ID_usuario WHERE c.status_categoria=1;";

$query_categoria = $pdo->prepare($sql_categoria);
$query_categoria->execute();

$categoria_tabla = $query_categoria->fetchAll(PDO::FETCH_ASSOC);
?>