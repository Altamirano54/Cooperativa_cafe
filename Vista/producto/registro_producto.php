<?php
require_once '../../Controlador/ProductoContralador.php';

$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    if (ProductoControlador::registrar($nombre, $stock, $precio)) {
        $mensaje = "Producto registrado correctamente.";
    } else {
        $mensaje = "Error al registrar el producto.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <style>
        .form-container { max-width: 500px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .btn { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .mensaje { margin-bottom: 15px; color: green; font-weight: bold; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registrar Producto</h2>
        <?php if (!empty($mensaje)): ?>
            <p class="mensaje"><?= $mensaje ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label>Stock:</label>
                <input type="number" name="stock" step="0.01" required>
            </div>
            <div class="form-group">
                <label>Precio (S/):</label>
                <input type="number" name="precio" step="0.01" required>
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
</body>
</html>
