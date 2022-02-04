<form action="<?php self();?>" method="post">

    <input type="hidden" name="cantidadArray" value="<?php echo $arrayDatos[4];?>">
    <section>
        <label for="idVenta">Id Venta</label>
        <input style="color: #c57485;" type="text" onfocus="this.blur()" name="idVenta" id="idVenta" readonly="readonly" value="<?php echo $arrayDatos[0] ?>">
    </section>

    <section>
        <label for="usuario">Usuario</label>
        <input style="color: #c57485;" type="text" onfocus="this.blur()" name="usuario" id="usuario" readonly="readonly" value="<?php echo $arrayDatos[1]?>">
        
    </section>

    <section>
        <label for="fecha">F. Compra</label>
        <input type="date" name="fecha" id="fecha" value="<?php recordarGenerico("fecha",$arrayDatos[2])?>">
        
        <?php
            comprobarGenerico("fecha");
        ?>
    </section>

    <section>
        <label for="codigoProducto">C. Producto</label>
        <input style="color: #c57485;" type="text" onfocus="this.blur()" name="codigoProducto" id="codigoProducto" readonly="readonly" value="<?php echo $arrayDatos[3]?>">
        
    </section>

    <section>
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="<?php recordarGenerico("cantidad",$arrayDatos[4])?>">
        
        <?php
            comprobarGenerico("cantidad");
        ?>
    </section>

    <section>
        <label for="precio">P. Total</label>
        <input style="color: #c57485;" type="text" onfocus="this.blur()" name="precio" id="precio" readonly="readonly" value="<?php echo $arrayDatos[5]?>">
        
    </section>

    <input type="submit" value="Modificar Venta" name="modificarVenta">
    

</form>