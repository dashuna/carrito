<?php
require_once "Conexion.php";

class CarritoModelo {
    private $conexion;

    public function __construct() {
        $this -> conexion = Conexion::conectar();
    }

    public function saveCarrito($idUsuario, $idProducto, $cantidad) {
        $sql = "insert into carrito (id_usuario, id_producto, cantidad)
                values (:id_usuario, :id_producto, :cantidad)";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id_usuario" => $idUsuario,
                                    ":id_producto" => $idProducto,
                                    ":cantidad" => $cantidad));
    }
    //obtener los productos del carrito de un usuario
    public function getCarrito($idUsuario) {
        $sql = "select car.id as 'idCarrito', prod.id as 'idProducto', 
                prod.nombre, prod.descripcion, prod.imagen, prod.precio, car.cantidad
                from carrito car 
                left join productos prod 
                on car.id_producto = prod.id 
                where car.id_usuario = :id_usuario";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id_usuario" => $idUsuario));
        $carrito = $consulta -> fetchAll();
        return $carrito;
    }
    public function deleteCarrito(int $id) {
        $sql = "delete from carrito where id = :id";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id"=>$id));
    }

    public function getIdsProductosCarrito($idUsuario) {
        $sql = "select car.id_producto from carrito car
                where car.id_usuario = :id_usuario";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id_usuario" => $idUsuario));
        return $consulta -> fetchAll(PDO::FETCH_COLUMN);
    }

    public function updateCantidadCarrito($idCarrito, $cantidad) {
        $sql = "update carrito set cantidad = :cantidad where id = :idCarrito";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":idCarrito" => $idCarrito, ":cantidad" => $cantidad));
    }

    public function vaciarCarrito ($idUsuario) {
        $sql = "delete from carrito where id_usuario = :id_usuario";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id_usuario"=>$idUsuario));
    }

}

?>