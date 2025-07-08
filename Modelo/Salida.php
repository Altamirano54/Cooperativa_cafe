<?php
require_once __DIR__ . '/../Config/conexion.php';

class Salida {

    public static function obtenerComprasDisponibles() {
        $conexion = Conexion::getConexion();
        $query = "SELECT id, producto, año, nombre_socio, cantidad FROM compras ORDER BY fecha_registro DESC";
        $result = $conexion->query($query);
        $compras = [];

        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }

        return $compras;
    }

    public static function obtenerCompraPorId($id) {
        $conexion = Conexion::getConexion();
        $query = "SELECT cantidad FROM compras WHERE id = $id";
        $result = $conexion->query($query);
        return $result->fetch_assoc();
    }

    public static function registrarSalida($compra_id, $cantidad, $destino, $observaciones) {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO salida (compra_id, cantidad_salida, destino, observaciones)
                  VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("idss", $compra_id, $cantidad, $destino, $observaciones);
        return $stmt->execute();
    }

    public static function actualizarStockCompra($compra_id, $cantidad) {
        $conexion = Conexion::getConexion();
        $query = "UPDATE compras SET cantidad = cantidad - ? WHERE id = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("di", $cantidad, $compra_id);
        return $stmt->execute();
    }

    public static function obtenerTodasLasSalidas() {
        $conexion = Conexion::getConexion();
        $query = "SELECT s.id, s.fecha_salida, s.cantidad_salida, s.destino, s.observaciones
                  FROM salida s
                  ORDER BY s.fecha_salida DESC";
        $result = $conexion->query($query);
        $salidas = [];

        while ($row = $result->fetch_assoc()) {
            $salidas[] = $row;
        }

        return $salidas;
    }
}
