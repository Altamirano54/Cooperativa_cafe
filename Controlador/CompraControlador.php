<?php
require_once __DIR__ . '/../modelo/Compra.php';

class CompraControlador {
    public static function listar() {
        return Compra::obtenerTodas();
    }
}
?>
