<?php
require_once "../Modelo/PedidoModelo.php";

    $pedidoModelo = new PedidoModelo();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        session_start();
        $idUsuario = $_SESSION["id"];

        $pedidos = $pedidoModelo -> getPedidos($idUsuario);
//        $detalles = $pedidoModelo->getDetallePedido($idPedido);
        $listaPedidos = rellenarDetallePedidos($pedidos);

        require "../Vista/listaPedidos.php";
    }

    function rellenarDetallePedidos($pedidos) {
        $pedidoModelo = new PedidoModelo();
        $pedidoRellenado = array();
        foreach ($pedidos as $pedido) {
            $idPedido = $pedido["id"];
            $detalles = $pedidoModelo -> getDetallePedido($idPedido);
            $pedido["detalles"] = $detalles;
            array_push($pedidoRellenado, $pedido);
        }
        return $pedidoRellenado;
    }


?>