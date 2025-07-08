<?php
require_once __DIR__ . '/../Modelo/Socio.php';

class SocioControlador {
    
    // Devuelve todos los socios activos
    public static function listarActivos() {
        return Socio::listarActivos();
    }

    
    public static function obtenerPorId($id) {
        return Socio::obtenerPorId($id);
    }

   
    
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    require_once __DIR__ . '/../Modelo/Socio.php';

    $id = intval($_GET['id']);
    $socio = Socio::obtenerPorId($id);

    header('Content-Type: application/json');
    echo json_encode(['cobase' => $socio['cobase'] ?? '']);
    exit;
}


?>
