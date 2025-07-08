<?php
require_once __DIR__ . '/../modelo/Compra.php';

class CompraControlador {
    public static function listar() {
        return Compra::obtenerTodas();
    }

    public static function registrarCompra($post) {
        $datos = [
            'producto' => $post['producto'],
            'año' => date('Y'),
            'stock' => $post['stock'],
            'nombre_socio' => $post['nombre_socio'],
            'cobase' => $post['cobase'],
            'rendimiento' => $post['rendimiento'],
            'humedad' => $post['humedad'],
            'guia_ingreso' => $post['guia_ingreso'],
            'estado_socio' => $post['estado_socio'],
            'precio' => $post['precio'],
            'cantidad' => $post['cantidad']
        ];

        return Compra::insertar($datos);
    }

    public static function obtenerTotales() {
        return Compra::obtenerTotalesPorProducto();
    }

    public static function obtenerCompras() {
        return Compra::listar();
    }

}
