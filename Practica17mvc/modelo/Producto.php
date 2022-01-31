<?php


class Producto
{
    private $codigoProducto;
    private $descripcion;
    private $precio;
    private $stock;
    private $imagenAlta;
    private $imagenBaja;


    function __construct($codP, $desc, $precio, $stock, $imgAlta, $imgBaja)
    {
        $this->codigoProducto=$codP;
        $this->descripcion = $desc;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->imagenAlta = $imgAlta;
        $this->imagenBaja = $imgBaja; 
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $valor)
    {
        $this->name = $valor;
    }

    
} 


?>