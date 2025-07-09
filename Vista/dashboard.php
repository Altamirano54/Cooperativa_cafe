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
        <div class="menu-grid">
            <div class="menu-item">
                <a href="Compras/Registrar_Compras.php" class="btn">
                    <svg class="btn-icon" viewBox="0 0 24 24">
                        <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1zM10 6a2 2 0 0 1 4 0v1h-4V6zm8 15a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h4v1a1 1 0 0 0 2 0V9h2v12z"/>
                    </svg>
                    Registro de Compras
                </a>
            </div>
            <div class="menu-item">
                <a href="Salidas/Registrar_Salidas.php" class="btn">
                    <svg class="btn-icon" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Registrar Salida
                </a>
            </div>
            <div class="menu-item">
                <a href="Compras/Listar_Compras.php" class="btn">
                    <svg class="btn-icon" viewBox="0 0 24 24">
                        <path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/>
                    </svg>
                    Lista de Compras
                </a>
            </div>
            <div class="menu-item">
                <a href="Salidas/Listar_Salidas.php" class="btn">
                    <svg class="btn-icon" viewBox="0 0 24 24">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/>
                    </svg>
                    Lista de Salidas
                </a>
            </div>
            <div class="menu-item">
                <a href="../logout.php" class="btn btn-danger">
                    <svg class="btn-icon" viewBox="0 0 24 24">
                        <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.59L17 17l5-5zM4 5h8V3H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8v-2H4V5z"/>
                    </svg>
                    Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
</body>
</html>