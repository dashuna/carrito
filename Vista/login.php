<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h2>ACCESO DE USUARIOS</h2>
    <form method="post">
        <table>
            <tr>
                <td>Usuario: </td>
                <td><input type="text" name="usuario" required></td>
            </tr>
            <tr>
                <td>Contraseña: </td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="check" value="recordar">Recordar</td>
            </tr>
            <tr>
                <td><input type="submit" name="entrar"></td>
                <td>
                    <input type="submit" class="registro" name="registro" formnovalidate value="Registro">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if(isset($_COOKIE["usuario"])) {
        header("location: index.php");
    }
?>