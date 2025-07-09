<?php
require_once __DIR__ . '/../../Controlador/SocioControlador.php';

$socios = SocioControlador::listarActivos();
?>

<style>
 
    table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        font-family: 'Segoe UI', sans-serif;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    th {
        background: linear-gradient(to right, #1565c0, #1e88e5);
        color: white;
        padding: 8px 12px;
        height: 25px;
        font-size: 14px;
        text-align: left;
    }

    td {
        background-color: #f4f7fb;
        padding: 8px 12px;
        height: 25px;
        font-size: 13px;
        border-bottom: 1px solid #e0e0e0;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: #e3f2fd;
    }


            .btn {
    background-color: #28a745;
    color: #fff;
    padding: 12px 0;
    border: none;
    border-radius:6px;
    font-size:14px;
    font-weight: 600;
    width: 10%;
    max-width: 150px;
    display: block;
    margin-top: 15px;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
    transition:background .2s;
}
.btn-danger {
    background-color: #e25f5d;
    color: #fff;
    box-shadow: 0 4px 12px rgba(155, 49, 49, 0.5);
}
.btn-danger:hover {
    background-color: #d53a3a;
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
<a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
