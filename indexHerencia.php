<?php
    require "./Ordenador.php";

    $productoGenerico=new Producto();
    $productoGenerico->setId(1);
    $productoGenerico->setDescripcion('Raton');
    $productoGenerico->setPVP(12);
    
    //$producroGenerico->muestra();

    $ordenador1=new Ordenador();
    $ordenador1->setId(2);
    $ordenador1->setDescripcion("Ordenador HP");
    $ordenador1->setPVP(600);
    $ordenador1->setRAM("8GB");
    $ordenador1->setDiscoDuro("1TB SSD");
    $ordenador1->muestra();

    $ordenador1->aumentaPrecio(5);
    $ordenador1->muestra();




?>