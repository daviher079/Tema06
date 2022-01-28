<table class="table">

<thead>
    <th>User</th>
    <th>Nombre</th>
    <th>Perfil</th>
    <th>Mostrar</th>
    <th>Borrar</th>
</thead>
<tbody>
<?php

    foreach ($lista as $value)
    {
        echo "<tr>";
        echo "<td>".$value->codUsuario."</td>";
        echo "<td>".$value->nombre."</td>";
        echo "<td>".$value->perfil."</td>";
        echo "<td><a href='index.php?mostrar=".$value->codUsuario."'>Mostrar</a></td>";
        echo "<td><a href='index.php?borrar=".$value->codUsuario."'>Borrar</a></td>";
    }
?>

</tbody>

</table>