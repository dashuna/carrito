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
            margin: 30px;
        }
        .datosCompra {
            display: flex;
            margin: 0 40px;
            padding: 20px;
        }
        .datosPago {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            margin: 0 40px;
            padding: 20px;
        }
    </style>
    <?php include 'include_js.php' ?>
</head>
<body>
<?php include 'menu.php' ?>
<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-16">
    <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
        <form method="POST" action="../Controlador/FacturaControlador.php">
<!--        <div class="w-full pt-1 pb-5">-->
<!--            <div class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">-->
<!--                <i class="mdi mdi-credit-card-outline text-3xl"></i>-->
<!--            </div>-->
<!--        </div>-->
        <div class="mb-10">
            <h1 class="text-center font-bold text-xl uppercase">Secure payment info</h1>
        </div>
        <div class="mb-3 flex -mx-2">
            <div class="px-2">
                <label for="type1" class="flex items-center cursor-pointer">
<!--                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>-->
                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                </label>
            </div>
<!--            <div class="px-2">-->
<!--                <label for="type2" class="flex items-center cursor-pointer">-->
<!--                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type2">-->
<!--                    <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png" class="h-8 ml-3">-->
<!--                </label>-->
<!--            </div>-->
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Nombre facturación</label>
            <div>
                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" name="nombreFact" placeholder="Nombre de facturación" type="text"/>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Es Empresa
<!--            <label for="type1" class="flex items-center cursor-pointer">-->
                <input type="radio" class="form-radio h-4 w-4 text-indigo-500" name="check" checked value="0">No
                <input type="radio" class="form-radio h-4 w-4 text-indigo-500" name="check" value="1">Si<!--
</label>-->
            </label>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Documento de Identidad</label>
            <div>
                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" name="dni" placeholder="DNI" type="text"/>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Número de Tarjeta</label>
            <div>
                <input class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" name="tarjeta" placeholder="0000 0000 0000 0000" type="text"/>
            </div>
        </div>
        <div class="mb-3 -mx-2 flex items-end">
            <div class="px-2 w-1/2">
                <label class="font-bold text-sm mb-2 ml-1">Caducidad</label>
                <div>
                    <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="01">01 - January</option>
                        <option value="02">02 - February</option>
                        <option value="03">03 - March</option>
                        <option value="04">04 - April</option>
                        <option value="05">05 - May</option>
                        <option value="06">06 - June</option>
                        <option value="07">07 - July</option>
                        <option value="08">08 - August</option>
                        <option value="09">09 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                    </select>
                </div>
            </div>
            <div class="px-2 w-1/2">
                <select class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                </select>
            </div>
        </div>
        <div class="mb-10">
            <label class="font-bold text-sm mb-2 ml-1">CVC2</label>
            <div>
                <input class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="text"/>
            </div>
        </div>
        <div>
            <button type="submit" name="pagar" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"> Pagar</button>
<!--            <button name="cancelar" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"><a href ="index.php" style="text-decoration: none"/>Cancelar</button>-->
        </div>
        </form>
    </div>
</div>





<!--<div class="datos">-->
<!--    <div class="datosCompra">-->
<!--        <div class="">-->
<!--            <h3>Datos de la compra</h3>-->
<!--            <p>Importe:-->
<!--                <span>--><?php //$totalPedido?><!--</span>-->
<!--            </p>-->
<!--            <p>Comercio:-->
<!--                <span>Práctica Carrito DLS</span>-->
<!--            </p>-->
<!--            <p>Fecha y Hora:-->
<!--                <span>--><?php //echo $DateAndTime = date('d/m/Y G:i', time()); ?><!--</span>-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="datosPago">-->
<!--        <div>-->
<!--        <form method="POST" action="../Controlador/FacturaControlador.php">-->
<!--            <h3>Dotos de facturación</h3>-->
<!--            <p>Nombre facturación:-->
<!--                <input type="text" name="nombreFact">-->
<!--            </p>-->
<!--            <p>Es empresa-->
<!--                <input type="radio" name="check" checked value="0">No-->
<!--                <input type="radio" name="check" value="1">Si-->
<!--            </p>-->
<!--            <p>Documento de identidad:-->
<!--                <input type="text" name="dni">-->
<!--            </p>-->
<!--        </div>-->
<!--        <div>-->
<!--           <h3>Datos de pago</h3>-->
<!--            <p>Número de Tarjeta:-->
<!--                <input type="text" name="tarjeta">-->
<!--            </p>-->
<!--            <p>Caducidad:-->
<!--                <span>Mes</span> <input type="number" name="mes" style="width:50px">-->
<!--                <span>Año</span> <input type="number" name="año" style="width:50px">-->
<!--            </p>-->
<!--           <p>CVC2:-->
<!--               <input type="number" name="cvc2" style="width:50px">-->
<!--           </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--    <button type="submit" name="pagar">Pagar</button>-->
<!--    <button name="cancelar"><a href ="index.php" style="text-decoration: none"/>Cancelar</button>-->
<!--</form>-->


</body>
</html>