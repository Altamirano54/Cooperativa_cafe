<?php
session_start();
require_once __DIR__ . '/Controlador/UsuarioControlador.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $usuarioEncontrado = UsuarioControlador::login($usuario, $password);

    if ($usuarioEncontrado) {
        $_SESSION['usuario'] = $usuarioEncontrado['Usuario'];
        $_SESSION['rol'] = $usuarioEncontrado['rol'];
        header("Location: Vista/dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cooperativa de Café - Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h2>COOPERATIVA CAFETALERA<br>BAGUA GRANDE</h2>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Usuario:</label>
                <input type="text" name="usuario" required>
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Ingresar</button>
        </form>
    </div>
</body>
</html>
