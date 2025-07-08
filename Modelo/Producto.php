<?php
require_once __DIR__ . '/../Config/conexion.php';

class Producto {
    private $id;
    private $nombre;
    private $stock;
    private $precio;
    private $estado;

    public function __construct($id = null, $nombre = '', $stock = 0, $precio = 0, $estado = 'activo') {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->estado = $estado;
    }

    public static function listarActivos() {
        $conexion = Conexion::getConexion();
        $sql = "SELECT * FROM producto WHERE estado = 'activo'";
        $result = $conexion->query($sql);
        $productos = [];

        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }

        return $productos;
    }

    public static function actualizarStock($id_producto, $cantidad, $operacion = 'sumar') {
        $conexion = Conexion::getConexion();

        if ($operacion === 'sumar') {
            $sql = "UPDATE producto SET stock = stock + ? WHERE id = ?";
        } elseif ($operacion === 'restar') {
            $sql = "UPDATE producto SET stock = stock - ? WHERE id = ?";
        } else {
            return false;
        }

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("di", $cantidad, $id_producto);

        return $stmt->execute();
    }

    // Getters y setters si los necesitas después
}
