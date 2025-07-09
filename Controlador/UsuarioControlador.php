<?php
// Controlador/UsuarioControlador.php
require_once __DIR__ . '/../Modelo/Usuario.php';


class UsuarioControlador {
    public static function login($usuario, $password) {
        return Usuario::autenticar($usuario, $password);
    }

    public static function registrar($usuario, $password, $rol, $id_tipoDocumento, $nro_documento) {
        return Usuario::insertar($usuario, $password, $rol, $id_tipoDocumento, $nro_documento);
    }


    public static function obtenerUsuarios() {
        return Usuario::listar();
    }
}
?>
