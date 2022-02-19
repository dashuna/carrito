<?php
require_once "Conexion.php";

class ProductosModelo {
    private $conexion;
    private $productos = array();
    private $marcas = array();
    private $categorias = array();

    public function __construct() {
        $this -> conexion = Conexion::conectar();
    }

    public function getProductos() {
        $sql = "select * from tiendaOnline.productos order by 'id' ASC";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> execute();
        $this -> productos = $resultado -> fetchAll();
        return $this -> productos;
    }

    public function insertarProducto($id_marca, $id_categoria, $nombre, $descripcion, $precio, $stock, $imagen) {
//        $id_marca = $_GET['id_marca'];
//        $id_categoria = $_GET['id_categoria'];
//        $nombre = $_GET['nombre'];
//        $descripcion = $_GET['descripcion'];
//        $precio = $_GET['precio'];
//        $stock = $_GET['stock'];
//        $imagen = $_FILES['imagen'];

        $sql = "insert into productos (id_marca, id_categoria, nombre, descripcion, precio, stock, imagen) 
                values (:id_marca, :id_categoria, :nombre, :descripcion, :precio, :stock, :imagen)";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id_marca" => $id_marca,
                                    ":id_categoria" => $id_categoria,
                                    ":nombre" => $nombre,
                                    ":descripcion" => $descripcion,
                                    ":precio" => $precio,
                                    ":stock" => $stock,
                                    ":imagen" => $imagen
                            ));
    }

    public function obtenerListaMarcas():array {
        $sql = "select id, nombre from marcas order by nombre ASC";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> execute();
        $this -> marcas = $resultado -> fetchAll();
        return $this -> marcas;
    }

    public function obtenerListaCategorias():array {
        $sql = "select id, nombre from categorias order by id ASC";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> execute();
        $this -> categorias = $resultado -> fetchAll();
        return $this -> categorias;
    }

}


?>