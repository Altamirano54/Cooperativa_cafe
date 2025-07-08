<?php
// Controlador/UsuarioControlador.php
require_once __DIR__ . '/../Modelo/Usuario.php';


class UsuarioControlador {
    public static function login($usuario, $password) {
        return Usuario::autenticar($usuario, $password);
    }
}
?>
