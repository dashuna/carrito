<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>

    <?php include 'include_js.php' ?>
<!--    <style>-->
<!--        -->
<!--        .principal {-->
<!--            display: flex;-->
<!--            flex-wrap: wrap;-->
<!--            justify-content: space-evenly;-->
<!--        }-->
<!--        a {-->
<!--            text-decoration: none;-->
<!--        }-->
<!--        .articulo {-->
<!--            width: 250px;-->
<!--            padding: 20px;-->
<!--            text-align: center;-->
<!--        }-->
<!--    </style>-->
</head>
<body>
<?php include 'menu.php' ?>
<div>
    <div class="px-10 py-20 bg-gray-100 grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
    <?php foreach ($productos as $registro) {
        if (!in_array($registro["id"], $idProductosCarrito)) { ?>
    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer w-70" id="articulo_<?php echo $registro["id"] ?>">
        <div>
            <img object-cover id="imagen" src="Vista/imagenes/<?php echo $registro["imagen"] ?>" alt="<?php echo $registro["imagen"] ?>">
        </div>

        <form method="POST" class="formulario">
            <div class="py-4 px-4 bg-white">
                <h3 class="text-md font-semibold text-gray-600"><?php echo $registro["nombre"]?></h3>
                <p class="mt-3 text-md font-thin" ><?php echo $registro["descripcion"]?></p>
                <p class="mt-3 text-lg font-thin precio" ><?php echo $registro["precio"]?> € X <input type="number" name="cantidad" value="1" class="" style="width : 35px"></p>

                <span class="flex items-center justify-center mt-4 w-full bg-teal-500 hover:bg-teal-400 py-1 rounded">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                      </svg>


                        <input class="font-semibold text-gray-800" type="submit" name="save" value="Añadir">
                        <input type="hidden" name="idProducto" value="<?php echo $registro["id"] ?>">
                        <input type="hidden" name="action" value="crear">

                </span>
            </div>
        </form>





        <!--Enlace, descripción y observaciones ocultas-->

    </div>


    <?php }
        } ?>
    </div>
</div>
    <script>
        $(function(){
            $(".formulario").on("submit", function (event) {
                event.preventDefault();
                let formulario = $(this);
                let url = "Controlador/CarritoControlador.php"; //formulario.attr("action");
                let datos = formulario.serialize();
                $.ajax({
                    data: datos,
                    url: url,
                    type: "POST",
                    beforeSend: function () {
                        <?php
                        if ($usuarioLogeado) {
                            echo "return true;";
                        } else {
                            echo "alert('Debes iniciar sesion para añadir un producto');";
                            echo "$(location).prop('href', './Controlador/UsuarioControlador.php');";
                        }
                        ?>
                    },
                    success: function (response) {
                        console.log("Se ha realizado");
                        alert("El producto se ha añadido al carrito!");
                        //se tiene que borrar cuando ya este en el carrito
                        $("#articulo_"+ response).remove();
                    },
                    error: function () {
                        console.log("Error");
                    }
                });
            });
        });
    </script>
</body>
</html>