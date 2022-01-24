<?php
    require_once("./config/config.php");
    session_start();

    //si el usuario esta logeando inicio Logueando

    if(isset($_SESSION['validada'])){

        //enviar a donde haga falta
    }
    //Si el usuario está logeando y ha solicitado algo


    //Si el usuario ha pedido ir al login

    else
    {
        if(isset($_POST['login']))
        {
            $controlador = $controladores['login'];
            require_once $controlador;
            exit();
        }elseif(isset($_POST['registro']))
        {
            $controlador=$controladores['registro'];
            require_once $controlador;
            exit();
        }
        
        
        
    }

    //Si el usuario entra por primera vez
    $_SESSION["vista"] = $vistas["inicio"];
    require $vistas['layout'];
?>