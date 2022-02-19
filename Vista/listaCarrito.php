<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" type="text/css" href="../Vista/css/estilosCarrito.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="..">Productos</a></li>
        <li><a href="#">Carrito</a></li>
    </ul>
</nav>
    <div class="articulos">
        <?php
        foreach ($lista as $registro) { ?>
        <div id="fila_<?php echo $registro["idCarrito"]?>" class="fila">
            <div><img src="../Vista/imagenes/<?php echo $registro["imagen"] ?>"></div>
            <div class="detalles">
                <h3 class="nombre"><?php echo $registro["nombre"]?></h3>
                <p class="descripcion"><?php echo $registro["descripcion"]?></p>
                <input id="cantidad_<?php echo $registro["idCarrito"]?>" type="number" name="cantidad"
                           onchange="actualizarCantidad(<?php echo $registro["idCarrito"]?>)"
                           value="<?php echo $registro["cantidad"]?>" class="cantidad" title="La cantidad se actualiza automáticamente">
            </div>
            <div class="precio">
                <h3><span id="precio_<?php echo $registro["idCarrito"]?>"><?php echo $registro["precio"]?></span> €</h3>
                <form class="form">
                    <button type="submit" class="borrar">Borrar</button>
                    <input type="hidden" name="idCarrito" value="<?php echo $registro["idCarrito"]?>">
                    <input type="hidden" name="action" value="borrar">
                </form>
            </div>
        </div>
        <?php } ?>
        <div class="total">
            <h3 class="subtotal" >SUBTOTAL: <span id="subtotal"><?php echo $totalCompra ?></span> €</h3>
        </div>
        <div class="terminar">
            <form method="get">
                <button type="submit">Terminar Pedido</button>
                <input type="hidden" name="pago-pedido">
            </form>
        </div>
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
                        $("#fila_"+response).remove();
                        obtenerTotalCarrito();
                    },
                    error: function () {
                        console.log("Error");
                    }
                });
            });
        });

        function actualizarCantidad(idCarrito) {
            //Seria igual a $(this).val() pero solo en el caso que la funcion la llamase el input cantidad
            let cantidad = $("#cantidad_" + idCarrito).val();
            $.ajax({
                data: {
                    cantidad: cantidad,
                    idCarrito: idCarrito,
                    action: "modificar"
                },
                url: "../Controlador/CarritoControlador.php",
                type: "POST",
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
                    $("#subtotal").html(response);
                },
                error: function () {
                    alert("Error al actualizar total carrito");
                }
            });
        }
    </script>
</body>
</html>