<main class="mainModPerfil">
                
    <h2>Mostrar ventas</h2>
    <?php
        
        $arrayVentas=VentaDAO::findAll();

        if(count($arrayVentas)==0)
        {
            echo "<h2>No hay ventas</h2>";
        }else
        {
        echo "<table>";
            echo "<thead>";
                echo "<tr>";
                    echo "<td>id Venta</td>";
                    echo "<td>usuario</td>";
                    echo "<td>Fecha</td>";
                    echo "<td>Codigo Producto</td>";
                    echo "<td>Cantidad</td>";
                    echo "<td>Precio total</td>";
                    if($_SESSION['perfil']=='ADM01')
                    {
                        echo "<td>Modificar</td>";
                        echo"<td>Borrar</td>";
                    }    
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                foreach ($arrayVentas as $key => $value) 
                {

                    $venta =new Venta($value->codigoVenta, $value->UsuarioNickV, $value->fechaCompra, $value->codigoProductoV, $value->cantidad, $value->precioTotal);
                    echo "<tr>";
                        echo"<td>".$venta->codigoVenta."</td>";
                        echo"<td>".$venta->UsuarioNickV."</td>";
                        echo"<td>".$venta->fechaCompra."</td>";
                        echo"<td>".$venta->codigoProductoV."</td>";
                        echo"<td>".$venta->cantidad."</td>";
                        echo"<td>".$venta->precioTotal."</td>";
                        
                        if($_SESSION['perfil']=='ADM01')
                        {
                            echo "<form action='". $_SERVER['PHP_SELF']."' method='post'>";
                                echo "<td><input type='submit' id ='ventaMod' value='Modificar' name='modVenta'></td>";
                                echo "<td><input type='submit' id ='ventaDel' value='Borrar' name='BorrarVenta'></td>";
                                echo "<input type='hidden' name='codigo' value='$venta->codigoVenta'>";
                            echo "</form>";    
                        }    
                    echo"</tr>";
                }
            echo "</tbody>";
        
        echo "</table>";
            }
    ?>
            </main>