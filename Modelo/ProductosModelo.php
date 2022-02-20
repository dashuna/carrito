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
//usuario y principal
    public function getProductos() {
        $sql = "select * from tiendaOnline.productos order by 'id' ASC";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> execute();
        $this -> productos = $resultado -> fetchAll();
        return $this -> productos;
    }
//admin
    public function insertarProducto($id_marca, $id_categoria, $nombre, $descripcion, $precio, $stock, $imagen) {
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
//admin
    public function obtenerListaMarcas():array {
        $sql = "select id, nombre from marcas order by nombre ASC";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> execute();
        $this -> marcas = $resultado -> fetchAll();
        return $this -> marcas;
    }
//admin
    public function obtenerListaCategorias():array {
        $sql = "select id, nombre from categorias order by id ASC";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> execute();
        $this -> categorias = $resultado -> fetchAll();
        return $this -> categorias;
    }
//admin
    public function getProductosPaginado(int $pagina, int $registrosPagina) : array {
        $posicionPrimerRegistro = ($pagina > 1) ? (($pagina * $registrosPagina) - $registrosPagina) : 0;

        $consulta = "select prod.id 'idProducto', prod.nombre, prod.descripcion, prod.precio, prod.stock, prod.imagen,
                     marcas.nombre 'marcaNombre', cat.nombre 'catNombre', marcas.id 'idMarca', cat.id 'idCategoria' 
                     from productos prod, marcas marcas, categorias cat 
                     where prod.id_marca = marcas.id 
                     and prod.id_categoria = cat.id
                     limit $posicionPrimerRegistro, $registrosPagina";
        $resultado = $this -> conexion -> prepare($consulta);
        $resultado -> execute();
        $this -> productos = $resultado -> fetchAll();
        return $this -> productos;
    }
//admin
    public function getTotalRegistros() : int {
        $sql = "select count(*) from productos order by 'id' ASC";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> execute();
        return $resultado -> fetchColumn();
    }
//admin
    public function borrarProducto(string $id) {
        $sqlBorrar = "delete from productos where id = :id";
        $consulta = $this -> conexion -> prepare($sqlBorrar);
        $consulta -> execute(array(":id" => $id));
    }
//admin
    public function actualizarProducto($idMarca, $idCategoria, $nombre, $descripcion, $precio, $stock, $imagen) {
        $sqlEditar = "update productos set id_marca = :idMarca, id_categoria = :idCategoria, 
                      nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock, imagen = :imagen 
                      where id = :idProducto";
        $consulta = $this -> conexion -> prepare($sqlEditar);
        $consulta -> execute(array(":idMarca" => $idMarca,":idCategoria" => $idCategoria, ":nombre" => $nombre,
                                    ":descripcion" => $descripcion, ":precio" => $precio, ":stock" => $stock, ":imagen" => $imagen));
    }


//usuario
    public function getStockProducto($idProducto) {
        $sql = "select stock from productos where id = :idProducto";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":idProducto" => $idProducto));
        return $consulta -> fetch();
    }
//usuario
    public function actualizarStock($idProducto, $stock) {
        $sql = "update productos set stock = :stock where id = :id";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id" => $idProducto, ":stock" => $stock));
    }

}


?>