<?php
$host = "localhost";
$user = "root";
$password = "080100";
$database = "Inventario";

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error){
    die("Error al conectarsse con la DB " . $conexion->connect_error);
}

?>