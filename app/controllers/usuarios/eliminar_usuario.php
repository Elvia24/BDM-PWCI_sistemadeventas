
<?php
include('../../config.php');


    $id_usuario = $_POST['id_usuario'];

// Llamar al procedimiento almacenado para eliminar el usuario
$query = $pdo->prepare("UPDATE usuario SET status_usuario=0 WHERE ID_usuario= :id_usuario;");
    $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);


    $query->execute();
    session_start();
    $_SESSION['mensaje']="Se elimino el usuario correctamente";
    $_SESSION['icono']="success";
    
    header('Location:'.$URL.'/Usuarios/Usuarios.php');
//     BEGIN
//     DECLARE categoria_count INT;
    
//     -- Verificar si existen registros en la tabla de categorías para el usuario
//     SELECT COUNT(*) INTO categoria_count FROM categoria WHERE id_usuario = ID_usuario;
  
//     -- Si existen registros de categorías, mostrar un mensaje y no eliminar al usuario
//     IF categoria_count > 0 THEN
//       SELECT 'No es posible eliminar el usuario. Existen registros de categorías relacionados.';
//     ELSE
//       -- Si no existen registros de categorías, eliminar al usuario
//       DELETE FROM usuario WHERE id = ID_usuario;
//       SELECT 'Usuario eliminado correctamente.';
//     END IF;
//   END

?>