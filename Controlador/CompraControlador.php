<?php
require_once __DIR__ . '/../modelo/Compra.php';

class CompraControlador {
 

    public static function registrarCompra($post) {
    $datos = [
        'id_usuario'   => $post['id_usuario'],
        'id_producto'  => $post['id_producto'],
        'unidad'       => $post['unidad'],
        'id_socio'     => $post['id_socio'],
        'rendimiento'  => $post['rendimiento'],
        'humedad'      => $post['humedad'],
        'guia_ingreso' => $post['guia_ingreso'],
        'cantidad'     => $post['cantidad'],
        'precio'       => $post['precio'],
      
    ];

    return Compra::insertar($datos);
}


    public static function obtenerTotales() {
        return Compra::obtenerTotalesPorProducto();
    }

    public static function obtenerCompras() {
        return Compra::obtenerTodas();
    }

        public static function registrar($nombre, $descripcion, $categoria, $precio) {
        return Producto::insertar($nombre, $descripcion, $categoria, $precio);
    }

    public static function listar() {
        return Producto::listarActivos();
    }


}
