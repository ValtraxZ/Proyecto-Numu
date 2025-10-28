<?php
// Crear conexión
$conexion = new mysqli("localhost", "root", "", "gestioneventos");
$conexion->set_charset("utf8");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
