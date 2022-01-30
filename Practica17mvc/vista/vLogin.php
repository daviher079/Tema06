
<main class="loginSesiones">
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <?php

                if(isset($_SESSION['mensaje']))
                {
                    echo "<p style='text-align: center; margin-bottom:7px'>".$_SESSION['mensaje']."</p>";
                }

            ?>
            
            <section>
                <label for="user">Usuario</label><input type="text" name="user" id="user">
            </section>

            <section>
                <label for="pass">Password</label><input type="password" name="pass" id="pass">
            </section>
            <section>
                <label for="recordarme">Recordarme</label> <input type="checkbox" name="recordarme" id="recordarme">
            </section>
            
            <input type="submit" value="Volver" name="volver">
            <input type="submit" value="Crear cuenta" name="crearCuenta">
            <input type="submit" value="Login" name="valida">
        </form>

       
    </main>

<?php


if(isset($_SESSION['mensaje']))
{
   unset($_SESSION['mensaje']);
}
?>