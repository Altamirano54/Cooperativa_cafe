<!-- registrar_salida.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Salida de Café</title>
</head>
<body>
    <h2>Registrar Salida</h2>
    <form action="registrar_salida.php" method="post">
        <label>Producto:</label>
        <select name="producto">
            <option value="FTO">FTO</option>
            <option value="FT">FT</option>
            <option value="C">C</option>
        </select><br>

        <label>Cantidad de salida:</label>
        <input type="number" name="cantidad_salida" step="0.01" required><br>

        <label>Destino:</label>
        <input type="text" name="destino" value="Planta de Procesamiento"><br>

        <label>Observaciones:</label>
        <textarea name="observaciones" rows="3"></textarea><br>

        <input type="submit" value="Registrar Salida">
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h3>Salida registrada correctamente (simulado)</h3>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?>
</body>
</html>