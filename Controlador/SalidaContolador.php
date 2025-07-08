<?php
require_once __DIR__ . '/../Modelo/Salida.php';

class SalidaControlador {
    public static function registrar($datos) {
        return Salida::insertar($datos);
    }

    public static function listar() {
        return Salida::listar();
    }
}
