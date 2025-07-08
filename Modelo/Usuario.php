<?php
// Modelo/Usuario.php
require_once __DIR__ . '/../Config/conexion.php';


class Usuario {
    public static function autenticar($usuario, $password) {
        $con = Conexion::getConexion();
        $usuario = $usuario;//$con->real_escape_string($usuario);
        $password = $password;//md5($password); // O usa password_hash si prefieres más seguridad

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$password'";
        $res = $con->query($sql);

        return ($res->num_rows > 0) ? $res->fetch_assoc() : null;
    }
}
?>
