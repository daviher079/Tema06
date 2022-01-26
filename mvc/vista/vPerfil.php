
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<label for="">Registrar Usuario</label>

<label for="user">User: <input type="text" name="user" id="user"></label>
<label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label>
<label for="pass">Contraseña: <input type="text" name="pass" id="pass"></label>
<label for="pass2">Repetir Contraseña: <input type="text" name="pass2" id="pass2"></label>


<input type="submit" value="Registrar" name="registrar">
<input type="submit" value="Volver" name="volver">

</form>