<?php


class Venta
{
    private $codigoVenta;
    private $UsuarioNickV;
    private $fechaCompra;
    private $codigoProductoV;
    private $cantidad;
    private $precioTotal;


    function __construct($codV, $userNV, $fCompra, $codProdV, $cantidad, $precioTotal)
    {
        $this->codigoVenta=$codV;
        $this->UsuarioNickV = $userNV;
        $this->fechaCompra = $fCompra;
        $this->codigoProductoV = $codProdV;
        $this->cantidad = $cantidad;
        $this->precioTotal = $precioTotal; 
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