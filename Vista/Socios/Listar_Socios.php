<?php
require_once __DIR__ . '/../../Controlador/SocioControlador.php';

$socios = SocioControlador::listarActivos();
?>

<style>
    body{
    font-family: Arial, sans-serif;
    background:#121212;
    color:#e5e5e5;
    padding:40px;
    display:flex;
    justify-content:center;
}

table{
    border-collapse:collapse;
    width:90%;
    max-width:780px;
    background:#1e1e1e;
    box-shadow:0 4px 12px rgba(0,0,0,.4);
}

th,td{
    padding:10px 14px;
    text-align:left;
    border-bottom:1px solid #2c2c2c;
}

th{
    background:#272727;
    color:#f0f0f0;
    font-weight:600;
}

tr:hover{
    background:#2a2a2a;
}
</style>

<table border="1">
    <tr><th>ID</th><th>Nombre</th><th>N° Documento</th><th>COBASE</th><th>Estado</th></tr>
    <?php foreach ($socios as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= $s['nombre'] ?></td>
            <td><?= $s['nro_documento'] ?></td>
            <td><?= $s['cobase'] ?></td>
            <td><?= $s['estado'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

