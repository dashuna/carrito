<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de nuevo usuario</title>
</head>
<body>
    <form method="post">
        <fieldset><h2>Registro de nuevo usuario</h2>
            <table>
                <tr>
                    <td>Usuario: </td>
                    <td><input type="text" name="usuario"></td>
                </tr>
                <tr>
                    <td>Nombre de usuario: </td>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td>Apellidos de usuario: </td>
                    <td><input type="text" name="apellidos"></td>
                </tr>
                <tr>
                    <td>Email de usuario: </td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Teléfono de usuario: </td>
                    <td><input type="text" name="telefono"></td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Rol de usuario: </td>
                    <td><input type="text" name="rol" placeholder="1-Administrador / 2-Usuario"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="registrarse">Registrarse</button></td>
                    <td><button name="volver"><a href ="index.php" style="text-decoration: none"/>Volver</button></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>