<?php
    include "../Modelo/UsuarioModelo.php";

    if (isset($_POST["entrar"])) {
        login();
        header("location: ../");
    }
    if (isset($_POST["registro"])) {
        require "../Vista/registro.php";
    } else {
        require "../Vista/login.php";
    }

    if (isset($_POST["registrarse"])) {
        insertarNuevoRegistro();
    }

    function login() {
        $usuarioModelo = new UsuarioModelo();

        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $usuario = $usuarioModelo -> obtenerUsuario($usuario);
        if ($usuario == null) {
            echo "El usuario o la contraseña introducidos no son correctos.";
            return 0;
        }

        $passwordDB = $usuario -> getPassword();
        $id = $usuario -> getId();
        $rol = $usuario -> getIdRol();
        $iguales = password_verify($password, $passwordDB);
        if ($iguales) {
            iniciarSesion($id, $rol);
            crearCookie();
        } else {
            echo "El usuario o la contraseña introducidos no son correctos.";
        }
    }

    function iniciarSesion(string $id, string $rol) {
        session_start();
        $_SESSION["id"] = $id;
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["rol"] = $rol;
        echo "Entraste!<br>";
    }

    function crearCookie() {
        if(isset($_POST["check"])) {
            setcookie("usuario", "cookie de usuario", time() +60, "/");
            echo "Cookie creada. <br>";
        } else {
            echo "No se ha podido crear la cookie, <br>";
        }
    }

    function insertarNuevoRegistro() {
        $usuarioModelo = new UsuarioModelo();
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $apellidos= $_POST["apellidos"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $password = $_POST["password"];
        $rol = $_POST["rol"];

        $passwordCifrada = password_hash($password, PASSWORD_DEFAULT);
        $usuarioModelo -> nuevoUsuario($usuario, $nombre, $apellidos, $email, $telefono, $passwordCifrada, $rol);
    }
?>