<?php

if(isset($_POST['volver']))
{


}elseif(isset($_POST['registro']))
{
    //que sea la primera vez que se entra en login

    $_SESSION['vista'] = $vistas['login']; 
    require_once $vistas['layout'];

}

?>