[⚠️ Suspicious Content] <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Socio</title>
</head>
<body>
    <h2>Registrar Nuevo Socio</h2>
    <form action="registrar_socio.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Tipo de Documento:</label>
        <select name="tipo_documento">
            <option value="1">DNI</option>
            <option value="2">RUC</option>
        </select><br>

        <label>Nro Documento:</label>
        <input type="text" name="nro_documento" required><br>

        <label>Cobase:</label>
        <input type="text" name="cobase"><br>

        <input type="submit" value="Registrar Socio">
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h3>Socio registrado correctamente (simulado)</h3>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?>
</body>
</html>