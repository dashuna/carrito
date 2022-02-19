<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .datos {
            display: flex;
        }
        .datoss {
            display: flex;
        }
    </style>
</head>
<body>
<div class="datos">
    <div class="datos">
        <div class="">
            <h3>Datos de la compra</h3>
            <p>Importe:
                <span><?php ?></span>
            </p>
            <p>Comercio:
                <span>Práctica Carrito DLS</span>
            </p>
            <p>Fecha y Hora:
                <span><?php echo $DateAndTime = date('d/m/Y G:i', time()); ?></span>
            </p>
        </div>
    </div>

    <div class="datoss">
        <div>
            <h3>Dotos de facturación</h3>
            <p>Nombre facturación:
                <input type="text" name="nombreFact">
            </p>
            <p>Es empresa
                <input type="checkbox">
            </p>
            <p>Documento de identidad:
                <input type="text" name="dni">
            </p>
        </div>
        <div>
           <h3>Datos de pago</h3>
            <p>Número de Tarjeta:
                <input type="text" name="tarjeta">
            </p>
            <p>Caducidad:
                <span>Mes</span> <input type="number" name="mes" style="width:50px">
                <span>Año</span> <input type="number" name="año" style="width:50px">
            </p>
           <p>CVC2:
               <input type="number" name="cvc2" style="width:50px">
           </p>
       </div>
    </div>
        <button type="submit" name="pagar">Pagar</button>
        <button name="cancelar"><a href ="index.php" style="text-decoration: none"/>Cancelar</button>
</div>

</body>
</html>