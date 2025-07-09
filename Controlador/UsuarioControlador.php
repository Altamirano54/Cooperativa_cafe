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
    public static function obtenerTiposDocumento() {
    $conexion = Conexion::getConexion(); // conexión mysqli
    $stmt = $conexion->prepare("SELECT id, nombre FROM tipodocumento");
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_all(MYSQLI_ASSOC);
}
public static function existeUsuario($usuario) {
    $conn = Conexion::getConexion();
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE Usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->num_rows > 0;
}


public static function documentoExiste($nroDocumento) {
    $conn = Conexion::getConexion();
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE nro_documento = ?");
    $stmt->bind_param("s", $nroDocumento);
    $stmt->execute();
    return $stmt->get_result()->num_rows > 0;
}

}
?>
