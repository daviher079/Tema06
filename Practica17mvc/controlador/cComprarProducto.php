<?php

if(isset($_POST['crearCuenta']))
{
    $_SESSION['pagina']='registro';
    header('Location: index.php');
    exit();
}
elseif(isset($_POST['volver']))
{
    $_SESSION['pagina']='inicio';
    header('Location: index.php');
    exit();
}else
{
    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['comprarProducto'];
    require_once $vistas['layout'];
}


?>