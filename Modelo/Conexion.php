<?php
    require_once "configuracion.php";

    class Conexion {
        public static function conectar() {
            try {
                $conection = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
                $conection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conection -> exec(DB_CHARSET);
            } catch (Exception $e) {
                die ("Error: ".$e -> getMessage());
            }
            return $conection;
        }
    }

?>