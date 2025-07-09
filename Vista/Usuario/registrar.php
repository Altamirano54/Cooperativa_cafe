<?php
require_once '../../Controlador/UsuarioControlador.php';
$tiposDocumento = UsuarioControlador::obtenerTiposDocumento();

$mensaje = '';
$error= '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $usuario = trim($_POST['usuario'] ?? '');
$password = $_POST['password'] ?? '';
$rol = $_POST['rol'] ?? '';
$id_tipoDocumento = $_POST['id_tipoDocumento'] ?? '';
$nro_documento = trim($_POST['nro_documento'] ?? '');

// Validación de espacios
if (preg_match('/\s/', $usuario)) {
    $error= "El nombre de usuario no debe contener espacios.";
} elseif (UsuarioControlador::existeUsuario($usuario)) {
    $error = "El nombre de usuario ya está en uso.";
} elseif (UsuarioControlador::documentoExiste($nro_documento)) {
    $error = "El número de documento ya está registrado.";
} elseif ($usuario && $password && $rol && $id_tipoDocumento && $nro_documento) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ok = UsuarioControlador::registrar($usuario, $hash, $rol, $id_tipoDocumento, $nro_documento);
    $mensaje = $ok ? "Usuario registrado exitosamente" : "Error al registrar.";
} else {
    $error= "Todos los campos son obligatorios.";
}

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <style>
        body{
    font-family: Arial, sans-serif;
    background:#f5f7fa;
    display:flex;
    align-items:center;
    justify-content:center;
    height:100vh;
}
        form { max-width: 500px; margin: auto;
             background: white; padding: 25px; 
             border-radius: 10px;
             box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select, button { width: 100%; padding: 10px;
             margin-bottom: 15px;
              border-radius: 5px;
              font-family: sans-serif; 
               border: 1px solid #ccc; }
        button {font-family: sans-serif;
             background-color: #28a745; color: white;
              border: none;
               cursor: pointer; }
        button:hover { background-color: #218838; }

        .error{text-align: center;
            color:rgb(255, 0, 0);
             margin-bottom: 15px; }

        .mensaje { text-align: center;
            color:rgb(47, 161, 49);
             margin-bottom: 15px; }
         .btn {
    background-color: #28a745;
    color: #fff;
    padding: 12px 0;
    border: none;
    border-radius:6px;
    font-size:14px;
    font-weight: 600;
    width: 100%;
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
</head>
<body>

    <form method="POST">
        <h2 style="text-align:center;">Registrar Usuario</h2>

       <?php if (!empty($mensaje)): ?>
    <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>


        <input type="text" name="usuario" value="<?= htmlspecialchars($usuario ?? '') ?>" pattern="^\S+$" placeholder="Usuario" required>


        <input type="password" name="password" placeholder="Contraseña" pattern="^\S+$" required>

        <select name="rol" required>
            <option value="">Seleccione Rol</option>
            <option value="almacenero">Almacenero</option>
            <option value="admin">Administrador</option>
        </select>

        <select name="id_tipoDocumento" required>
            <option value="">Seleccione Tipo de Documento</option>
            <?php foreach ($tiposDocumento as $tipo): ?>
                <option value="<?= htmlspecialchars($tipo['id']) ?>">
                    <?= htmlspecialchars($tipo['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>


        <input type="text" name="nro_documento" placeholder="N° Documento" required>

        <button type="submit">Registrar Usuario</button>
        <a href="../dashboard.php" class="btn btn-danger">Volver al Menú</a>
    </form>

</body>
</html>
