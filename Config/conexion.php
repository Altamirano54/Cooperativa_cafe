<?php
class Conexion {
    private static $servidor = "localhost";
    private static $usuario = "root";
    private static $password = "";
    private static $base_datos = "cooperativa_cafe";
    private static $conexion = null;

    public static function getConexion() {
        if (self::$conexion === null) {
            self::$conexion = new mysqli(
                self::$servidor,
                self::$usuario,
                self::$password,
                self::$base_datos
            );

            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }

            self::$conexion->set_charset("utf8");
        }

        return self::$conexion;
    }
}
?>
