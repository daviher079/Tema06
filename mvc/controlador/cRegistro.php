<?php

if(isset($_POST['volver']))
{

    $_SESSION['pagina']='inicio';
    header('Location: index.php');
    exit();

}elseif(isset($_POST['registro']))
{
    //que sea la primera vez que se entra en login
    //Usaremos la libreria de validar
    //intentar insertar el usuario nuevo
   
}
elseif(isset($_POST['login']))
{
    $_SESSION['pagina']='login';
    header('Location: index.php');
    exit();
   
}else
{
    $_SESSION['vista']= $vistas['registro'];
    require_once $vistas['layout'];
}


?>