<?php
require_once '../../Controlador/ProductoContralador.php';
$productos = ProductoControlador::listar();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; }
        .grid { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 250px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card h3 { margin: 10px 0 5px; color: #333; }
        .card p { margin: 5px 0; color: #555; }
        .price { font-size: 1.2em; font-weight: bold; color: #28a745; margin-top: 10px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Lista de Productos</h2>
    <div class="grid">
        <?php foreach ($productos as $producto): ?>
        <div class="card">
            <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
            <p>Stock: <?= htmlspecialchars($producto['stock']) ?> unidades</p>
            <p class="price">S/ <?= number_format($producto['precio'], 2) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
