
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos Admin</title>
</head>
<body>
<h1></h1>


    <table>
        <tr>
            <th>MARCA</th>
            <th>CATEGORIA</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>PRECIO</th>
            <th>STOCK</th>
            <th>IMAGEN</th>
        </tr>
        <tr>
            <form method="post">
                <td>
                    <select name="idMarca" placeholder="Seleccione marca">
                        <?php foreach ($marcas as $marca) {?>
                            <option value="<?php echo $marca["id"]?>"><?php echo $marca["nombre"]?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <select name="idCategoria" placeholder="Seleccione Categoría">
                        <?php foreach ($categorias as $categoria) {?>
                            <option value="<?php echo $categoria["id"]?>"><?php echo $categoria["nombre"]?></option>
                        <?php }?>
                </td>
                <td><input type="text" name="nombre" placeholder="Indique el Nombre"></td>
                <td><input type="text" name="descripcion" placeholder="Descripción"></td>
                <td><input type="text" name="precio" placeholder="Precio"></td>
                <td><input type="text" name="stock" placeholder="Stock"></td>
                <td><input type="file" name="imagen"></td>
                <td><button type="submit" name="insertar">Insertar</button></td>
            </form>
        </tr>
    </table>


</body>
</html>