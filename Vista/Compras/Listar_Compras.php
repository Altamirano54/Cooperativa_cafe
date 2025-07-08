<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

require_once '../../Controlador/CompraControlador.php';

$compras = CompraControlador::obtenerCompras();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Compras - Cooperativa de Café</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 1200px; margin: auto; }
        .header { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .btn { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; margin: 5px; display: inline-block; }
        .btn:hover { background-color: #0056b3; }
        .btn-danger { background-color: #dc3545; }
        .btn-danger:hover { background-color: #c82333; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>LISTA DE COMPRAS REGISTRADAS</h2>
    </div>

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
            <?php foreach ($compras as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['producto'] ?></td>
                    <td><?= $row['año'] ?></td>
                    <td><?= $row['nombre_socio'] ?></td>
                    <td><?= $row['rendimiento'] ?>%</td>
                    <td><?= $row['humedad'] ?>%</td>
                    <td><?= $row['estado_socio'] ?></td>
                    <td><?= number_format($row['precio'], 2) ?></td>
                    <td><?= $row['cantidad'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($row['fecha_registro'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="Registrar_Compras.php" class="btn">Nuevo Registro</a>
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
    </div>
</div>
</body>
</html>
