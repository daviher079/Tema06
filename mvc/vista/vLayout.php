<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header class="navbar">
        <!--
            mostrar un boton de ir al login si no está logueado
            y dos botones uno de perfil y otro de logout
        -->


        <?php

        if (isset($_SESSION['validada'])) {
            echo $_SESSION['nombre'];
        ?>
            
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Perfil" name="perfil">
                <input type="submit" value="Logout" name="logout">
            </form>
        <?php

        } else {
        ?>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                <input type="submit" value="Login" name="login">

            </form>

        <?php
        }

        ?>
        <h1>MVC</h1>
    </header>

    <main class="navbar">
        <?php

        //si hay alguna vista cargada desde 
        //el controlador la carga

        if (!isset($_SESSION['vista'])) {
            require_once $vista['inicio'];
        } else {
            require_once $_SESSION['vista'];
        }


        ?>

    </main>
    <footer class="text-center">
        Derechos de autor David
    </footer>
</body>

</html>