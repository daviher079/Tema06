<main class="crearCuenta">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
           
            <section>
                <label for="user">Usuario</label>
                <input type="text" name="user" placeholder="Usuario" id="user" value="<?php recordarGenerico("user", 'crearCuenta')?>">
                <?php
                    if(isset($_REQUEST['crearCuenta']) && validarUsuario('crearCuenta')==true)
                    {
                        label("No pueden existir dos usuarios con el mismo nombre");
                    }
                    comprobarGenerico("user", 'crearCuenta');
                ?>
            </section>

            <section>
                <label for="nCompleto">Nombre Completo</label>
                <input type="text" name="nCompleto" placeholder="Nombre completo" id="nCompleto"  value="<?php recordarGenerico("nCompleto", 'crearCuenta')?>">
                <?php
                    if(isset($_REQUEST['crearCuenta']) && expresionGenerico(PATRONNOMBRECOMPLETO, $_REQUEST['nCompleto'], 'crearCuenta')==false)
                    {
                        label("El nombre introducido no es valido. Deben tener un mínimo de 3 caracteres el nombre y los 2 apellidos<br>");
                    }
                    comprobarGenerico("nCompleto", 'crearCuenta');
                ?>
            </section>

            <section>
                <label for="correo">Correo electronico</label>
                <input type="mail" name="correo" placeholder="Correo electronico" id="correo" value="<?php recordarGenerico("correo", 'crearCuenta')?>">
                <?php
                    comprobarGenerico("correo", 'crearCuenta');
                ?>
            </section>

            <section>
                <label for="fecha">F. Nacimiento</label>
                <input type="date" name="fecha" id="fecha" value="<?php recordarGenerico("fecha", 'crearCuenta')?>">
                <?php
                    comprobarGenerico("fecha", 'crearCuenta');
                ?>
            </section>

            <section>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="passF" value="<?php recordarGenerico("pass", 'crearCuenta')?>">
                <?php
                    
                    comprobarGenerico("pass", 'crearCuenta');
                ?>
            </section>

            <section>
                <label for="rPass">Repetir Contraseña</label>
                <input type="password" name="rPass" id="rPass" value="<?php recordarGenerico("rPass",'crearCuenta')?>">
                <?php
                    if(isset($_REQUEST['crearCuenta']) && validarPass('crearCuenta')==false)
                    {
                        if(!empty($_REQUEST['pass']) && !empty($_REQUEST['rPass']))
                        {
                            label("Error. Asegurese de haber introducido la misma contraseña en los dos campos<br/>");
                            $_REQUEST['pass']="";
                            $_REQUEST['rPass']="";

                        }
                    }
                    comprobarGenerico("rPass", 'crearCuenta');
                ?>
            </section>
            
            <input type="submit" value="Crear cuenta" name="crearCuenta">
            

        </form>


    </main>