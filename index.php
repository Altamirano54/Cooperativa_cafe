<?php
session_start();
require_once __DIR__ . '/Controlador/UsuarioControlador.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $usuarioEncontrado = UsuarioControlador::login($usuario, $password);

    if ($usuarioEncontrado) {
        $_SESSION['usuario'] = $usuarioEncontrado['usuario'];
        $_SESSION['rol'] = $usuarioEncontrado['rol'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "❌ Usuario o contraseña incorrectos";
    }
}
?>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
</form>

<?php if ($error): ?>
    <p><?= $error ?></p>
<?php endif; ?>
