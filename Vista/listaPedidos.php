<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include 'include_js.php' ?>
</head>
<body>
<?php include 'menu.php' ?>
<!--    --><?php //echo "<pre>" ,var_dump($listaPedidos) ,"</pre>"; ?>
<!--    --><?php //echo "hola";  ?>
<?php foreach ($listaPedidos as $pedido) {?>
    <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-xl font-bold leading-none text-gray-900 dark:text-white"><?php echo gmdate("M d Y H:i:s", strtotime($pedido["fecha"]));?></h4>
            <a class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                <?php echo $pedido["total"]?> €
            </a>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <?php foreach ($pedido["detalles"] as $detalle) {?>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full" src="../Vista/imagenes/<?php echo $detalle["imagen"]?>">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <?php echo $detalle["nombre"]?>
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                <?php echo $detalle["precio"]?> € x <?php echo $detalle["unidades"]?> und.
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <?php echo $detalle["precio"] * $detalle["unidades"]?> €
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php }?>
</body>
</html>