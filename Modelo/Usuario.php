<?php
class Usuario {
    private $id;
    private $usuario;
    private $id_tipoDocumento;
    private $nro_documento;
    private $contraseña;
    private $rol;
    private $creado_en;

    public function __construct($id = null, $usuario = "", $id_tipoDocumento = null, $nro_documento = "", $contraseña = "", $rol = "almacenero", $creado_en = null) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->id_tipoDocumento = $id_tipoDocumento;
        $this->nro_documento = $nro_documento;
        $this->contraseña = $contraseña;
        $this->rol = $rol;
        $this->creado_en = $creado_en;
    }

    
    public function getId() { return $this->id; }
    public function getUsuario() { return $this->usuario; }
    public function getIdTipoDocumento() { return $this->id_tipoDocumento; }
    public function getNroDocumento() { return $this->nro_documento; }
    public function getContraseña() { return $this->contraseña; }
    public function getRol() { return $this->rol; }
    public function getCreadoEn() { return $this->creado_en; }

    public function setId($id) { $this->id = $id; }
    public function setUsuario($usuario) { $this->usuario = $usuario; }
    public function setIdTipoDocumento($id_tipoDocumento) { $this->id_tipoDocumento = $id_tipoDocumento; }
    public function setNroDocumento($nro_documento) { $this->nro_documento = $nro_documento; }
    public function setContraseña($contraseña) { $this->contraseña = $contraseña; }
    public function setRol($rol) { $this->rol = $rol; }
    public function setCreadoEn($creado_en) { $this->creado_en = $creado_en; }
}
?>
