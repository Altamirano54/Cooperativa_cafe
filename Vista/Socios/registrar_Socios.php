<?php
require_once __DIR__ . '/../../Controlador/SocioControlador.php';
$tiposDocumento = SocioControlador::obtenerTiposDocumento();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $tipoDoc = $_POST['tipo_documento'];
    $nroDoc = $_POST['nro_documento'];
    $cobase = $_POST['cobase'];
    $estado = $_POST['estado'];
    $ok = SocioControlador::registrar($nombre, $tipoDoc, $nroDoc, $cobase, $estado);
    $mensaje = $ok ? "Socio registrado correctamente" : "Error al registrar socio";
}
?>
<style>
    body{
    font-family: Arial, sans-serif;background:#f5f7fa;display:flex;align-items:center;justify-content:center;height:100vh;
}
form{
    background:#ffffff;padding:24px 28px;border:1px solid #e0e0e0;border-radius:8px;
    box-shadow:0 4px 10px rgba(0,0,0,.07);display:flex;flex-direction:column;gap:12px; width:260px;
}
input,select{
    padding:10px 12px;border:1px solid #ccd1d9;border-radius:6px;font-size:14px;
}
button{
    background:#0870e4;color:#fff;border:none;padding:12px;
    border-radius:6px;font-weight:600;cursor:pointer;transition:background .2s;
}
button:hover{ background:#065bb8; }
p{ margin-top:16px; text-align:center; font-weight:600; }
.btn {
    background-color: #28a745;color: #fff;padding: 12px 0;border: none;border-radius:6px;
    font-size:14px;font-weight: 600; width: 100%;display: block;margin-top: 15px;
    text-align: center;text-decoration: none;box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);transition:background .2s;
}
.btn-danger {
    background-color: #e25f5d;color: #fff;box-shadow: 0 4px 12px rgba(155, 49, 49, 0.5);
}
.btn-danger:hover {
    background-color: #d53a3a;
}
</style>
<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
<select name="tipo_documento" required>
    <option value="">Seleccione Tipo de Documento</option>
    <?php foreach ($tiposDocumento as $tipo): ?>
        <option value="<?= htmlspecialchars($tipo['id']) ?>">
            <?= htmlspecialchars($tipo['nombre']) ?>
        </option>
    <?php endforeach; ?>
</select>
    <input type="text" name="nro_documento" placeholder="N° Documento" required>
    <input type="text" name="cobase" placeholder="COBASE">
    <select name="estado">
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select>
    <button type="submit">Registrar Socio</button>
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
</form>
<?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>