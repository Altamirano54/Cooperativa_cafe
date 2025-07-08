<?php
class Salida {
    private $id;
    private $id_usuario;
    private $id_producto;
    private $cantidad_salida;
    private $destino;
    private $fecha_salida;
    private $observaciones;

    public function __construct($id = null, $id_usuario = null, $id_producto = null, $cantidad_salida = 0, $destino = "Planta de Procesamiento", $fecha_salida = null, $observaciones = "") {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_producto = $id_producto;
        $this->cantidad_salida = $cantidad_salida;
        $this->destino = $destino;
        $this->fecha_salida = $fecha_salida;
        $this->observaciones = $observaciones;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getIdUsuario() { return $this->id_usuario; }
    public function getIdProducto() { return $this->id_producto; }
    public function getCantidadSalida() { return $this->cantidad_salida; }
    public function getDestino() { return $this->destino; }
    public function getFechaSalida() { return $this->fecha_salida; }
    public function getObservaciones() { return $this->observaciones; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setIdUsuario($id_usuario) { $this->id_usuario = $id_usuario; }
    public function setIdProducto($id_producto) { $this->id_producto = $id_producto; }
    public function setCantidadSalida($cantidad_salida) { $this->cantidad_salida = $cantidad_salida; }
    public function setDestino($destino) { $this->destino = $destino; }
    public function setFechaSalida($fecha_salida) { $this->fecha_salida = $fecha_salida; }
    public function setObservaciones($observaciones) { $this->observaciones = $observaciones; }
}
?>
