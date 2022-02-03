<main class="mainModPerfil">

    <h2>Modificar Productos</h2>
    <?php
        $arrayProductos=ProductoDAO::findAll();

        if(count($arrayProductos)==0)
        {
            echo "<h2>No Productos</h2>";
        }else
        {
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<td>Codigo Producto</td>";
                        echo "<td>Descripción</td>";
                        echo "<td>Precio</td>";
                        echo "<td>Stock</td>";
                        echo "<td>Modificar</td>";
                        echo"<td>Borrar</td>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
    
                foreach ($arrayProductos as $key => $value) {
                    $producto =new Producto($value->codigoProducto, $value->descripcion, $value->precio, $value->stock, $value->imagenAlta, $value->imagenBaja);
                        
                        echo "<tr>";
                        echo"<td>".$producto->codigoProducto."</td>";
                        echo "<td>".$producto->descripcion."</td>";
                        echo "<td>".$producto->precio."</td>";
                        echo "<td>".$producto->stock."</td>";
                        echo "<form action='". $_SERVER['PHP_SELF']."' method='post'>";
                        echo "<td><input type='submit' id ='producto' value='Modificar' name='modProducto'></td>";
                        echo "<td><input type='submit' id ='producto' value='Borrar' name='deleteProducto'></td>";
                        echo "<input type='hidden' name='codigo' value='$producto->codigoProducto'>";
                            //echo "<td><a href='./modificarAlbaran.php?codigo=".$producto->codigoProducto."'>Modificar</a></td>";
                            //echo "<td><a href='./borrarAlbaran.php?codigo=".$producto->codigoProducto."'>Borrar</a></td>";
                        echo "</form>";    
                        echo"</tr>";
                }
                echo "</tbody>";
        
            echo "</table>";
        }
    ?>
   

</main>