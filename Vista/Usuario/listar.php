<?php
require_once __DIR__ . '/../../Controlador/UsuarioControlador.php';

$usuarios = UsuarioControlador::obtenerUsuarios();
?>

<table border="1">
    <tr><th>ID</th><th>Usuario</th><th>Rol</th></tr>
    <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['Usuario'] ?></td>
            <td><?= $u['rol'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
