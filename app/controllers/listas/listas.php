<?php 

//$email_sesion= $_SESSION['sesion_email'];
$sql_lista = "SELECT l.ID_lista, 
l.nombre_lista, l.descripcion, 
u.id_usuario, u.nombreUsuario, l.Publica_Privada
FROM lista l
INNER JOIN usuario u ON l.id_usuario = u.ID_usuario 
WHERE l.status_lista=1 AND l.id_usuario=$ID_usuario_sesion;";

$query_lista = $pdo->prepare($sql_lista);
$query_lista->execute();

$lista_tabla = $query_lista->fetchAll(PDO::FETCH_ASSOC);
?>