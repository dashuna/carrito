
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos Admin</title>
    <script src="./js/script.js"></script>
<!--    --><?php //include 'include_js.php' ?>
    <style>
        .oculto {
            display: none;
        }
        img {
            width: 50px;
            height: 50px;
        }
        table {
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Bienvenid@ <?php echo $_SESSION["usuario"]; ?> a tu perfil</h1>
<p><a href='Controlador/cerrarSesion.php'>Cerrar sesión</a></p>
<h1>PERFIL ADMINISTRADOR</h1>

<table class="table-auto">
    <tr>
        <th>IMAGEN</th>
        <th>MARCA</th>
        <th>CATEGORIA</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </tr>
    <?php foreach ($productos as $registro) { ?>
        <tr><form method="post">
                <td>
                    <img src="Vista/imagenes/<?php echo $registro["imagen"]?>" class="imagen_<?php echo $registro["idProducto"]?>">
                </td>
                <td>
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["marcaNombre"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='marca' value='<?php echo $registro["idMarca"]?>'>
<!--                    <select name="idMarca" placeholder="Seleccione marca">-->
<!--                        --><?php //foreach ($marcas as $marca) {?>
<!--                            <option value="--><?php //echo $marca["id"]?><!--">--><?php //echo $marca["nombre"]?><!--</option>-->
<!--                        --><?php //}?>
<!--                    </select>-->
                </td>
                <td>
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["catNombre"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='categoria' value='<?php echo $registro["idCategoria"]?>'>
<!--                    <select name="idCategoria" placeholder="Seleccione Categoría">-->
<!--                        --><?php //foreach ($categorias as $categoria) {?>
<!--                            <option value="--><?php //echo $categoria["id"]?><!--">--><?php //echo $categoria["nombre"]?><!--</option>-->
<!--                        --><?php //}?>
                </td>
                <td>
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["nombre"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='nombre' value='<?php echo $registro["nombre"]?>'>
                </td>
                <td>
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["descripcion"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='descripcion' value='<?php echo $registro["descripcion"]?>'>
                </td>
                <td>
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["precio"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='precio' value='<?php echo $registro["precio"]?>'>
                </td>
                <td>
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["stock"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='stock' value='<?php echo $registro["stock"]?>'>
                </td>
                <td>
                    <button type="submit" class="oculto fila_<?php echo $registro["idProducto"]?>" name="actualizar">Actualizar</button>
                </td>
            </form>
            <td>
                <button class="texto_<?php echo $registro["idProducto"]?>" onclick="editarFila(<?php echo $registro["idProducto"]?>)">Editar</button>
            </td>
            <td>
                <form method='post'>
                    <button type='submit' class='btnBorrar' name='borrar'>Borrar</button>
                    <input type='hidden' name ='idProducto' value='<?php echo $registro["idProducto"]?>'>
                </form>
            </td>
        </tr>

    <?php }?>
    <tr>
        <form method="post">
            <td><input type="file" name="imagen"></td>
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
            <td><button type="submit" name="insertar">Insertar</button></td>
        </form>
    </tr>
</table>

<table>
    <tr>
        <?php if ($pagina > 1) { ?>
            <td><a href="index.php?pagina=1"> Primera </a></td>
            <td><a href="index.php?pagina=<?php echo $pagina - 1; ?>"> Anterior </a></td>
        <?php } ?>

        <?php
        for ($i = 1; $i <= $numeroPaginas; $i++) {
            if ($pagina != $i) {
                ?>
                <td>
                    <a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </td>
            <?php } else { ?>
                <td>
                    <a><?php echo $i; ?></a>
                </td>
            <?php } ?>
        <?php } ?>

        <?php if ($pagina < $numeroPaginas) { ?>
            <td><a href="index.php?pagina=<?php echo $pagina + 1; ?>"> Siguiente </a></td>
            <td><a href="index.php?pagina=<?php echo $numeroPaginas; ?>"> Última </a></td>
        <?php } ?>
    </tr>
</table>

</body>
</html>