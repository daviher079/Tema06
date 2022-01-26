<?php

if(isset($_POST['login']))
{
    $_SESSION["pagina"] = "login";
    header("Location: index.php");
    exit();
}else if(isset($_POST['logout']))
{
    unset($_SESSION['validada']);
    session_destroy();
    header("Location: index.php");
    exit();
}else if(isset($_POST['perfil']))
{
    $_SESSION["pagina"] = "perfil";
    header("Location: index.php");
    exit();
}



$_SESSION['vista'] =$vistas['inicio'];
require_once $vistas['layout'];

?>
