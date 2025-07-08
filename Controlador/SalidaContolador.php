<?php
require_once __DIR__ . '/../Modelo/Salida.php';

class SalidaControlador {

     public static function listar() {
        return Salida::obtenerTodasLasSalidas();
    }
    public static function manejarRegistroSalida() {
        $mensaje = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $compra_id = $_POST['compra_id'];
            $cantidad_salida = $_POST['cantidad_salida'];
            $destino = $_POST['destino'];
            $observaciones = $_POST['observaciones'];

            $compra = Salida::obtenerCompraPorId($compra_id);

            if ($compra && $cantidad_salida > 0 && $cantidad_salida <= $compra['cantidad']) {
                if (Salida::registrarSalida($compra_id, $cantidad_salida, $destino, $observaciones)) {
                    Salida::actualizarStockCompra($compra_id, $cantidad_salida);
                    $mensaje = "Salida registrada correctamente.";
                } else {
                    $error = "Error al registrar la salida.";
                }
            } else {
                $error = "Cantidad de salida inválida o insuficiente.";
            }
        }

        $compras = Salida::obtenerComprasDisponibles();
        $salidas = Salida::obtenerTodasLasSalidas();

        return compact('mensaje', 'error', 'compras', 'salidas');
    }
}
