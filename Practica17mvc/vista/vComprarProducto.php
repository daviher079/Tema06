<?php



if(isset($_SESSION['codigoProducto']))
{
    
    if(!isset($_COOKIE['visitado']))
    {
        setcookie("visitado[0]",$_SESSION['codigoProducto'], time()+31536000, "/");

    }else
    {
       //contar cuantas hay
       $arrayProductosVisitados = $_COOKIE['visitado'];

       $numero=count($arrayProductosVisitados);

       if(!in_array($_SESSION['codigoProducto'], $arrayProductosVisitados))
       {
           if($numero<3)
           {
                array_unshift($arrayProductosVisitados, $_SESSION['codigoProducto']);

                foreach ($arrayProductosVisitados as $key => $value) {
                    setcookie('visitado['.$key.']',$value, time()+31536000, "/");
                }  
           }else
           {
               //Ordenar poniendo el primero el ultimo codigo
                array_unshift($arrayProductosVisitados, $_SESSION['codigoProducto']);
                array_pop($arrayProductosVisitados);

                foreach ($arrayProductosVisitados as $key => $value) {
                    setcookie('visitado['.$key.']',$value, time()+31536000, "/");

                    
                }
           }
       }
    }
}

?>

    <main class="mainProducto">
            <?php
            $producto = ProductoDAO::buscaById($_SESSION['codigoProducto']);
                if($producto->imagenAlta!='')
                {
                    $cadena = "./web-root/imgProductosGrandes/".$producto->imagenAlta;
                }else
                {
                    $cadena = "./web-root/img/store-window-g05f275403_1920.jpg";
                }
            ?>
        <img class ="imgProducto" src=<?php echo $cadena ?> >
        
        

<div class="datosProducto">

            <?php
                if(comprobarSesion()==true)
                {
                
            ?>    
                <section>

                    <label for="deseo">Añadir a la lista de deseos <img id="imagen" src="./web-root/img/amor-01.png" height="18px"></label>

                    <input type="checkbox" name="deseo" id="deseo">
                </section>
            <?php
                }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="codigo" id ="codigo" value="<?php echo $producto->codigoProducto;?>">
                <input type="hidden" name="stock" value="<?php echo $producto->stock;?>">
                
                <?php 
                    echo "<h1>".$producto->descripcion."</h1>"; 
                    echo "<h2>".$producto->precio."€</h2>";
                ?>
                    <section>
                        <label for="nProductos">Nº unidades</label>
                        <input type="number" name="cantidad" id="nProductos"  min="1" value="1">
                        <?php
                            //Se comprueba que el input no esté vacio
                            comprobarCantidad();
                        ?>
                    </section>


                    <section>
                        <input type="submit" value="Comprar Producto" name="comprarProducto">
                    </section>
            </form>
        </div>


    </main>
        
