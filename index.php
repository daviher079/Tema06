<?php

    require_once("./Producto.php");
    require_once("./ProductoMagico.php");

    $producto = new Producto('PR01', "Camiseta Real Betis", 1200);
    $producto->setId('PR01');
    $producto->setDescripcion('Camiseta Real Betis');
    $producto->setPVP(60);
    
    echo $producto->getId();
    echo $producto->getDescripcion();
    echo $producto->getPVP();

    $producto->muestra();

    echo "<h1>PRODUCTO MÁGICO</h1>";

    $productoM=new ProductoM('PR01', "Camiseta Real Betis", 1200);
    $productoM->muestra();
    echo $productoM->__get("id");
    echo $productoM->id;

    $productoM->__set("id", "PR02");
    $productoM->__set("descripcion", "Camiseta Real Betis Nabil Fekir");

    $productoM->id='PR03';
    echo $productoM->id."</br>";
    //$productoM->__toString();

    echo ProductoM::$numeroProducto."<br>";



?>