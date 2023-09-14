<?php

// Definición de constantes
define('SERVIDOR', 'localhost');
define('USUARIO', 'root'); // Reemplaza 'tu_usuario' con tu nombre de usuario de MySQL
define('PASSWORD', ''); // Reemplaza 'tu_contraseña' con tu contraseña de MySQL
define('BD', 'sistemadeventas');

// Cadena de conexión PDO
$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    // Mensaje de conexión exitosa
    echo "La conexión a la base de datos ha sido exitosa";
} catch (PDOException $e) {
    // Manejo de excepciones en caso de error
    //print_r($e); //programador
    echo "Error: " . $e;
}


?>
