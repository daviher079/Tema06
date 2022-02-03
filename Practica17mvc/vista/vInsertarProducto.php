<main class="mainModPerfil">
    <h2>Insertar Producto</h2>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        
        <section>
            <label for="codigo">C. Producto</label>
            <input type="text" name="codigo" id="codigo" value="<?php recordarGenerico("codigo", 'insertarProducto') ?>">
            <?php
                comprobarGenerico("codigo",'insertarProducto');
            ?>
        </section>

        <section>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php recordarGenerico("descripcion",'insertarProducto')?>">
            <?php
                comprobarGenerico("descripcion",'insertarProducto');
            ?>
        </section>

        <section>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" min="1" step="0.01" value="<?php recordarGenerico("precio",'insertarProducto')?>">
            
            <?php
                comprobarGenerico("precio",'insertarProducto');
            ?>
        </section>

        <section>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?php recordarGenerico("stock",'insertarProducto')?>">
            <?php
                comprobarGenerico("stock",'insertarProducto');
            ?>
        </section>
        
        <input type="submit" value="Insertar producto" name="insertarProducto">
            
    </form>
</main>