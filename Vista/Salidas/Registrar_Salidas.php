<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

require_once '../../Controlador/SalidaContolador.php';
require_once '../../Modelo/Producto.php';

$mensaje = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'id_usuario'      => $_SESSION['id'],
        'id_producto'     => $_POST['id_producto'],
        'cantidad_salida' => $_POST['cantidad_salida'],
        'destino'         => $_POST['destino'],
        'observaciones'   => $_POST['observaciones']
    ];

    if (SalidaControlador::registrar($datos)) {
        $mensaje = "Salida registrada correctamente.";
    } else {
        $error = "Error al registrar la salida.";
    }
}

$productos = Producto::listarActivos(); // Asegúrate de tener este método
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Salida de Café</title>
    <link rel="stylesheet" href="../../Estilos/regSalidas.css">
</head>
<body>

    <?php if ($mensaje): ?>
        <p style="color:green"><?= $mensaje ?></p>
    <?php elseif ($error): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <h2>Registrar Salida</h2>
        <label>Producto:</label>
        <select name="id_producto" required>
            <option value="">Seleccione</option>
            <?php foreach ($productos as $producto): ?>
                <option value="<?= $producto['id'] ?>"><?= $producto['nombre'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Cantidad de salida:</label>
        <input type="number" name="cantidad_salida" step="0.01" required><br>

        <label>Destino:</label>
        <input type="text" name="destino" value="Planta de Procesamiento"><br>

        <label>Observaciones:</label>
        <textarea name="observaciones" rows="3"></textarea><br>

        <input type="submit" value="Registrar Salida">
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
    </form>
</body>
</html>
