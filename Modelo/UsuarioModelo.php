<?php
require_once "Conexion.php";
require_once "Usuario.php";

class UsuarioModelo extends Conexion {
    private $conexion;

    public function __construct() {
        $this -> conexion = Conexion::conectar();
    }
    public function obtenerUsuario(string $usuario):?Usuario {
        $consulta = "select id, usuario, nombre, apellidos, email, telefono, password, id_rol 
                        from tiendaOnline.usuarios where usuario = :usuario";
        $resultado = $this -> conexion -> prepare($consulta);
        $resultado -> bindParam(":usuario", $usuario);
        $resultado -> execute();
        $resultado -> bindColumn("id", $id);
        $resultado -> bindColumn("nombre", $nombre);
        $resultado -> bindColumn("apellidos", $apellidos);
        $resultado -> bindColumn("email", $email);
        $resultado -> bindColumn("telefono", $telefono);
        $resultado -> bindColumn("password", $password);
        $resultado -> bindColumn("id_rol", $id_rol);
        $resultado -> fetch();

        return new Usuario($id, $usuario, $nombre, $apellidos, $email, $telefono, $password, $id_rol);
    }

    public function nuevoUsuario($usuario, $nombre, $apellidos, $email, $telefono, $password, $rol) {
        $consultaInsertar = "insert into tiendaOnline.usuarios (usuario, nombre, apellidos, email, telefono, password, id_rol) 
                                values (:usuario, :nombre, :apellidos, :email, :telefono, :password, :rol) ";
        $resultado = $this -> conexion -> prepare($consultaInsertar);
        $resultado -> execute(array(":usuario" => $usuario, ":nombre" => $nombre, ":apellidos" => $apellidos,
            ":email" => $email, ":telefono" => $telefono, ":password" => $password, ":rol" => $rol));
        if (!$resultado) {
            echo "Error al registrarse. <br>";
        } else {
            echo "El usuario se ha registrado con éxito. <br>";
            header("location: index.php");
        }
        $resultado -> closeCursor();
    }
}