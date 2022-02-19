<?php
require_once "Modelo/ProductosModelo.php";
require_once "Modelo/CarritoModelo.php";

$productosModelo = new ProductosModelo();
$carritoModelo = new CarritoModelo();
session_start();

if (isset($_POST['insertar'])) {
    if (empty($_POST['idMarca'])
        || empty($_POST['idCategoria'])
        || empty($_POST['nombre'])
        || empty($_POST['descripcion'])
        || empty($_POST['precio'])
        || empty($_POST['stock'])
        || empty($_POST['imagen'])){
        echo "<script>
                    alert('Faltan datos!!! \\nTiene que insertar datos en todas las casillas.')
                </script>";
    } else {
        $id_marca = $_POST['idMarca'];
        $id_categoria = $_POST['idCategoria'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $imagen = $_POST['imagen'];

        $productosModelo -> insertarProducto($id_marca, $id_categoria, $nombre, $descripcion, $precio, $stock, $imagen);
        echo "El registro se ha insertado con éxito";
    }

}

//var_dump($_SESSION);

//$rol = isset($_SESSION["rol"]) ? $_SESSION["rol"] : -1;
    $rol = $_SESSION["rol"] ?? -1;

    if ($rol == "1") { //administrador
        $marcas = $productosModelo -> obtenerListaMarcas();
        $categorias = $productosModelo -> obtenerListaCategorias();

        require "Vista/productosAdmin.php";

    } else { //usuario
        if (isset($_SESSION["id"])) {
            $idUsuario = $_SESSION["id"];
            $idProductosCarrito = $carritoModelo -> getIdsProductosCarrito($idUsuario);
            $usuarioLogeado = true;

        } else { //cualquiera
            $idProductosCarrito = [];
            $usuarioLogeado = false;
        }

        $productos = $productosModelo -> getProductos();
        require "Vista/productosUser.php";
    }



?>