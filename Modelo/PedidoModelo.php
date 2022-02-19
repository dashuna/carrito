<?php
require_once "Conexion.php";

class PedidoModelo {
    private $conexion;

    public function __construct() {
        $this -> conexion = Conexion::conectar();
    }

    public function savePedido ($idUsuario, $fecha, $totalPedido, $idFactura) {
        $sql = "insert into pedidos (id_usuario, fecha, total, id_factura)
                values (:id_usuario, :fecha, :totalPedido, :id_factura)";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":id_usuario" => $idUsuario,
                                ":fecha" => $fecha,
                                ":totalPedido" => $totalPedido,
                                ":id_factura" => $idFactura));
        return $this -> conexion -> lastInsertId();
    }

    public function saveDetallePedido ($idPedido, $idProducto, $unidades) {
        $sql = "insert into detalle_pedido (id_pedido, id_producto, unidades)
                            values (:idPedido, :idProducto, :unidades)";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> execute(array(":idPedido" => $idPedido,
                                ":idProducto" => $idProducto,
                                ":unidades" => $unidades));
    }

    public function getPedidos($idUsuario) {
        $sql = "select id, id_usuario, fecha, total, id_factura from pedidos
                where id_usuario = :id_usuario order by id desc";
        $consulta = $this -> conexion -> prepare($sql);
        $consulta -> bindParam(":id_usuario", $idUsuario);
        $consulta -> execute();
        $consulta -> bindColumn("id", $idPedido);
        $consulta -> bindColumn("id_usuario", $idUsuario);
        $consulta -> bindColumn("fecha", $fecha);
        $consulta -> bindColumn("total", $totalPedido);
        return $consulta -> fetchAll();
    }

    public function getDetallePedido($idPedido) {
        $sql = "select detalle.id 'idDetalle', detalle.id_producto 'idProducto', detalle.unidades, 
                productos.nombre, productos.precio, productos.imagen
                from detalle_pedido detalle, productos productos
                where detalle.id_pedido = :idPedido 
                and detalle.id_producto = productos.id";
        $resultado = $this -> conexion -> prepare($sql);
        $resultado -> bindParam(":idPedido", $idPedido);
        $resultado -> execute();
        $resultado -> bindColumn("idDetalle", $idDetalle);
        $resultado -> bindColumn("idProducto", $idProducto);
        $resultado -> bindColumn("unidades", $unidades);
        $resultado -> bindColumn("nombre", $nombre);
        $resultado -> bindColumn("precio", $precio);
        $resultado -> bindColumn("imagen", $imagen);
        return $resultado -> fetchAll();
    }
}

?>