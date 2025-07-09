<?php
require_once __DIR__ . '/../Modelo/Socio.php';

class SocioControlador {

    public static function listarDocumentos() {
        $conexion = Conexion::getConexion();
        $sql = "SELECT nombre FROM tipodocumento WHERE id = '?'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   

    // Devuelve todos los socios activos
    public static function listarActivos() {
        return Socio::listarActivos();
    }

    
    public static function obtenerPorId($id) {
        return Socio::obtenerPorId($id);
    }

    public static function registrar($nombre, $tipoDoc, $nroDoc, $cobase, $estado) {
        $conexion = Conexion::getConexion();
        $stmt = $conexion->prepare("INSERT INTO socio (nombre, id_tipoDocumento, nro_documento, cobase, estado) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $nombre, $tipoDoc, $nroDoc, $cobase, $estado);
        return $stmt->execute();
    }

public static function obtenerTiposDocumento() {
    $conn = Conexion::getConexion(); // tu conexión mysqli
    $stmt = $conn->prepare("SELECT id, nombre FROM tipodocumento");
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_all(MYSQLI_ASSOC);
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
