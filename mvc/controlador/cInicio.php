<?php

if(isset($_POST['login']))
{
    $_SESSION["pagina"] = "login";
    header("Location: index.php");
    exit();
}

$_SESSION['vista'] =$vistas['inicio'];
require_once $vistas['layout'];

?>
