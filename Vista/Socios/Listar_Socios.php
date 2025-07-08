[⚠️ Suspicious Content] 
<!-- lista_socios.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Socios</title>
</head>
<body>
    <h2>Lista de Socios (Simulado)</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo Documento</th>
                <th>Nro Documento</th>
                <th>Cobase</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Juan Pérez</td>
                <td>DNI</td>
                <td>12345678</td>
                <td>Base Norte</td>
                <td>activo</td>
                <td><button onclick="alert('Inactivado (simulado)')">Inactivar</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>María López</td>
                <td>RUC</td>
                <td>20123456789</td>
                <td>Base Sur</td>
                <td>inactivo</td>
                <td><button onclick="alert('Activado (simulado)')">Activar</button></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

<!-- cambiar_estado.php -->
<?php
// Este archivo será simulado y usado con botones de la tabla
if (isset($_GET['id']) && isset($_GET['accion'])) {
    $id = $_GET['id'];
    $accion = $_GET['accion'];
    echo "<p>Socio con ID $id ha sido marcado como $accion (simulado)</p>";
} else {
    echo "<p>Datos incompletos</p>";
}
?>
