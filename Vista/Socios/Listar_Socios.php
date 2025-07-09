<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../../index.php");
    exit();
}

require_once '../../Controlador/SocioControlador.php';
$socios = SocioControlador::listarActivos();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Socios - Cooperativa de Café</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 1200px; margin: auto; }
        .header { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .btn { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; margin: 5px; display: inline-block; }
        .btn:hover { background-color: #0056b3; }
        .btn-danger { background-color: #dc3545; }
        .btn-danger:hover { background-color: #c82333; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>LISTA DE SOCIOS ACTIVOS</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo Documento</th>
                <th>N° Documento</th>
                <th>COBASE</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($socios as $s): ?>
                <tr>
                    <td><?= $s['id'] ?></td>
                    <td><?= $s['nombre'] ?></td>
                    <td><?= $s['tipo_documento'] ?? '' ?></td>
                    <td><?= $s['nro_documento'] ?></td>
                    <td><?= $s['cobase'] ?></td>
                    <td><?= ucfirst($s['estado']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="registrar_Socios.php" class="btn">Nuevo Socio</a>
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
    </div>
</div>
</body>
</html>
