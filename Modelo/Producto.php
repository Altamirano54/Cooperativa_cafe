<?php
class Producto {
    private $id;
    private $nombre;
    private $stock;
    private $precio;
    private $estado;

    public function __construct($id = null, $nombre = "", $stock = 0, $precio = 0, $estado = "activo") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->estado = $estado;
    }

    
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getStock() { return $this->stock; }
    public function getPrecio() { return $this->precio; }
    public function getEstado() { return $this->estado; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setStock($stock) { $this->stock = $stock; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function setEstado($estado) { $this->estado = $estado; }
}
?>
