<?php
require_once __DIR__ . '/../../Controlador/UsuarioControlador.php';
$usuarios = UsuarioControlador::obtenerUsuarios();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios - Cooperativa de Café</title>
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 1200px;
            margin: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            background-color: #28a745;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            margin: 10px auto;
            display: inline-block;
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
            transition: background 0.2s;
        }
        .btn-danger {
            background-color: #e25f5d;
            box-shadow: 0 4px 12px rgba(155, 49, 49, 0.5);
        }
        .btn-danger:hover {
            background-color: #d53a3a;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>LISTA DE USUARIOS REGISTRADOS</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['Usuario']) ?></td>
                    <td><?= ucfirst($u['rol']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
    </div>
</div>
</body>
</html>
