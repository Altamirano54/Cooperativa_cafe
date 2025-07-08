<?php
// Modelo/Usuario.php
require_once __DIR__ . '/../Config/conexion.php';


class Usuario {
    public static function autenticar($usuario, $password) {
        $con = Conexion::getConexion();
        $sql = "SELECT * FROM usuarios WHERE Usuario = ? AND contraseña = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $res = $stmt->get_result();

        return ($res->num_rows > 0) ? $res->fetch_assoc() : null;
    }

}
?>
