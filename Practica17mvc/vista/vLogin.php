<?php

if(isset($_SESSION['mensaje']))
{
    echo $_SESSION['mensaje'];
}

?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <label for="">Inicio Sesión</label>

    <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label>
    <label for="pass">Pass: <input type="password" name="pass" id="pass"></label>

    <input type="submit" value="Iniciar Sesión" name="iniciar">
    <input type="submit" value="Registro" name="registro">
    <input type="submit" value="Volver" name="volver">
</form>

<?php


if(isset($_SESSION['mensaje']))
{
   unset($_SESSION['mensaje']);
}
?>