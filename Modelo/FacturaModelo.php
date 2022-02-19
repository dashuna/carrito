<?php
require_once "Conexion.php";

class FacturaModelo {
    private $conexion;

    public function __construct() {
        $this -> conexion = Conexion::conectar();
    }

    public function saveDatosFacturacion($nombreFacturacion, $esEmpresa, $numDocumento, $tarjeta) {
        $sql = "insert into facturas (nombre_facturacion, es_empresa, num_documento, tarjeta)
                values (:nombre_facturacion, :es_empresa, :num_documento, :tarjeta)";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":nombre_facturacion" => $nombreFacturacion,
            ":es_empresa" => $esEmpresa,
            ":num_documento" => $numDocumento,
            ":tarjeta" => $tarjeta));
        return $this -> conexion -> lastInsertId(); //devuelve el ultimo id insertado
    }
}
