<?php


class Albaran
{
    private $codigoAlbaran;
    private $fechaAlbaran;
    private $codigoProducto;
    private $cantidad;
    private $usuarioNickA;


    function __construct($codigoAlbaran, $fechaAlbaran, $codigoProducto, $cantidad, $usuarioNickA)
    {
        $this->codigoAlbaran=$codigoAlbaran;
        $this->fechaAlbaran = $fechaAlbaran;
        $this->codigoProducto = $codigoProducto;
        $this->cantidad = $cantidad;
        $this->usuarioNickA = $usuarioNickA; 
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