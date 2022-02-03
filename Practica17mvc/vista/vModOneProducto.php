<main class="mainModPerfil">
    <h2>Modificar Producto</h2>
    <?php
    
    $producto = ProductoDAO::buscaById($_SESSION['codigoProducto']);

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">        
        <section>
            <label for="codigo">C. Producto</label>
            <input style="color: #c57485;" type="text" onfocus="this.blur()" name="codigo" id="codigo" readonly="readonly" value="<?php echo $producto->codigoProducto ?>">
        </section>

        <section>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php recordarGenericoMod("descripcion",$producto->descripcion, "modificarProducto")?>">
            <?php
                comprobarGenerico("descripcion", "modificarProducto");
            ?>
        </section>

        <section>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" min="1" value="<?php recordarGenericoMod("precio",$producto->precio, "modificarProducto")?>">
            
            <?php
                comprobarGenerico("precio", "modificarProducto");
            ?>
        </section>

        <section>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?php recordarGenericoMod("stock", $producto->stock, "modificarProducto")?>">
            
        </section>

        <input type="submit" value="Modificar producto" name="modificarProducto">
    </form>

</main>