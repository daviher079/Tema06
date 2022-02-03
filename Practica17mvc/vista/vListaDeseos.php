<main class="allProductos">
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
                    "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
                    "<label for='producto'>".
                        "<div class='producto' 
                            style='background-image: url(./web-root/imgBajas/".$producto->imagenBaja."); 
                            background-size: 100% 100%; background-repeat: no-repeat; 
                            color: #d02b4d'>". 

                                
                            "<input type='submit' id ='producto' value='". $producto->descripcion."' name='producto'>".
                            "<input type='hidden' name='codigo' value='$producto->codigoProducto'>".
                            "</label>"
                        ."</div>"
                    ."</form>";
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