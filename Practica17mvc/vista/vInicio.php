
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
                                    "<div class='producto' 
                                        style='background-image: url(./web-root/imgBajas/".$producto->imagenBaja."); 
                                        background-size: 100% 100%; background-repeat: no-repeat; 
                                        color: #d02b4d'>". 

                                        "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
                                            "<input type='submit' value='". $producto->descripcion."' name='producto'>".
                                            "<input type='hidden' name='codigo' value=' $producto->codigoProducto'>"
                                        ."</form>".
    
                                    "</div>";
                            }else
                            {
                                echo 
                                    "<div class='producto'>". 

                                        "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
                                            "<input type='submit' value='". $producto->descripcion."' name='producto'>".
                                            "<input type='hidden' name='codigo' value=' $producto->codigoProducto'>"
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
                    
                            $arrayDatosProducto=VerProducto($value);
                            echo  "<li><a class='prVisitado' href='./paginas/comprarProducto.php?codigo=".$arrayDatosProducto[0].
                        "&descripcion=".$arrayDatosProducto[1]."&precio=".$arrayDatosProducto[2].
                        "&stock=".$arrayDatosProducto[3]."'>".$arrayDatosProducto[1]."</a></li>";
        
                        }
                        echo "</ul>";
                    }
                ?>
            </div>
        </div>

        

