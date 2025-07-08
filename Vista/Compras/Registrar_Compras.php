<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

require_once '../../Controlador/CompraControlador.php';

$mensaje = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (CompraControlador::registrarCompra($_POST)) {
        $mensaje = "Registro guardado exitosamente.";
    } else {
        $error = "Error al registrar la compra.";
    }
}
$totales = CompraControlador::obtenerTotales();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Compras</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>
<div class="container">
    <h2>Registro de Compra de Café</h2>

    <?php if ($mensaje): ?><div class="success"><?= $mensaje ?></div><?php endif; ?>
    <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>

    <div class="totales">
        <p><strong>FTO:</strong> <?= $totales['FTO'] ?? 0 ?> qq</p>
        <p><strong>FT:</strong> <?= $totales['FT'] ?? 0 ?> qq</p>
        <p><strong>C:</strong> <?= $totales['C'] ?? 0 ?> qq</p>
    </div>

    <form method="POST">
        <label>Producto:</label>
        <select name="producto" required>
            <option value="">Seleccione</option>
            <option value="FTO">FTO</option>
            <option value="FT">FT</option>
            <option value="C">C</option>
        </select><br>

        <label>Stock:</label>
        <input type="number" name="stock" step="0.01" required><br>

        <label>Nombre de Socio:</label>
        <input type="text" name="nombre_socio" required><br>

        <label>COBASE:</label>
        <input type="text" name="cobase"><br>

        <label>Rendimiento (80-95):</label>
        <input type="number" name="rendimiento" min="80" max="95" step="0.01" required><br>

        <label>Humedad (12-15):</label>
        <input type="number" name="humedad" min="12" max="15" step="0.01" required><br>

        <label>Guía de Ingreso:</label>
        <input type="text" name="guia_ingreso"><br>

        <label>Estado de Socio:</label>
        <select name="estado_socio" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br>

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" step="0.01" required><br>

        <button type="submit">Registrar</button>
        <a href="listar_compras.php">Lista de Compras</a>
        <a href="../../dashboard.php">Dashboard</a>
    </form>
</div>
</body>
</html>
