
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos Admin</title>
    <script src="./js/script.js"></script>
    <?php include 'include_js.php' ?>
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
<?php include 'menu.php' ?>
<table class=" border-collapse w-full">
    <thead class="bg-gray-100 dark:bg-gray-700">
        <tr>
            <th>IMAGEN</th>
            <th>MARCA</th>
            <th>CATEGORIA</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>PRECIO</th>
            <th>STOCK</th>
            <th>EDITAR</th>
            <th>BORRAR</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($productos as $registro) { ?>
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <form method="post">

                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <img src="Vista/imagenes/<?php echo $registro["imagen"]?>" class="imagen_<?php echo $registro["idProducto"]?>">
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["marcaNombre"]?></span>
                    <!-- <input type='text' class="oculto " name='idMarca' value='<?php echo $registro["idMarca"]?>'> -->

                   <select class="oculto  fila_<?php echo $registro["idProducto"]?>" name="idMarca" placeholder="Seleccione marca">-->
                    <?php foreach ($marcas as $marca) {?>
                        <option 
                        
                        <?php if($marca["id"] == $registro["idMarca"]) {?>
                            selected
                        <?php }?>
                        
                        value="<?php echo $marca["id"]?>"><?php echo $marca["nombre"]?></option>
                    <?php }?>
                   </select>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["catNombre"]?></span>
                <select class="oculto  fila_<?php echo $registro["idProducto"]?>" name="idCategoria" placeholder="Seleccione Categoría">-->
                    <?php foreach ($categorias as $categoria) {?>
                        <option 
                        <?php if($categoria["id"] == $registro["idCategoria"]) {?>
                            selected
                        <?php }?>
                        value="<?php echo $categoria["id"]?>"><?php echo $categoria["nombre"]?>
                        </option>
                    <?php }?>
                </select>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["nombre"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='nombre' value='<?php echo $registro["nombre"]?>'>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["descripcion"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='descripcion' value='<?php echo $registro["descripcion"]?>'>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["precio"]?>€</span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='precio' value='<?php echo $registro["precio"]?>'>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="texto_<?php echo $registro["idProducto"]?>"><?php echo $registro["stock"]?></span>
                    <input type='text' class="oculto fila_<?php echo $registro["idProducto"]?>" name='stock' value='<?php echo $registro["stock"]?>'>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static oculto fila_<?php echo $registro["idProducto"]?>">
                    <button type="submit" class="" name="actualizar">Actualizar</button>
                </td>
                <input type='hidden' name ='idProducto' value='<?php echo $registro["idProducto"]?>'>
            </form>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <button class="texto_<?php echo $registro["idProducto"]?>" onclick="editarFila(<?php echo $registro['idProducto']?>)">Editar</button>
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <form method='post'>
                    <button type='submit' class='btnBorrar' name='borrar'>Borrar</button>
                    <input type='hidden' name ='idProducto' value='<?php echo $registro["idProducto"]?>'>
                </form>
            </td>
        </tr>

    <?php }?>
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <form method="post">
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"><input type="file" name="imagen"></td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <select name="idMarca" placeholder="Seleccione marca">
                        <?php foreach ($marcas as $marca) {?>
                            <option value="<?php echo $marca["id"]?>"><?php echo $marca["nombre"]?></option>
                        <?php }?>
                    </select>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <select name="idCategoria" placeholder="Seleccione Categoría">
                        <?php foreach ($categorias as $categoria) {?>
                            <option value="<?php echo $categoria["id"]?>"><?php echo $categoria["nombre"]?></option>
                        <?php }?>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"><input type="text" name="nombre" placeholder="Indique el Nombre"></td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"><input type="text" name="descripcion" placeholder="Descripción"></td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"><input type="text" name="precio" placeholder="Precio"></td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"><input type="text" name="stock" placeholder="Stock"></td>
                <td rowspan="2" class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"><button type="submit" name="insertar">Insertar</button></td>
            </form>
        </tr>
    </tbody>
</table>


<div>
    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        <?php if ($pagina > 1) { ?>
            <a href="index.php?pagina=1" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> Primera </a>

            <a href="index.php?pagina=<?php echo $pagina - 1; ?>" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Anterior</span>
            <!-- Heroicon name: solid/chevron-left -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            </a>
        <?php } ?>



        <?php
        for ($i = 1; $i <= $numeroPaginas; $i++) {
            if ($pagina != $i) {
                ?>
                    <a href="index.php?pagina=<?php echo $i; ?>" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium"><?php echo $i; ?></a>
            <?php } else { ?>
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"><?php echo $i; ?></span>
            <?php } ?>
        <?php } ?>

        <?php if ($pagina < $numeroPaginas) { ?>
            <a href="index.php?pagina=<?php echo $pagina + 1; ?>" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Siguiente</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>

            <a href="index.php?pagina=<?php echo $numeroPaginas; ?>" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> Última </a>
        <?php } ?>

      </nav>
    </div>
</body>
</html>