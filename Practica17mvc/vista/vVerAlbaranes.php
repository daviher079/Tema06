<main class="mainModPerfil">
    <h2>Mostrar albaranes</h2>
    <?php
        
        $arrayAlbaranes=AlbaranDAO::findAll();

        if(count($arrayAlbaranes)==0)
        {
            echo "<h2>No hay albaranes</h2>";
        }else
        {
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<td>id Albaran</td>";
                        echo "<td>Fecha Albaran</td>";
                        echo "<td>Codigo Producto</td>";
                        echo "<td>Cantidad</td>";
                        echo "<td>Usuario</td>";
                        if($_SESSION['perfil']=='ADM01')
                        {
                            echo "<td>Modificar</td>";
                            echo"<td>Borrar</td>";
                        }    
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                /**
                 * En el array asociativo estan contenidos todos los albaranes
                 * y se van recorriendo para mostrarlos en una tabla
                 */
                    foreach ($arrayAlbaranes as $key => $value) {
                        $albaran =new Albaran($value->codigoAlbaran, $value->fechaAlbaran, $value->codigoProducto, $value->cantidad, $value->usuarioNickA);

                        
                        echo "<tr>";
                            echo"<td>".$albaran->codigoAlbaran."</td>";
                            echo"<td>".$albaran->fechaAlbaran."</td>";
                            echo"<td>".$albaran->codigoProducto."</td>";
                            echo"<td>".$albaran->cantidad."</td>";
                            echo"<td>".$albaran->usuarioNickA."</td>";
                            
                            if($_SESSION['perfil']=='ADM01')
                            {
                                echo "<form action='". $_SERVER['PHP_SELF']."' method='post'>";
                                    echo "<td><input type='submit' id ='albaranMod' value='Modificar' name='modAlbaran'></td>";
                                    echo "<td><input type='submit' id ='albaranDel' value='Borrar' name='BorrarAlbaran'></td>";
                                    echo "<input type='hidden' name='codigo' value='$albaran->codigoAlbaran'>";
                                echo "</form>";    
                            }    
                        echo"</tr>";
                    }
                echo "</tbody>";
            
            echo "</table>";
        }
    ?>
</main>