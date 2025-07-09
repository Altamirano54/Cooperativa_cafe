<?php
require_once '../../Controlador/UsuarioControlador.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validamos campos con operador de fusión nula (??)
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';
    $rol = $_POST['rol'] ?? '';
    $id_tipoDocumento = $_POST['id_tipoDocumento'] ?? '';
    $nro_documento = $_POST['nro_documento'] ?? '';

    // Validación básica
    if ($usuario && $password && $rol && $id_tipoDocumento && $nro_documento) {
        $ok = UsuarioControlador::registrar($usuario, $password, $rol, $id_tipoDocumento, $nro_documento);
        $mensaje = $ok ? "Usuario registrado exitosamente" : "Error al registrar";
    } else {
        $mensaje = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background-color: #f4f4f4; }
        form { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select, button { width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc; }
        button { background-color: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #218838; }
        .mensaje { text-align: center; margin-bottom: 15px; color: #333; }
    </style>
</head>
<body>

    <form method="POST">
        <h2 style="text-align:center;">Registrar Usuario</h2>

        <?php if (!empty($mensaje)): ?>
            <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>

        <select name="rol" required>
            <option value="">Seleccione Rol</option>
            <option value="almacenero">Almacenero</option>
            <option value="admin">Administrador</option>
        </select>

        <select name="id_tipoDocumento" required>
            <option value="">Tipo de Documento</option>
            <option value="1">DNI</option>
            <option value="2">Carnet de Extranjería</option>
            <!-- Puedes cargar dinámicamente desde base de datos si ya tienes esa tabla -->
        </select>

        <input type="text" name="nro_documento" placeholder="N° Documento" required>

        <button type="submit">Registrar Usuario</button>
    </form>

</body>
</html>
