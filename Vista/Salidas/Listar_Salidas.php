<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}
require_once __DIR__ . '/../../Controlador/SalidaContolador.php';
$salidas = SalidaControlador::listar();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de Salidas - Cooperativa de Café</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        .container { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border-bottom: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #eee; }
        .btn { margin-top: 20px; display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Listado de Salidas Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Año</th>
                    <th>Socio</th>
                    <th>Cantidad</th>
                    <th>Destino</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salidas as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($row['fecha_salida'])) ?></td>
                        <td><?= $row['producto'] ?? '' ?></td>
                        <td><?= $row['año'] ?? '' ?></td>
                        <td><?= $row['nombre_socio'] ?? '' ?></td>
                        <td><?= $row['cantidad_salida'] ?> qq</td>
                        <td><?= $row['destino'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
    </div>
</body>
</html>
