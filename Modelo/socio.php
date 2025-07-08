<?php
class Socio {
    private $id;
    private $nombre;
    private $id_tipoDocumento;
    private $nro_documento;
    private $cobase;
    private $estado;

    public function __construct($id = null, $nombre = "", $id_tipoDocumento = null, $nro_documento = "", $cobase = "", $estado = "activo") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->id_tipoDocumento = $id_tipoDocumento;
        $this->nro_documento = $nro_documento;
        $this->cobase = $cobase;
        $this->estado = $estado;
    }

    
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getIdTipoDocumento() { return $this->id_tipoDocumento; }
    public function getNroDocumento() { return $this->nro_documento; }
    public function getCobase() { return $this->cobase; }
    public function getEstado() { return $this->estado; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setIdTipoDocumento($id_tipoDocumento) { $this->id_tipoDocumento = $id_tipoDocumento; }
    public function setNroDocumento($nro_documento) { $this->nro_documento = $nro_documento; }
    public function setCobase($cobase) { $this->cobase = $cobase; }
    public function setEstado($estado) { $this->estado = $estado; }
}
?>
