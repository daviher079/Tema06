<main class="mainModPerfil">
    <?php

        $usuario= $_SESSION['user'];

        if(!isset($_COOKIE[$usuario]))
        {
            echo "<h2>No hay productos añadidos a la lista de deseos</h2>";
        }else
        {
            foreach ($_COOKIE[$usuario] as $key => $value) {
                $producto = ProductoDAO::buscaById($value);
                if($producto->imagenBaja!="")
                {
                    
                    echo 
                        "<div class='producto' 
                            style='background-image: url(./web-root/imgBajas/".$producto->imagenBaja."); 
                            background-size: 100% 100%; background-repeat: no-repeat; 
                            color: #d02b4d'>". 

                            "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
                                "<input type='submit' value='". $producto->descripcion."' name='producto'>".
                                "<input type='hidden' name='codigo' value='$producto->codigoProducto'>"
                            ."</form>".

                        "</div>";
                }else
                {
                    echo 
                        "<div class='producto'>". 

                            "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
                                "<input type='submit' value='". $producto->descripcion."' name='producto'>".
                                "<input type='hidden' name='codigo' value='$producto->codigoProducto'>"
                            ."</form>".

                        "</div>";

                }
            }
        }
    ?>


</main>