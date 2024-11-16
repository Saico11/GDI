<?php
    include "conexion.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id_producto = $_POST["id_producto"];
        $id_empleado = $_POST["id_empleado"];
        $id_subgrupo = $_POST["id_subgrupo"];
        $nombre = $_POST["nombre"];
        $unidad = $_POST["unidad"];
        $stock = $_POST["stock"];
        $fecha_vencimiento = $_POST["fecha_vencimiento"];
        $fecha_produccion = $_POST["fecha_produccion"];
        $fecha_administracion = $_POST["fecha_administracion"];

        list($anio_vencimiento, $mes_vencimiento, $dia_vencimiento) = explode('-', $fecha_vencimiento);
        list($anio_produccion, $mes_produccion, $dia_produccion) = explode('-', $fecha_produccion);
        list($anio_administracion, $mes_administracion, $dia_administracion) = explode('-', $fecha_administracion);

        $sql = "CALL InsertarProducto('$id_producto', '$id_empleado', '$id_subgrupo', '$nombre', '$unidad', '$stock', '$anio_vencimiento', '$mes_vencimiento', '$dia_vencimiento', '$anio_produccion', '$mes_produccion', '$dia_produccion', '$anio_administracion', '$mes_administracion', '$dia_administracion');";


        if ($conexion->query($sql) === TRUE) {
            echo "Producto ingresado";
        }
        else {
            echo "Error al ingresar producto" . $conexion->error;
        }
    }
    $conexion->close()
?>