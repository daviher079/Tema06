<main class="mainModPerfil">
    <h2>Modificar Albaran</h2>
    <?php
    
        $albaran = AlbaranDAO::buscaById($_SESSION['codigoAlbaran']);

    ?>
    <form action="<?php self();?>" method="post">

        <input type="hidden" name="cantidadAntigua" value="<?php //echo $venta->cantidad;?>">
        <section>
            <label for="idAlbaran">Id Albaran</label>
            <input style="color: #c57485;" type="text" onfocus="this.blur()" name="idAlbaran" id="idAlbaran" readonly="readonly" value="<?php echo $albaran->codigoAlbaran ?>">
        </section>

        <section>
            <label for="fechaAlbaran">Fecha Albaran</label>
            <input type="date" name="fechaAlbaran" id="fechaAlbaran" value="<?php recordarGenericoMod("fechaAlbaran", $albaran->fechaAlbaran,'modificarAlbaran')?>">
            <?php
                comprobarGenerico("fechaAlbaran","modificarAlbaran");
            ?>
        </section>

        <section>
            <label for="codigoProducto">Código Producto</label>
            <input type="text" style="color: #c57485;" onfocus="this.blur()" name="codigoProducto" readonly="readonly" id="codigoProducto" value="<?php  echo $albaran->codigoProducto ?>">
                                                                    
            
        </section>

        <section>
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="<?php recordarGenericoMod("cantidad", $albaran->cantidad,'modificarAlbaran')?>">
            
            <?php
                comprobarGenerico("cantidad", "modificarAlbaran");
            ?>
        </section>

        <section>
            <label for="usuarioNickA">Usuario</label>
            <input style="color: #c57485;" type="text" onfocus="this.blur()" name="usuarioNickA" id="usuarioNickA" readonly="readonly" value="<?php echo $albaran->usuarioNickA?>">
            
        </section>

        <input type="submit" value="Modificar Venta" name="modificarAlbaran">
        

    </form>

</main>