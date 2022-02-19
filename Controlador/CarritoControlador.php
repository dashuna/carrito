<?php
require_once "../Modelo/CarritoModelo.php";

$carrito = new CarritoModelo();
//añadir por post un producto dependiendo del usuario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "crear") {
            //inserta producto en el carrito
            //Necesita solicitar login
            session_start();
            if (isset($_SESSION["id"])) {
                $idUsuario = $_SESSION["id"];
                $idProducto = $_POST["idProducto"];
                $cantidad = $_POST["cantidad"];
                $carrito -> saveCarrito($idUsuario, $idProducto, $cantidad);
                //devolvemos el id para poder usarlo con ajax (response)
                echo $idProducto;
            } else {
                require "UsuarioControlador.php";
            }
            //borrar producto del carrito
        } else if ($_POST["action"] == "borrar") {
            $id = $_POST["idCarrito"];
            $carrito -> deleteCarrito($id);
            echo $id;
            //modificar la cantidad del producto
        } else if ($_POST["action"] == "modificar") {
            $id = $_POST["idCarrito"];
            $cantidad = $_POST["cantidad"];
            $carrito -> updateCantidadCarrito($id, $cantidad);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        session_start();
        if(!isset($_SESSION["id"])) {
            echo "El carrito está vacío.";
        } else {
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
    }

    function getTotalCarrito(array $listaCarrito) {
        $totalCompra = 0;
        foreach ($listaCarrito as $registro) {
            $totalCompra += $registro["cantidad"] * $registro["precio"];
        }
        return $totalCompra;
    }
?>