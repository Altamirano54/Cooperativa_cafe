<?php
require_once __DIR__ . '/../../Controlador/SocioControlador.php';

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

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="number" name="tipo_documento" placeholder="ID Tipo Documento" required>
    <input type="text" name="nro_documento" placeholder="N° Documento" required>
    <input type="text" name="cobase" placeholder="COBASE">
    <select name="estado">
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select>
    <button type="submit">Registrar Socio</button>
</form>

<?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>
