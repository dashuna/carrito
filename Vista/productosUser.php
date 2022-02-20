<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>

    <?php include 'include_js.php' ?>
    <style>
        #imagen {
            width: 200px;
            height: 200px;
        }
        .principal {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }
        a {
            text-decoration: none;
        }
        .articulo {
            width: 250px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include 'menu.php' ?>

<div class="principal">
    <?php foreach ($productos as $registro) {
        if (!in_array($registro["id"], $idProductosCarrito)) { ?>
    <div class="articulo" id="articulo_<?php echo $registro["id"] ?>">
        <div>
            <img id="imagen" src="Vista/imagenes/<?php echo $registro["imagen"] ?>" alt="<?php echo $registro["imagen"] ?>">
        </div>
        <a href="">
            <div class="">
                <h3><?php echo $registro["nombre"]?></h3>
                <p><?php echo $registro["descripcion"]?></p>
            </div>
        </a>
        <form method="POST" class="formulario">
            <input type="hidden" name="idProducto" value="<?php echo $registro["id"] ?>">
            <span class="precio"><?php echo $registro["precio"]?> €</span>
            <input type="number" name="cantidad" value="1" class="" style="width : 35px">
            <input type="hidden" name="action" value="crear">
            <input type="submit" name="save" value="Añadir">
        </form>
        <!--Enlace, descripción y observaciones ocultas-->

    </div>


    <?php }
        } ?>
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