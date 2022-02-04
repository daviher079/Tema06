<?php

class ProductoDAO implements DAO
{

    public static function findAll()
    {
        $sql = "select * from productos";

        $consulta = ConexionBD::ejecutaConsulta($sql, []);
        $cont =0;
        
        
        while($row = $consulta->fetchObject())
        {
            $producto = new Producto($row->codigoProducto,
                $row->descripcion, $row->precio, $row->stock, $row->imagenAlta, $row->imagenBaja);
                $registros[$cont]=$producto;
                $cont++;

        }
        return $registros;

    }

    //Busca por clave primaria

    public static function buscaById($id)
    {
        $sql = "select * from productos where codigoProducto =?;";

        $consulta = ConexionBD::ejecutaConsulta($sql, [$id]);
        $producto = null;

            while($row = $consulta->fetchObject())
            {
                $producto = new Producto($row->codigoProducto,
                    $row->descripcion, $row->precio, $row->stock, 
                    $row->imagenAlta, $row->imagenBaja
                );
                    
            }

        return $producto;
    }

    //modifica o actualiza
    public static function update($objeto)
    {
        $sql="update productos 
        set descripcion = ?, 
        precio = ?, 
        stock = ? 
        WHERE codigoProducto = ?";

        $parametros= array($objeto->descripcion, $objeto->precio, $objeto->precio, $objeto->codigoProducto);
        
        ConexionBD::ejecutaTransaccion($sql, $parametros);

    }

    public static function updateStock($objeto, $cantidad)
    {
        
        $sql = "update productos SET stock = stock - ? where codigoProducto = ?;";
        $parametros = array($cantidad, $objeto->codigoProducto);
        ConexionBD::ejecutaTransaccion($sql, $parametros);

    }
    

    public static function updateStockModVenta($objeto, $cantidad)
    {
        
        $sql = "update productos SET stock = ? where codigoProducto = ?;";
        $parametros = array($cantidad, $objeto->codigoProducto);
        ConexionBD::ejecutaTransaccion($sql, $parametros);
    

    }


    //crea o inserta 
    public static function save($objeto)
    {
        $sql = "insert into productos values(?,?,?,?,?,?)";
        $parametros= array($objeto->codigoProducto, $objeto->descripcion, $objeto->precio, $objeto->stock, $objeto->imagenAlta, $objeto->imagenBaja);
        $consulta = ConexionBD::ejecutaTransaccion($sql, $parametros);

    }

    //borrar
    public static function delete($objeto)
    {
        
        
    }
        

    public static function muestra()
    {
        echo "Ejemplo de la interfaz otraInterfaz";
    }


}

?>