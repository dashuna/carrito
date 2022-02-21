<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de nuevo usuario</title>
    <?php include 'include_js.php' ?>
</head>

<body>
    <?php include 'menu.php' ?>

    <form method="post">

        <div class="bg-grey-lighter min-h-screen flex flex-col">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-3xl text-center">Registro de nuevo usuario</h1>
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="nombre" placeholder="Nombre" />

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="apellidos" placeholder="Apellidos" />

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="telefono" placeholder="Telefono" />
                    <input type="email" class="block border border-grey-light w-full p-3 rounded mb-4" name="email" placeholder="Email" />

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="usuario" placeholder="Usuario" />

                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password" placeholder="Password" />

                    <input type="hidden" name="rol" value="2">

                    <button type="submit" name="registrarse" class="w-full text-center py-3 rounded bg-teal-500 hover:bg-teal-400 text-white focus:outline-none my-1">
                        Registrarse</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>