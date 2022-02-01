<?php
   /* require_once "../codigo/validaSesion.php";
    
    //Comprobar que hay sesion
    
    session_start();

    if(validaSession()==false)
    {
        header("location: ./403.php");
    }
*/
    //y sino te llevo al login y exit
    
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

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="hidden" name="codigo" id ="codigo" value="<?php echo $producto->codigoProducto;?>">
                <input type="hidden" name="stock" id="stock" value="<?php echo $producto->stock;?>">
            
            <?php 

                $precioFinal = (float) $producto->precio * (int) $_SESSION['cantidad'];
                echo "<h1>".$producto->descripcion."</h1>"; 
                
            ?>

            <section style=" width:240px">
                <label for="precioFinal">Precio Final</label>
                <input style="color: #c57485; width:80px;" type="text" onfocus="this.blur()" name="precioFinal" id="precioFinal" readonly="readonly" value="<?php echo $precioFinal ?>">
            </section>

            <section style=" width:240px">
                <label for="nProductos" >Nº unidades</label>
                <input style="color: #c57485; width:80px;" type="text" onfocus="this.blur()" name="nProductos" id="nProductos" readonly="readonly" value="<?php echo $_SESSION['cantidad'] ?>">
                
            </section>


                <section>
                    <input type="submit" value="Finalizar Comprar" name="finalizarCompra">
                </section>
            </form>
        </div>
        

    </main>
        