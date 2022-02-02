<?php
 /*   require_once "../codigo/validaSesion.php";
    
    //Comprobar que hay sesion
    
    session_start();

    if(validaSession()==false)
    {
        header("location: ./403.php");
    }

    //y sino te llevo al login y exit
    */
?>
    
<main class="mainModPerfil">
            
    <h2>Modificar perfil</h2>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <?php 
                $usuario = UsuarioDAO::buscaById($_SESSION['user']);
        ?>
        
        <input type="hidden" name="passArray" value="<?php echo $usuario->clave;?>">
            <section>
                <label for="user">Usuario</label>
                <input style="color: #c57485;" type="text" onfocus="this.blur()" name="user" placeholder="Usuario" id="user" readonly="readonly" value="<?php echo $usuario->usuario ?>">
            </section>

            <section>
                <label for="nCompleto">N. Completo</label>
                <input type="text" name="nCompleto" placeholder="Nombre completo" id="nCompleto"  value="<?php recordarGenericoMod("nCompleto",$usuario->nombre,'modificarPerfil')?>">
                <?php
                    if(isset($_REQUEST['modificarPerfil']) && expresionGenerico(PATRONNOMBRECOMPLETO, $usuario->nombre, 'modificarPerfil')==false)
                    {
                        label("El nombre introducido no es valido. Deben tener un mínimo de 3 caracteres el nombre y los 2 apellidos<br>");
                    }
                    comprobarGenerico("nCompleto", 'modificarPerfil');
                ?>
            </section>

            <section>
                <label for="correo">C. Electronico</label>
                <input type="mail" name="correo" placeholder="Correo electronico" id="correo" value="<?php recordarGenericoMod("correo",$usuario->correo,'modificarPerfil')?>">
                <?php
                    comprobarGenerico("correo", 'modificarPerfil');
                ?>
            </section>

            <section>
                <label for="fecha">F. Nacimiento</label>
                <input type="date" name="fecha" id="fecha" value="<?php recordarGenericoMod("fecha", $usuario->fechaNacimiento,'modificarPerfil')?>">
                <?php
                    comprobarGenerico("fecha", 'modificarPerfil');
                ?>
            </section>

            <section>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="passF" value="<?php recordarPass("pass", 'modificarPerfil')?>">
                <?php

                    if(isset($_REQUEST['modificarPerfil']))
                    {
                        $passFormu=sha1($_REQUEST['pass']);
                        if($passFormu==$_REQUEST['passArray'])
                        {
                            label("Error no puede introducir la misma contraseña que ya tenía<br>");
                        }
                        elseif(validarPass('modificarPerfil')==false)
                        {
                            label("Error. Asegurese de haber introducido la misma contraseña en los dos campos<br>");
                            $_REQUEST['pass']="";
                            $_REQUEST['rPass']="";

                        }
                    }
                    comprobarGenerico("pass", 'modificarPerfil');
                ?>
            </section>

            <section>
                <label for="rPass">Rep. Contraseña</label>
                <input type="password" name="rPass" id="rPass" value="<?php recordarPass("rPass", 'modificarPerfil')?>">
                <?php
                    comprobarGenerico("rPass", 'modificarPerfil');
                ?>
            </section>
            
            <input type="submit" value="Modificar perfil" name="modificarPerfil">
        

    </form>

           
</main>
