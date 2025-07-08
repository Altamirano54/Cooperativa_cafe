<?php
require_once __DIR__ . '/../Config/conexion.php';

class Salida {
    public static function insertar($datos) {
        $conexion = Conexion::getConexion();
        $sql = "INSERT INTO salida (id_usuario, id_producto, cantidad_salida, destino, observaciones)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param(
            "iidds",
            $datos['id_usuario'],
            $datos['id_producto'],
            $datos['cantidad_salida'],
            $datos['destino'],
            $datos['observaciones']
        );
        return $stmt->execute();
    }

    public static function listar() {
        $conexion = Conexion::getConexion();
        $query = "SELECT s.*, p.nombre AS producto FROM salida s 
                  JOIN producto p ON s.id_producto = p.id
                  ORDER BY s.fecha_salida DESC";
        $result = $conexion->query($query);

        $salidas = [];
        while ($row = $result->fetch_assoc()) {
            $salidas[] = $row;
        }
        return $salidas;
    }
}
