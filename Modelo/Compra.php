<?php
class Compra {
    private $id;
    private $id_usuario;
    private $id_producto;
    private $unidad;
    private $id_socio;
    private $rendimiento;
    private $humedad;
    private $guia_ingreso;
    private $cantidad;
    private $precio;
    private $fecha_registro;

    public function __construct($id = null, $id_usuario = null, $id_producto = null, $unidad = "Quintales", $id_socio = null, $rendimiento = 0, $humedad = 0, $guia_ingreso = "", $cantidad = 0, $precio = 0, $fecha_registro = null) {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_producto = $id_producto;
        $this->unidad = $unidad;
        $this->id_socio = $id_socio;
        $this->rendimiento = $rendimiento;
        $this->humedad = $humedad;
        $this->guia_ingreso = $guia_ingreso;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->fecha_registro = $fecha_registro;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getIdUsuario() { return $this->id_usuario; }
    public function getIdProducto() { return $this->id_producto; }
    public function getUnidad() { return $this->unidad; }
    public function getIdSocio() { return $this->id_socio; }
    public function getRendimiento() { return $this->rendimiento; }
    public function getHumedad() { return $this->humedad; }
    public function getGuiaIngreso() { return $this->guia_ingreso; }
    public function getCantidad() { return $this->cantidad; }
    public function getPrecio() { return $this->precio; }
    public function getFechaRegistro() { return $this->fecha_registro; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setIdUsuario($id_usuario) { $this->id_usuario = $id_usuario; }
    public function setIdProducto($id_producto) { $this->id_producto = $id_producto; }
    public function setUnidad($unidad) { $this->unidad = $unidad; }
    public function setIdSocio($id_socio) { $this->id_socio = $id_socio; }
    public function setRendimiento($rendimiento) { $this->rendimiento = $rendimiento; }
    public function setHumedad($humedad) { $this->humedad = $humedad; }
    public function setGuiaIngreso($guia_ingreso) { $this->guia_ingreso = $guia_ingreso; }
    public function setCantidad($cantidad) { $this->cantidad = $cantidad; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function setFechaRegistro($fecha_registro) { $this->fecha_registro = $fecha_registro; }
}
?>

?>
