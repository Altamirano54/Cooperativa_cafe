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
    
    public static function insertar($usuario, $password, $rol, $id_tipoDocumento, $nro_documento) {
    $conexion = Conexion::getConexion();
    $sql = "INSERT INTO usuarios (usuario, contraseña, rol, id_tipoDocumento, nro_documento) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        echo "Error en prepare: " . $conexion->error;
        return false;
    }

    $password = md5($password); // O usar password_hash en sistemas reales
    $stmt->bind_param("sssis", $usuario, $password, $rol, $id_tipoDocumento, $nro_documento);

    return $stmt->execute();
}



    public static function listar() {
        $conexion = Conexion::getConexion();
        $sql = "SELECT * FROM usuarios";
        $result = $conexion->query($sql);
        $usuarios = [];

        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }

        return $usuarios;
    }
}
?>
