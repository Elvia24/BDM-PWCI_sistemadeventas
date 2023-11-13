<?php 


$id_lista_get=$_GET['id'];

// $email_sesion= $_SESSION['sesion_email'];
$sql_lista = "SELECT l.ID_lista, 
l.nombre_lista, l.descripcion, 
u.id_usuario, u.nombreUsuario, l.Publica_Privada
FROM lista l
INNER JOIN usuario u ON l.id_usuario = u.ID_usuario 
WHERE l.status_lista=1 AND l.ID_lista=$id_lista_get;";


$query_listas = $pdo->prepare($sql_lista);
$query_listas->execute();

$listas_datos = $query_listas->fetchAll(PDO::FETCH_ASSOC);


foreach($listas_datos AS $lista_dato){
    
    $nombre_lista = $lista_dato['nombre_lista'];
    $descripcion = $lista_dato['descripcion'];
    $Publica_Privada = $lista_dato['Publica_Privada'];
}


?>