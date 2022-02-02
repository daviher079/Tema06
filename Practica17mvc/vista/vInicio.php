
<img class="fondo" src="./web-root/img/tshirt-gc9f1d4dee_1920.jpg"> 
        <div class="container">
            <div class="productos">
                <?php
                        $array=ProductoDAO::findAll();
                        
                        foreach ($array as $key => $value) {
                            $producto =new Producto($value->codigoProducto, $value->descripcion, $value->precio, $value->stock, $value->imagenAlta, $value->imagenBaja);
                            
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

            <div class="visitas">
                <h2>Ultimas Visitas</h2>
                <?php
                    if(isset($_COOKIE['visitado']))
                    {
                        $arrayProductosVisitados = $_COOKIE['visitado'];
                        echo "<ul>";
                        foreach ($arrayProductosVisitados as $key => $value) {
                    
                            $producto = ProductoDAO::buscaById($value);
                            
                        echo "<li>".

                            "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
                                "<input type='submit' value='". $producto->descripcion."' name='producto'>".
                                "<input type='hidden' name='codigo' value='$producto->codigoProducto'>"
                            ."</form>"

                        ."</li>";
        
                        }
                        echo "</ul>";
                    }
                ?>
            </div>
        </div>

        

