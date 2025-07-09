<?php
require_once __DIR__ . '/../../Controlador/SocioControlador.php';

$socios = SocioControlador::listarActivos();
?>

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
