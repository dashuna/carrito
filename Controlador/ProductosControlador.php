<?php
require_once "Modelo/ProductosModelo.php";
require_once "Modelo/CarritoModelo.php";

$productosModelo = new ProductosModelo();
$carritoModelo = new CarritoModelo();

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

    $rol = $_SESSION["rol"];
    if ($rol == "1") {

        $marcas = $productosModelo -> obtenerListaMarcas();
        $categorias = $productosModelo -> obtenerListaCategorias();

        require "Vista/productosAdmin.php";
    } else {
        $idUsuario = $_SESSION["id"];
        $productos = $productosModelo -> getProductos();
        $idProductosCarrito = $carritoModelo -> getIdsProductosCarrito($idUsuario);
        require "Vista/productosUser.php";
    }



?>