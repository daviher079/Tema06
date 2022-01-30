
<img class="fondo" src="./web-root/img/tshirt-gc9f1d4dee_1920.jpg"> 
        <div class="container">
            <div class="productos">

                <?php
                    $array=mostrarProductos();
                    
                    foreach ($array as $key => $value) {
                        if($value['imagenBaja']!="")
                        {
                            echo "<a class='enlaces' href='./paginas/comprarProducto.php?codigo=".$key.
                            "&descripcion=".$value['descripcion']."&precio=".$value['precio'].
                            "&stock=".$value['stock']."&imagen=".$value['imagenAlta']."'>
                                <div class='producto' style='background-image: url(./web-root/imgBajas/".$value['imagenBaja']."); background-size: 100% 100%; background-repeat: no-repeat; color: #d02b4d'>". 
                                    "<ul class='listaDatos'>".
                                    "<li>".$value['precio']."€</li>".
                                    "<li>".$value['descripcion']."</li>".
                                "</div>
                            </a>";
                        }else
                        {
                            echo "<a class='enlaces' href='./paginas/comprarProducto.php?codigo=".$key.
                            "&descripcion=".$value['descripcion']."&precio=".$value['precio'].
                            "&stock=".$value['stock']."'>
                                <div class='producto'>". 
                                    $value['precio']."€</br>".
                                    $value['descripcion']."
                                </div>
                            </a>";

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

        

