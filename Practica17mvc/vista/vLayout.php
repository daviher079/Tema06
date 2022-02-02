<?php

    if(isset($_COOKIE['recuerdame']))
    {
        $user=$_COOKIE['recuerdame'][0];
        $pass=$_COOKIE['recuerdame'][1];

        $usuario = UsuarioDAO::validaUser($user, $pass);

        if($usuario != null)
        { 
            $_SESSION['validada']=true;
            $_SESSION['user']=$usuario->usuario;
            $_SESSION['nombre']=$usuario->nombre;
            $_SESSION['perfil']=$usuario->perfil;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./web-root/css/resetCSS.css">
    <link rel="stylesheet" href="./web-root/css/style.css">
    <script src="./web-root/js/recogerDeseoUsuario.js"></script>
    
    
    <title>Tienda Online</title>
</head>

<body>
    <header class="cabecera">
        <!--
            mostrar un boton de ir al login si no está logueado
            y dos botones uno de perfil y otro de logout
        -->
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="menu" id="menu" >
                    <nav id="navega">
                        <ul>
                            <li>
                                <input type="submit" value="Ver Productos" id="verProductos" name="verProductos">
                            </li>
                            <?php
                                if (isset($_SESSION['validada'])) {
                            ?>
                                <li>
                                    <input type="submit" value="Lista de Deseos" id="listaDeseos" name="listaDeseos">
                                </li>

                            <?php
                                }
                                if($_SESSION['perfil']=='ADM01'){

                            ?>
                            <li>
                                <input type="submit" value="Insertar productos" id="insertarProductos" name="insertarProductos">
                            </li>

                            <li>
                                <input type="submit" value="Modificar productos" id="modificarProducto" name="modificarProductos">
                            </li>

                            <li>
                                <input type="submit" value="Mostrar ventas" id="mostrarVentas" name="mostrarVentas">
                            </li>

                            <li>
                                <input type="submit" value="Mostrar albaranes" id="mostrarAlbaranes" name="mostrarAlbaranes">
                            </li>
                            <?php                            
                                }
                                if($_SESSION['perfil']=='MOD01'){
                            ?>
                                <li>
                                    <input type="submit" value="Insertar productos" id="insertarProductos" name="insertarProductos">
                                </li>
                                
                                <li>
                                    <input type="submit" value="Mostrar ventas" id="mostrarVentas" name="mostrarVentas">
                                </li>

                                <li>
                                    <input type="submit" value="Mostrar albaranes" id="mostrarAlbaranes" name="mostrarAlbaranes">
                                </li>
                            <?php                            
                                }
                                
                            ?>
                        </ul>
                    </nav>
                </div>
            </form>
        </div>

        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="submit" value="Tienda Online" id="titulo" name="volver">   
            </form>
        </div>

        
        <div class="user">                     
        
        <?php
        
        if (isset($_SESSION['validada'])) {
            ?>
            
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" value="Perfil" name="perfil">
                <input type="submit" value="Logout" name="logout">
            </form>
            <?php

            echo "<h2 style='float:left'>".$_SESSION['nombre']."</h2>";
        } else {
        ?>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                <input type="submit" value="Login" name="login">

            </form>

        <?php
        }
        echo "</div>";
        ?>
    </header>

    <main>
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
    <script src="./web-root/js/menuLayout.js"></script>
</body>

</html>