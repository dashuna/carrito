<?php
require_once "../Modelo/FacturaModelo.php";
require_once "../Modelo/PedidoModelo.php";
require_once "../Modelo/CarritoModelo.php";
require_once "../Modelo/ProductosModelo.php";


$factura = new FacturaModelo();
$pedidoModelo = new PedidoModelo();
$carrito = new CarritoModelo();
$productosModelo = new ProductosModelo();

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
            //comprobar si hay unidades
            $stock = $productosModelo -> getStockProducto($fila["idProducto"]);
            //echo var_dump($stock);
            if ($fila["cantidad"] > $stock["stock"]) {
                header("location:CarritoControlador.php?error=Stock insuficiente");
                return;
            }
        }

        $idPedido = $pedidoModelo -> savePedido($idUsuario, $fecha, $totalPedido, $idFactura);

        //guardamos los detalles de cada pedido
        foreach ($listaCarrito as $fila) {
            $idProducto = $fila["idProducto"];
            $unidades = $fila["cantidad"];
            $stock = $fila["stock"];

            $stockActual = $stock - $unidades;
            $productosModelo -> actualizarStock($idProducto, $stockActual);
            $pedidoModelo -> saveDetallePedido($idPedido, $idProducto, $unidades);
        }

        $carrito -> vaciarCarrito($idUsuario);
        header("location: PedidoControlador.php");
    }
?>