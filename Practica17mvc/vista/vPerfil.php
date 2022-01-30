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
    
    <aside>

        <?php
            
            echo"<ul>";
            /**
             * Se recorren las páginas a las que puede acceder al usuario
             */

             /**
              * Duda como insertar las paginas en la BD para hacer el MVC
              */
                foreach ($_SESSION['paginas'] as $key => $value) {
                    echo" <li><a class='boton' href='./".$value."'>".$key."</a> </li>";
                }
            echo "</ul>";    
        ?>
    </aside>   
