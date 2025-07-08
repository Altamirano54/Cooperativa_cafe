<?php
require_once __DIR__ . '/../Config/conexion.php';

class Compra {
    public static function obtenerTodas() {
        $conexion = Conexion::getConexion();
        $sql = "SELECT * FROM compras ORDER BY fecha_registro DESC";
        $result = $conexion->query($sql);
        $compras = [];

        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }
        return $compras;
    }
}
?>
