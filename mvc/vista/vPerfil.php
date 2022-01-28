<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    
    <!-- User -->
    <label  class="form-group"  for="user">User: 
        <input type="text" name="user" id="user" value="<?php 
            
            echo $usuario->codUsuario    
        ?>"> <!-- Lo muestra -->
        <input type="hidden" name="user" id="user" value="<?php 
            
            echo $usuario->codUsuario    
        ?>"> <!-- Lo envía -->
    </label><br><br>

    <!-- Nombre -->
    <label class="form-group" for="nombre">Nombre: 
        <input  type="text" name="nombre" id="nombre" value="<?php 
            
            echo $usuario->nombre    
        ?>">
    </label><br><br>

    <!-- Contraseña -->
    <label class="form-group" for="pass">Contraseña: 
        <input  type="password" name="pass" id="pass">
    </label><br><br>
    
    <!-- Repetir contraseña -->
    <label class="form-group" for="pass">Repetir contraseña: 
        <input type="password" name="pass2" id="pass2">
    </label><br><br>

    <!-- Perfil -->
    <label class="form-group" for="perfil">Perfil: 
        <input type="text" name="perfil" id="perfil" value="<?php 
            
            echo $usuario->perfil    
        ?>">
    </label><br><br>
    
    <input type="submit" value="Modificar" name="modificar">
    <input type="submit" value="Volver" name="volver">
    
</form>