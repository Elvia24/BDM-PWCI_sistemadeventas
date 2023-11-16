<?php 





//$email_sesion= $_SESSION['sesion_email'];
$sql_categoria = "SELECT * FROM vista_categorias";

$query_categoria = $pdo->prepare($sql_categoria);
$query_categoria->execute();

$categoria_tabla = $query_categoria->fetchAll(PDO::FETCH_ASSOC);

function calcularPrecioPromedioCategoria($idCategoria, $conn) {
    $stmt = $conn->prepare("SELECT calcularPrecioPromedioCategoria(?) AS AvgPrice");
    $stmt->bindParam(1, $idCategoria, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor(); // Cerrar el cursor para permitir la ejecución de otras consultas

    return $result['AvgPrice'];
}

?>