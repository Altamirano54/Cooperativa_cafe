<?php
require_once __DIR__ . '/../../Controlador/UsuarioControlador.php';

$usuarios = UsuarioControlador::obtenerUsuarios();
?>

<style>
    body{
    font-family: Arial, sans-serif;
    background:#f4f6f8;
    padding:40px;
    display:flex;
    justify-content:center;
    color:#333;
}

/* Tabla */
table{
    border-collapse:collapse;
    width:90%;
    max-width:600px;
    background:#ffffff;
    box-shadow:0 3px 8px rgba(0,0,0,.1);
}

/* Encabezados */
th{
    background:#007acc;
    color:#fff;
    padding:12px 14px;
    text-align:left;
    font-weight:600;
}

/* Celdas */
td{
    padding:10px 14px;
    border-bottom:1px solid #e5e5e5;
}

/* Fila en hover */
tr:hover td{
    background:#f0f8ff;
}
</style>
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
