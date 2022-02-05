<?php

class AlbaranDAO implements DAO
{

    public static function findAll()
    {
        $sql = "select * from albaran";

        $consulta = ConexionBD::ejecutaConsulta($sql, []);
        $cont =0;
        $registros = array();
        
        while($row = $consulta->fetchObject())
        {
            $albaran = new Albaran($row->idAlbaran,
                $row->fechaAlbaran, $row->codigoProductoA, $row->cantidad, $row->usuarioNickA);
                $registros[$cont]=$albaran;
                $cont++;

        }
        return $registros;

    }

    
    //Busca por clave primaria
    public static function buscaById($id)
    {
        $sql = "select * from albaran where idAlbaran = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$id]);
        $usuario =null;

        while($row = $consulta->fetchObject())
        {
            $albaran = new Albaran($row->idAlbaran, $row->fechaAlbaran, $row->codigoProductoA, $row->cantidad, $row->usuarioNickA);  
        }

        return $albaran;
    }

    //modifica o actualiza
    public static function update($objeto)
    {
        $consulta = 0;
        $sql="update albaran 
        set fechaAlbaran = ?, 
        codigoProductoA = ?, 
        cantidad = ?,  
        usuarioNickA = ?
        WHERE idAlbaran = ?";
            
        $parametros = array($objeto->fechaAlbaran, $objeto->codigoProducto, $objeto->cantidad, $objeto->usuarioNickA, $objeto->codigoAlbaran);


        $consulta = ConexionBD::ejecutaTransaccion($sql, $parametros);
    
        return $consulta;
    }
    
    //crea o inserta 
    public static function save($objeto)
    {
        $consulta = 0;
        $sql = "insert into albaran values(idAlbaran,?,?,?,?)";
        $parametros = array($objeto->fechaAlbaran, $objeto->codigoProducto, $objeto->cantidad, $objeto->usuarioNickA);

        $consulta = ConexionBD::ejecutaTransaccion($sql, $parametros);

        return $consulta;
    }

        /***
    
    private $codigoProducto;
    private $cantidad;
    private $usuarioNickA;
     */

    //borrar
    public static function delete($objeto)
    {
        $sql = "delete from albaran where idAlbaran = ?";
        $parametros = array($objeto);
        ConexionBD::ejecutaTransaccion($sql, $parametros);
    }
        

    public static function muestra()
    {
        echo "Ejemplo de la interfaz otraInterfaz";
    }


}

?>