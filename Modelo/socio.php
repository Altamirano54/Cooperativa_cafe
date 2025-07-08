<?php
require_once __DIR__ . '/../Config/conexion.php';

class Socio {
    private $id;
    private $nombre;
    private $id_tipoDocumento;
    private $nro_documento;
    private $cobase;
    private $estado;

    public function __construct($id = null, $nombre = '', $id_tipoDocumento = null, $nro_documento = '', $cobase = '', $estado = 'activo') {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->id_tipoDocumento = $id_tipoDocumento;
        $this->nro_documento = $nro_documento;
        $this->cobase = $cobase;
        $this->estado = $estado;
    }

    public static function listarActivos() {
        $conexion = Conexion::getConexion();
        $sql = "SELECT * FROM socio WHERE estado = 'activo'";
        $result = $conexion->query($sql);

        $socios = [];
        while ($row = $result->fetch_assoc()) {
            $socios[] = $row;
        }

        return $socios;
    }

    public static function buscarPorId($id) {
        $conexion = Conexion::getConexion();
        $stmt = $conexion->prepare("SELECT * FROM socio WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Getters y setters si los necesitas después
}
