<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "Inventario";
$port = 3306;

$conexion = new mysqli($host, $user, $password, $database, $port);

if ($conexion->connect_error){
    die("Error al conectarsse con la DB " . $conexion->connect_error);
}

?>