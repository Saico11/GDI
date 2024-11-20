<?php
include 'conexion.php';

// Insertar Producto
if (isset($_POST['insertar_producto'])) {
    $id_producto = $_POST['id_producto'];
    $id_empleado = $_POST['id_empleado'];
    $id_subgrupo = $_POST['id_subgrupo'];
    $nombre = $_POST['nombre'];
    $unidad = $_POST['unidad'];
    $stock = $_POST['stock'];
    $anio_vencimiento = $_POST['anio_vencimiento'];
    $mes_vencimiento = $_POST['mes_vencimiento'];
    $dia_vencimiento = $_POST['dia_vencimiento'];
    $anio_produccion = $_POST['anio_produccion'];
    $mes_produccion = $_POST['mes_produccion'];
    $dia_produccion = $_POST['dia_produccion'];
    $anio_administracion = $_POST['anio_administracion'];
    $mes_administracion = $_POST['mes_administracion'];
    $dia_administracion = $_POST['dia_administracion'];

    $query = "CALL InsertarProducto('$id_producto', '$id_empleado', '$id_subgrupo', '$nombre', '$unidad', '$stock', 
            '$anio_vencimiento', '$mes_vencimiento', '$dia_vencimiento', '$anio_produccion', '$mes_produccion', '$dia_produccion',
            '$anio_administracion', '$mes_administracion', '$dia_administracion')";
    if (mysqli_query($conexion, $query)) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al agregar producto: " . mysqli_error($conexion);
    }
}

// Actualizar Producto
if (isset($_POST['actualizar_producto'])) {
    $id_producto = $_POST['id_producto'];
    $id_empleado = $_POST['id_empleado'];
    $id_subgrupo = $_POST['id_subgrupo'];
    $nombre = $_POST['nombre'];
    $unidad = $_POST['unidad'];
    $stock = $_POST['stock'];
    $anio_vencimiento = $_POST['anio_vencimiento'];
    $mes_vencimiento = $_POST['mes_vencimiento'];
    $dia_vencimiento = $_POST['dia_vencimiento'];
    $anio_produccion = $_POST['anio_produccion'];
    $mes_produccion = $_POST['mes_produccion'];
    $dia_produccion = $_POST['dia_produccion'];
    $anio_administracion = $_POST['anio_administracion'];
    $mes_administracion = $_POST['mes_administracion'];
    $dia_administracion = $_POST['dia_administracion'];

    $query = "CALL ActualizarProducto('$id_producto', '$id_empleado', '$id_subgrupo', '$nombre', '$unidad', '$stock', 
            '$anio_vencimiento', '$mes_vencimiento', '$dia_vencimiento', '$anio_produccion', '$mes_produccion', '$dia_produccion',
            '$anio_administracion', '$mes_administracion', '$dia_administracion')";
    if (mysqli_query($conexion, $query)) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar producto: " . mysqli_error($conexion);
    }
}

// Eliminar Producto
if (isset($_POST['eliminar_producto'])) {
    $id_producto = $_POST['id_producto'];

    $query = "CALL EliminarProducto('$id_producto')";
    if (mysqli_query($conexion, $query)) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar producto: " . mysqli_error($conexion);
    }
}

// Consultar Producto por ID
$producto = null;
if (isset($_POST['consultar_producto'])) {
    $id_producto = $_POST['id_producto'];
    $query = "CALL ConsultarProductoPorId('$id_producto')";
    $result = mysqli_query($conexion, $query);
    if ($result) {
        $producto = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Administrar Productos</h1>

    <!-- Formulario de insertar producto -->
    <form method="POST">
        <h2>Agregar Producto</h2>
        <input type="text" name="id_producto" placeholder="ID Producto" required><br>
        <input type="text" name="id_empleado" placeholder="ID Empleado" required><br>
        <input type="text" name="id_subgrupo" placeholder="ID Subgrupo" required><br>
        <input type="text" name="nombre" placeholder="Nombre Producto" required><br>
        <input type="text" name="unidad" placeholder="Unidad" required><br>
        <input type="number" name="stock" placeholder="Stock" required><br>
        <input type="number" name="anio_vencimiento" placeholder="Año Vencimiento" required><br>
        <input type="number" name="mes_vencimiento" placeholder="Mes Vencimiento" required><br>
        <input type="number" name="dia_vencimiento" placeholder="Día Vencimiento" required><br>
        <input type="number" name="anio_produccion" placeholder="Año Producción" required><br>
        <input type="number" name="mes_produccion" placeholder="Mes Producción" required><br>
        <input type="number" name="dia_produccion" placeholder="Día Producción" required><br>
        <input type="number" name="anio_administracion" placeholder="Año Administración" required><br>
        <input type="number" name="mes_administracion" placeholder="Mes Administración" required><br>
        <input type="number" name="dia_administracion" placeholder="Día Administración" required><br>
        <input type="submit" name="insertar_producto" value="Insertar Producto">
    </form>

    <!-- Formulario de actualizar producto -->
    <form method="POST">
        <h2>Actualizar Producto</h2>
        <input type="text" name="id_producto" placeholder="ID Producto" required><br>
        <input type="text" name="id_empleado" placeholder="ID Empleado" required><br>
        <input type="text" name="id_subgrupo" placeholder="ID Subgrupo" required><br>
        <input type="text" name="nombre" placeholder="Nombre Producto" required><br>
        <input type="text" name="unidad" placeholder="Unidad" required><br>
        <input type="number" name="stock" placeholder="Stock" required><br>
        <input type="submit" name="actualizar_producto" value="Actualizar Producto">
    </form>

    <!-- Formulario de eliminar producto -->
    <form method="POST">
        <h2>Eliminar Producto</h2>
        <input type="text" name="id_producto" placeholder="ID Producto" required><br>
        <input type="submit" name="eliminar_producto" value="Eliminar Producto">
    </form>

    <!-- Formulario de consultar producto -->
    <form method="POST">
        <h2>Consultar Producto por ID</h2>
        <input type="text" name="id_producto" placeholder="ID Producto" required><br>
        <input type="submit" name="consultar_producto" value="Consultar Producto">
    </form>

    <?php if ($producto): ?>
        <h3>Datos del Producto</h3>
        <p>ID: <?= $producto['id_producto'] ?></p>
        <p>Nombre: <?= $producto['nombre'] ?></p>
        <p>Stock: <?= $producto['stock'] ?></p>
        <p>Unidad: <?= $producto['unidad'] ?></p>
    <?php endif; ?>
</body>
</html>
