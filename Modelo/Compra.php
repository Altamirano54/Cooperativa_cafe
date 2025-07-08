<?php
require_once __DIR__ . '/../Config/conexion.php';

class Compra {
    public static function insertar($datos) {
        $conexion = Conexion::getConexion();

        $sql = "INSERT INTO compra (id_usuario, id_producto, unidad, id_socio, rendimiento, humedad, guia_ingreso, cantidad, precio)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param(
            'iisiiddsd',
            $datos['id_usuario'],
            $datos['id_producto'],
            $datos['unidad'],
            $datos['id_socio'],
            $datos['rendimiento'],
            $datos['humedad'],
            $datos['guia_ingreso'],
            $datos['cantidad'],
            $datos['precio']
        );
        return $stmt->execute();
    }

    public static function obtenerTotalesPorProducto() {
        $conexion = Conexion::getConexion();

        $sql = "SELECT p.nombre AS producto, SUM(c.cantidad) AS total 
                FROM compra c
                JOIN producto p ON c.id_producto = p.id
                GROUP BY p.nombre";
        $result = $conexion->query($sql);

        $totales = [];
        while ($row = $result->fetch_assoc()) {
            $totales[$row['producto']] = $row['total'];
        }
        return $totales;
    }
    public static function obtenerTodas() {
        $conexion = Conexion::getConexion();
        $sql = "SELECT 
                    c.id, 
                    p.nombre AS producto,
                    YEAR(c.fecha_registro) AS año,
                    s.nombre AS nombre_socio,
                    s.estado AS estado_socio,
                    c.rendimiento, 
                    c.humedad, 
                    c.precio, 
                    c.cantidad, 
                    c.fecha_registro
                FROM compra c
                INNER JOIN producto p ON c.id_producto = p.id
                INNER JOIN socio s ON c.id_socio = s.id
                ORDER BY c.fecha_registro DESC";

        $result = $conexion->query($sql);
        $compras = [];

        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }

        return $compras;
    }

}
