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

    if (isset($_POST['borrar'])) {
        $productosModelo -> borrarProducto($_POST['idProducto']);
        //header("location:index.php");
    }

    if (isset($_POST['actualizar'])) {
        if (empty($_POST['idMarca'])
            || empty($_POST['idCategoria'])
            || empty($_POST['nombre'])
            || empty($_POST['descripcion'])
            || empty($_POST['precio'])
            || empty($_POST['stock'])){
            echo "<script> alert('Faltan datos!'); </script>";
        } else {
            $idMarca = $_POST['idMarca'];
            $idCategoria = $_POST['idCategoria'];
            $idProducto = $_POST['idProducto'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_POST['imagen'] ?? null;

            $productosModelo -> actualizarProducto($idMarca, $idCategoria, $nombre, $descripcion, $precio, $stock, $imagen, $idProducto);
            echo "<script> alert('Los datos se han actualizado con éxito!'); </script>";
            //header("location:index.php");
        }
    }

    $pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
    $registrosPagina = 15;
    $totalRegistros = $productosModelo -> getTotalRegistros();
//var_dump($_SESSION);
//$rol = isset($_SESSION["rol"]) ? $_SESSION["rol"] : -1;
    $rol = $_SESSION["rol"] ?? -1;

    if ($rol == "1") { //administrador
        $marcas = $productosModelo -> obtenerListaMarcas();
        $categorias = $productosModelo -> obtenerListaCategorias();
        $productos = $productosModelo -> getProductosPaginado($pagina, $registrosPagina);
        $numeroPaginas = ceil($totalRegistros/$registrosPagina);
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