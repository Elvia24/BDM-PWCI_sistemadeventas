<?php
session_start(); // Inicia la sesión

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['indice'])) {
    $indice = intval($_GET['indice']);
    if (isset($_SESSION['datos'][$indice])) {
        // Elimina la fila correspondiente en la matriz en PHP
        unset($_SESSION['datos'][$indice]);
        // Reindexa el arreglo para evitar espacios vacíos
        $_SESSION['datos'] = array_values($_SESSION['datos']);
    }
}
