<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

require_once __DIR__ . '/../../controlador/compraControlador.php';

$compras = CompraControlador::listar();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Compras - Importadora de Café</title>
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>
    <div class="container">
        <h2>LISTA DE COMPRAS REGISTRADAS</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Año</th>
                    <th>Socio</th>
                    <th>Rendimiento</th>
                    <th>Humedad</th>
                    <th>Estado</th>
                    <th>Precio (S/)</th>
                    <th>Cantidad (qq)</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $compra): ?>
                <tr>
                    <td><?= $compra['id'] ?></td>
                    <td><?= $compra['producto'] ?></td>
                    <td><?= $compra['año'] ?></td>
                    <td><?= $compra['nombre_socio'] ?></td>
                    <td><?= $compra['rendimiento'] ?>%</td>
                    <td><?= $compra['humedad'] ?>%</td>
                    <td><?= $compra['estado_socio'] ?></td>
                    <td><?= number_format($compra['precio'], 2) ?></td>
                    <td><?= $compra['cantidad'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($compra['fecha_registro'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="crear.php" class="btn">Nuevo Registro</a>
            <a href="../../dashboard.php" class="btn btn-danger">Volver al Menú</a>
        </div>
    </div>
</body>
</html>
