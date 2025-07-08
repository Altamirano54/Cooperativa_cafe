<?php
require_once __DIR__ . '/../Config/conexion.php';

class Salida {
    public static function obtenerComprasDisponibles() {
        global $conexion;
        $query = "SELECT id, producto, año, nombre_socio, cantidad FROM compras ORDER BY fecha_registro DESC";
        return mysqli_query($conexion, $query);
    }

    public static function obtenerCompraPorId($id) {
        global $conexion;
        $query = "SELECT cantidad FROM compras WHERE id = $id";
        return mysqli_fetch_assoc(mysqli_query($conexion, $query));
    }

    public static function registrarSalida($compra_id, $cantidad, $destino, $observaciones) {
        global $conexion;
        $query = "INSERT INTO salidas (compra_id, cantidad_salida, destino, observaciones)
                  VALUES ($compra_id, $cantidad, '$destino', '$observaciones')";
        return mysqli_query($conexion, $query);
    }

    public static function actualizarStockCompra($compra_id, $cantidad) {
        global $conexion;
        $query = "UPDATE compras SET cantidad = cantidad - $cantidad WHERE id = $compra_id";
        return mysqli_query($conexion, $query);
    }

    public static function obtenerTodasLasSalidas() {
        global $conexion;
        $query = "SELECT s.id, s.fecha_salida, s.cantidad_salida, s.destino, s.observaciones,
                         c.producto, c.año, c.nombre_socio
                  FROM salidas s
                  JOIN compras c ON s.compra_id = c.id
                  ORDER BY s.fecha_salida DESC";
        return mysqli_query($conexion, $query);
    }
}
