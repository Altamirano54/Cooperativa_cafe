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

    public static function listar() {
        $conexion = Conexion::getConexion();

        $sql = "SELECT 
                    c.id,
                    c.fecha_registro,
                    p.nombre AS producto,
                    s.nombre AS socio,
                    u.Usuario AS usuario,
                    c.cantidad,
                    c.precio,
                    c.rendimiento,
                    c.humedad,
                    c.guia_ingreso,
                    c.unidad
                FROM compra c
                INNER JOIN producto p ON c.id_producto = p.id
                INNER JOIN socio s ON c.id_socio = s.id
                INNER JOIN usuarios u ON c.id_usuario = u.id
                ORDER BY c.fecha_registro DESC";

        $result = $conexion->query($sql);
        $compras = [];

        while ($row = $result->fetch_assoc()) {
            $compras[] = $row;
        }

        return $compras;
    }
}
