<?php
require_once "Conexion.php";

class PedidoModelo {
    private $conexion;

    public function __construct() {
        $this -> conexion = Conexion::conectar();
    }


}
?>