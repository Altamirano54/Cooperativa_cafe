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

    public static function insertar($datos) {
        global $conexion;
        $sql = "INSERT INTO compras (producto, año, stock, nombre_socio, cobase, rendimiento, humedad, guia_ingreso, estado_socio, precio, cantidad)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param(
            'ssdssddssdd',
            $datos['producto'],
            $datos['año'],
            $datos['stock'],
            $datos['nombre_socio'],
            $datos['cobase'],
            $datos['rendimiento'],
            $datos['humedad'],
            $datos['guia_ingreso'],
            $datos['estado_socio'],
            $datos['precio'],
            $datos['cantidad']
        );
        return $stmt->execute();
    }

    public static function obtenerTotalesPorProducto() {
        global $conexion;
        $sql = "SELECT producto, SUM(cantidad) AS total FROM compras GROUP BY producto";
        $result = mysqli_query($conexion, $sql);
        $totales = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $totales[$row['producto']] = $row['total'];
        }
        return $totales;
    }

    public static function listar() {
    global $conexion;
    $sql = "SELECT * FROM compras ORDER BY fecha_registro DESC";
    $result = mysqli_query($conexion, $sql);
    $compras = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $compras[] = $row;
    }
    return $compras;
}

}
