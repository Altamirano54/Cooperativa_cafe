<?php
require_once __DIR__ . '/../Modelo/Producto.php';

class ProductoControlador {
    public static function registrar($nombre, $stock, $precio) {
        return Producto::insertar($nombre, $stock, $precio);
    }

    public static function listar() {
        return Producto::listarActivos();
    }
}
?>
