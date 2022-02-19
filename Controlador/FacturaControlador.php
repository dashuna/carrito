<?php
require_once "../Modelo/FacturaModelo.php";
require_once "../Modelo/PedidoModelo.php";
require_once "../Modelo/CarritoModelo.php";


$factura = new FacturaModelo();
$pedidoModelo = new PedidoModelo();
$carrito = new CarritoModelo();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //en el momento de pagar guardo la factura, el pedido y el detalle del pedido
        session_start();
        $nombreFacturacion = $_POST["nombreFact"];
        $esEmpresa = $_POST["check"];
        $numDocumento = $_POST["dni"];
        $tarjeta = $_POST["tarjeta"];

        $idFactura = $factura -> saveDatosFacturacion($nombreFacturacion, $esEmpresa, $numDocumento, $tarjeta);

        $idUsuario = $_SESSION["id"];
        $fecha = date('Y-m-d H:i:s');

        //obtener la lista del carrito para sacar el totalPedido y poder insertarlo en la tabla pedidos
        $listaCarrito = $carrito -> getCarrito($idUsuario);
        $totalPedido = 0;
        foreach ($listaCarrito as $fila) {
            $totalPedido += $fila["precio"] * $fila["cantidad"];
        }

        $idPedido = $pedidoModelo -> savePedido($idUsuario, $fecha, $totalPedido, $idFactura);

        //guardamos los detalles de cada pedido
        foreach ($listaCarrito as $fila) {
            $idProducto = $fila["idProducto"];
            $unidades = $fila["cantidad"];
            $pedidoModelo -> saveDetallePedido($idPedido, $idProducto, $unidades);
        }

        $carrito -> vaciarCarrito($idUsuario);

        require "PedidoControlador.php";
    }









?>