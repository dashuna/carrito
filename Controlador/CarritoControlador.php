<?php
require_once "../Modelo/CarritoModelo.php";

$carrito = new CarritoModelo();
//añadir por post un producto dependiendo del usuario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "crear") {
            session_start();
            $idUsuario = $_SESSION["id"];
            $idProducto = $_POST["idProducto"];
            $cantidad = $_POST["cantidad"];
            $carrito -> saveCarrito($idUsuario, $idProducto, $cantidad);
        } else if ($_POST["action"] == "borrar") {
            $id = $_POST["idCarrito"];
            $carrito -> deleteCarrito($id);
            echo $id;
        } else if ($_POST["action"] == "modificar") {
            $id = $_POST["idCarrito"];
            $cantidad = $_POST["cantidad"];
            $carrito -> updateCantidadCarrito($id, $cantidad);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        session_start();
        $idUsuario = $_SESSION["id"];
        $lista = $carrito -> getCarrito($idUsuario);
        //var_dump($lista[0]);
        $totalCompra = getTotalCarrito($lista);
        if (isset($_GET["total-carrito"])) {
            //Si tenemos action solo devolvemos el total de la compra
            echo $totalCompra;
        } else if (isset($_GET["pago-pedido"])) {
            require "../Vista/pasarelaPagos.php";
        } else {
            //Si no hay action, devolvemos las variables con la web completa
            require "../Vista/listaCarrito.php";
        }
    }

    function getTotalCarrito(array $listaCarrito) {
        $totalCompra = 0;
        foreach ($listaCarrito as $registro) {
            $totalCompra += $registro["cantidad"] * $registro["precio"];
        }
        return $totalCompra;
    }
?>