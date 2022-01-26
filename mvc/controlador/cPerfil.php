<?php

if(isset($_POST['logout']))
{

    unset($_SESSION['validada']);
    session_destroy();
    header("Location: index.php");
    exit();

}elseif(isset($_POST['volver']))
{
    
    $_SESSION['pagina']='inicio';
    header('Location: index.php');
    exit();
}
elseif(isset($_POST['modificar']))
{
    //al modificar vuelve a la misma
    //pagina pero con los datos nuevos
    $todoOK=true; //validar los datos introducidos

    if($todoOK)
    {

    }


   
}else
{
    $_SESSION['vista']= $vistas['perfil'];
    require_once $vistas['layout'];
}


?>