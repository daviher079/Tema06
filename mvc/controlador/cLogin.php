<?php
//si se ha pulsado el registro

if(isset($_POST['registro']))
{
   header('Location: index.php');
    exit();
}elseif(isset($_POST['iniciar']))
{
    //que haya rellenado los campos y verifique si existe el usuario
}elseif(isset($_POST['volver']))
{
    $_SESSION['vista']=$vistas['inicio'];
    require_once $vistas['layout'];
}else
{
    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['login']; 
    require_once $vistas['layout'];
}

?>