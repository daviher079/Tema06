<main class="mainModPerfil">
    <h2>Modificar Venta</h2>
    <?php
    
        $venta = VentaDAO::buscaById($_SESSION['codigoVenta']);

    ?>
    <form action="<?php self();?>" method="post">

        <input type="hidden" name="cantidadAntigua" value="<?php echo $venta->cantidad;?>">
        <section>
            <label for="idVenta">Id Venta</label>
            <input style="color: #c57485;" type="text" onfocus="this.blur()" name="idVenta" id="idVenta" readonly="readonly" value="<?php echo $venta->codigoVenta ?>">
        </section>

        <section>
            <label for="usuario">Usuario</label>
            <input style="color: #c57485;" type="text" onfocus="this.blur()" name="usuario" id="usuario" readonly="readonly" value="<?php echo $venta->UsuarioNickV?>">
            
        </section>

        <section>
            <label for="fecha">F. Compra</label>
            <input type="date" name="fecha" id="fecha" value="<?php recordarGenericoMod("fecha", $venta->fechaCompra,'modificarVenta')?>">
                                                                    
            <?php
                comprobarGenerico("fecha","modificarVenta");
            ?>
        </section>

        <section>
            <label for="codigoProducto">C. Producto</label>
            <input style="color: #c57485;" type="text" onfocus="this.blur()" name="codigoProducto" id="codigoProducto" readonly="readonly" value="<?php echo $venta->codigoProductoV?>">
            
        </section>

        <section>
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidadNueva" id="cantidadNueva" value="<?php recordarGenericoMod("cantidadNueva", $venta->cantidad,'modificarVenta')?>">
            
            <?php
                comprobarGenerico("cantidadNueva", "modificarVenta");
            ?>
        </section>

        <section>
            <label for="precio">P. Total</label>
            <input style="color: #c57485;" type="text" onfocus="this.blur()" name="precio" id="precio" readonly="readonly" value="<?php echo $venta->precioTotal?>">
            
        </section>

        <input type="submit" value="Modificar Venta" name="modificarVenta">
        

    </form>

</main>