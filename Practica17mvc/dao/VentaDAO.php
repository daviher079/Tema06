<?php

class VentaDAO implements DAO
{


    public static function findAll()
    {
        $sql = "select * from venta";

        $consulta = ConexionBD::ejecutaConsulta($sql, []);
        $cont =0;
        $registros =array();
        
        while($row = $consulta->fetchObject())
        {
            $venta = new Venta($row->idVenta,
                $row->usuarioNickV, $row->fechaCompra,
                $row->codigoProductoV, $row->cantidad, $row->precioTotal);
                $registros[$cont]=$venta;
                $cont++;

        }
        return $registros;

    }

    

    //Busca por clave primaria
    public static function buscaById($id)
    {
        $sql = "select * from venta where idVenta = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$id]);
        $venta =null;

        while($row = $consulta->fetchObject())
        {
            $venta = new Venta($row->idVenta, $row->usuarioNickV, $row->fechaCompra, $row->codigoProductoV, $row->cantidad, $row->precioTotal);  
        }

        return $venta;
    }

    //modifica o actualiza
    public static function update($objeto)
    {
        $sql="update venta 
        set usuarioNickV = ?, 
        fechaCompra = ?, 
        codigoProductoV = ?,
        cantidad = ?,  
        precioTotal = ?
        WHERE idVenta = ?";
            
        $parametros = array($objeto->UsuarioNickV, $objeto->fechaCompra, $objeto->codigoProductoV, $objeto->cantidad, $objeto->precioTotal, $objeto->codigoVenta);

        $consulta = ConexionBD::ejecutaTransaccion($sql, $parametros);
    
        return $consulta;
    }
    
    //crea o inserta 
    public static function save($objeto)
    {
        $consulta = 0;
        $sql = "insert into venta values(idVenta,?,?,?,?,?)";
        $parametros = array($objeto->UsuarioNickV, $objeto->fechaCompra, $objeto->codigoProductoV, $objeto->cantidad, $objeto->precioTotal);

        $consulta = ConexionBD::ejecutaTransaccion($sql, $parametros);

        return $consulta;
    }

    //borrar
    public static function delete($objeto)
    {
        $sql = "delete from venta where idVenta = ?";
        $parametros = array($objeto);
        ConexionBD::ejecutaTransaccion($sql, $parametros);

    }
        

    public static function muestra()
    {
        echo "Ejemplo de la interfaz otraInterfaz";
    }


}

?>