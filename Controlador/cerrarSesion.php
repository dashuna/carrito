<?php
    session_start();
    session_destroy();
    unset($_COOKIE['usuario']);
    //unset($_COOKIE['productos']);
    setcookie("usuario", "qwerty", time() -1, "/");
    //setcookie("productos", "asdfh", time() -1, "/");

    header("location: ../index.php");
