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

    ProductoM::funcionStatica();

    //objeto instanciado que pertenece a una clase

    if($productoM instanceof ProductoM)
    {
        echo "<p>Pertenece</p>";
    }else
    {
        echo "<p>No Pertenece</p>";
    }

    //metodos de una clase
    print_r(get_class_methods("ProductoM"));

    //si existe una clase

    if(class_exists('ProductoL'))
    {
        echo "<p>Existe</p>";
    }else
    {
        echo "<p>No existe</p>";
    }

    /*class_alias('Producto', 'Articulo');
    $art= new Articulo();

    if($art instanceof Producto)
    {
        echo"Perteneces";
    }else{
        echo"No perteneces";
    }*/

    if(method_exists('Producto', 'muestra'))
    {
        echo "Si existe el metodo";
    }else
    {
        echo "No existe el metodo";
    }    
    

    //a los que puedes acceder
    //atributos de clase
    print_r(get_class_vars('ProductoM'));
    //atributos de objeto
    print_r(get_object_vars($productoM));

    if(property_exists('ProductoM', 'id'))
    {
        echo "Existe <br>";
    }

    $p1=new ProductoM(1, 'raton', 100);
    $p2 = new ProductoM(1, 'raton', 100);
    //Compara un objeto según sus atributos
    if($p1 == $p2)
    {
        echo "Es igual <br>";
    }else
    {
        echo "No es igual <br>";
    }

    $p3 = $p1;
    if($p1 === $p3)
    {
        echo "Es igual <br>";
    }else
    {
        echo "No es igual <br>";
    }

    //Serializar un objeto

    $serializado = serialize($p1);
    //$objetoNuevo = unserialize($p1);

    setcookie("objetoPrueba", $serializado, time()+123456);

    echo "<a href='./ejemploserialize.php'>Prueba Serializable</a>";






?>