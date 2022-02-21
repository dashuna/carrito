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
<div class="container p-8 mx-auto mt-12">
    <div class="w-full overflow-x-auto">
        <div class="my-2">
            <h3 class="text-xl font-bold tracking-wider">Lista de la compra</h3>
        </div>
        <table class="w-full shadow-inner">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 font-bold whitespace-nowrap">Imagen</th>
                <th class="px-6 py-3 font-bold whitespace-nowrap">Producto</th>
                <th class="px-6 py-3 font-bold whitespace-nowrap">Unidades</th>
                <th class="px-6 py-3 font-bold whitespace-nowrap">Precio</th>
                <th class="px-6 py-3 font-bold whitespace-nowrap">Borrar</th>
            </tr>
            </thead>
            <tbody>
        <?php
        foreach ($lista as $registro) { ?>

        <tr id="fila_<?php echo $registro["idCarrito"]?>" class="fila">
            <td>
                <div class="flex justify-center">
                    <img
                            src="../Vista/imagenes/<?php echo $registro["imagen"] ?>"
                            class="object-cover h-28 w-28 rounded-2xl"
                    />
                </div>
            </td>
            <td class="p-4 px-6 text-center whitespace-nowrap">
                <div class="flex flex-col items-center justify-center">
                    <h3 id="nombre_<?php echo $registro["idCarrito"]?>"><?php echo $registro["nombre"]?></h3>
                </div>
            </td>
            <td class="p-4 px-6 text-center whitespace-nowrap">
                <div>
                    <input id="cantidad_<?php echo $registro["idCarrito"]?>" type="number" name="cantidad"
                           onchange="actualizarCantidad(<?php echo $registro["idCarrito"]?>)"
                           value="<?php echo $registro["cantidad"]?>" class="cantidad w-12 text-center bg-gray-100 outline-none" title="La cantidad se actualiza automáticamente"
                           max="<?php echo $registro["stock"]?>">
                </div>
            </td>
            <td class="p-4 px-6 text-center whitespace-nowrap">
                <input type="hidden" id="stock_<?php echo $registro["idCarrito"]?>" value="<?php echo $registro["stock"]?>" class="stock">
                <span id="precio_<?php echo $registro["idCarrito"]?>"><?php echo $registro["precio"]?></span> €</td>
            <td class="p-4 px-6 text-center whitespace-nowrap">
                <form class="form">
                <input type="hidden" name="idCarrito" value="<?php echo $registro["idCarrito"]?>">
                <input type="hidden" name="action" value="borrar">
                <button class="borrar" type="submit" >
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-red-400"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                    >
                        <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        />
                    </svg>
                </button>
                </form>
            </td>
        <?php } ?>
        </tr>

            </tbody>
        </table>

        <div class="mt-4">
            <div class="py-4 rounded-md shadow">
                <div
                        class="
                flex
                items-center
                justify-between
                px-4
                py-2
                mt-3
                border-t-2
              "
                >
                    <span class="text-xl font-bold">Total</span>
                    <span id="subtotal" class="text-2xl font-bold"><?php echo $totalCompra ?></span>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <form method="get">
                <button class="
                  w-full
                  py-2
                  text-center text-white
                  bg-blue-500
                  rounded-md
                  shadow
                  hover:bg-blue-600
                  " type="submit"> Terminar Pedido
                </button>
                <input type="hidden" name="pago-pedido">
            </form>
        </div>
    <script>
        $(function(){
            $(".form").on("submit", function (event) {
                event.preventDefault();
                let formulario = $(this);
                let url = "../Controlador/CarritoControlador.php";
                let datos = formulario.serialize();
                $.ajax({
                    data: datos,
                    url: url,
                    type: "POST",
                    beforeSend: function () {
                        return confirm("Estás seguro de que quieres borrar el producto seleccionado de la lista?");                            return true;
                    },
                    success: function (response) {
                        //response nos devuelve el idCarrito si tod ha ido correctamente
                        // $("#fila_"+formulario[0].idCarrito.value).remove();
                        $("#fila_" + response).remove();
                        obtenerTotalCarrito();
                    },
                    error: function () {
                        console.log("Error");
                    }
                });
            });
            $(".cantidad").change(); //simula que se ha cambiado ese input
        });

        function actualizarCantidad(idCarrito) {
            //Seria igual a $(this).val() pero solo en el caso que la funcion la llamase el input cantidad
            let cantidad = $("#cantidad_" + idCarrito).val();
            let nombre = $("#nombre_"+idCarrito).html();
            $.ajax({
                data: {
                    cantidad: cantidad,
                    idCarrito: idCarrito,
                    action: "modificar"
                },
                url: "../Controlador/CarritoControlador.php",
                type: "POST",
                beforeSend: function() {
                    let stock = $("#stock_" + idCarrito).val();
                    console.log(stock);
                    if (parseInt(cantidad) > parseInt(stock)) {
                        alert("El stock del producto: " + nombre + " es insuficiente! \nEl valor se actualizará al máximo permitido.");
                        $("#cantidad_" + idCarrito).val(stock);
                        return false;
                    } else {
                        return true;
                    }
                },
                success: function () {
                    console.log("Exito");
                    obtenerTotalCarrito();
                },
                error: function () {
                    alert("Error al actualizar cantidad");
                }
            });
        }
        
        function obtenerTotalCarrito() {
            $.ajax({
                url: "../Controlador/CarritoControlador.php?total-carrito",
                type: "GET",
                success: function (response) {
                    $("#subtotal").html(response + "€");
                },
                error: function () {
                    alert("Error al actualizar total carrito");
                }
            });
        }
    </script>
</body>
</html>