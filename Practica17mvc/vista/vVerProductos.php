<div class="allProductos">
    <?php
        $array=ProductoDAO::findAll();
        
        foreach ($array as $key => $value) {
            $producto =new Producto($value->codigoProducto, $value->descripcion, $value->precio, $value->stock, $value->imagenAlta, $value->imagenBaja);
            
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
    ?>
</div>