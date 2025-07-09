<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Cooperativa de Café</title>
    <link rel="stylesheet" href="../Estilos/dashboard.css">
    
</head>
<body>
    <div class="header">
        <h1>COOPERATIVA CAFETALERA BAGUA GRANDE</h1>
        <p>Bienvenido, <?php echo $_SESSION['usuario']; ?> (<?php echo $_SESSION['rol']; ?>)</p>
    </div>
    
    <div class="menu">
        <h2>Menú Principal</h2>
        <div class="menu-item">
            <a href="Compras/Registrar_Compras.php" class="btn">Registro de Compras</a>

        </div>
        <div class="menu-item">
            <a href="Salidas/Registrar_Salidas.php" class="btn">Registrar salida </a>
        </div>
        <div class="menu-item">
            <a href="Compras/Listar_Compras.php" class="btn">Lista de Compras</a>
        </div>
        <div class="menu-item">
            <a href="Salidas/Listar_Salidas.php" class="btn">Lista de Salidas</a>
        </div>
        <div class="menu-item">
            <a href="producto/registro_producto.php" class="btn btn-danger">Registrar Produtos</a>
        </div>
        <div class="menu-item">
            <a href="producto/listar_productos.php" class="btn btn-danger">Listar Productos</a>
        </div>
        <div class="menu-item">
            <a href="Socios/registrar_Socios.php" class="btn btn-danger">Registrar Socio</a>
        </div>
        <div class="menu-item">
            <a href="Socios/Listar_Socios.php" class="btn btn-danger">Listar Socios</a>
        </div>
        <div class="menu-item">
            <a href="Usuario/registrar.php" class="btn btn-danger">Registrar Usuario</a>
        </div>
        <div class="menu-item">
            <a href="Usuario/listar.php" class="btn btn-danger">Listar Usarios</a>
        </div>
        <div class="menu-item">
            <a href="../logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
