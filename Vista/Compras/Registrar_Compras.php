<?php


session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}
require_once '../../Controlador/CompraControlador.php';
require_once '../../Modelo/Producto.php';
require_once '../../Modelo/Socio.php';

$mensaje = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'id_usuario'   => $_SESSION['id'], // Asegúrate de guardar 'id' al iniciar sesión
        'id_producto'  => $_POST['id_producto'],
        'unidad'       => $_POST['unidad'],
        'id_socio'     => $_POST['id_socio'],
        'rendimiento'  => $_POST['rendimiento'],
        'humedad'      => $_POST['humedad'],
        'guia_ingreso' => $_POST['guia_ingreso'],
        'cantidad'     => $_POST['cantidad'],
        'precio'       => $_POST['precio']
    ];

    if (CompraControlador::registrarCompra($datos)) {
        $mensaje = "Compra registrada correctamente.";
    } else {
        $error = "Error al registrar compra.";
    }
}

$productos = Producto::listarActivos();
$socios = Socio::listarActivos();
$totales = CompraControlador::obtenerTotales();
?>

<!-- HTML reducido -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Estilos/regCompras.css">
 </head>
 <body>
        <form method="POST">
        <label>Producto:</label>
        <select name="id_producto" required>
            <option value="">Seleccione</option>
            <?php foreach ($productos as $prod): ?>
                <option value="<?= $prod['id'] ?>"><?= $prod['nombre'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Socio:</label>
        <select name="id_socio" required>
            <option value="">Seleccione</option>
            <?php foreach ($socios as $socio): ?>
                <option value="<?= $socio['id'] ?>"><?= $socio['nombre'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label>COBASE:</label>
        <input type="text" id="cobase" name="cobase" readonly><br>


        <label>Unidad:</label>
        <input type="text" name="unidad" value="Quintales"><br>

        <label>Rendimiento:</label>
        <input type="number" name="rendimiento" min="80" max="95" step="0.01" required><br>

        <label>Humedad:</label>
        <input type="number" name="humedad" min="12" max="15" step="0.01" required><br>

        <label>Guía de ingreso:</label>
        <input type="text" name="guia_ingreso"><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" min="0" step="0.01" required><br>

        <label>Precio:</label>
        <input type="number" name="precio" min="0" step="0.01" required><br>

        <button type="submit">Registrar</button>
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
        
    </form>
    <script src="../../Helpers/registrar_Compras.js"></script>

 </body>
 </html>
