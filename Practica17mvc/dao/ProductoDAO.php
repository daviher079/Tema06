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

    /*public static function validaUser($user, $pass)
    {
        $sql = "select * from usuarios where usuario = ? and clave = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$user, $pass]);
        $usuario =null;

            while($row = $consulta->fetchObject())
            {
                $usuario = new Usuario($row->usuario,
                    $row->nombre, $row->clave, $row->correo, $row->fechaNacimiento, $row->perfil);
                    
            }

        
        return $usuario;
    }

    public static function buscarUser($user)
    {
        
        $bandera =false;

        $sql = "select usuario from usuarios;";

        $consulta = ConexionBD::ejecutaConsulta($sql, [$user]);
        
        
        while($row = $consulta->fetch())
        {
            $usuarioBD=$row['usuario'];
            if($usuarioBD==$user)
            {
                $bandera=true;
            }

        }
        return $bandera;
    }*/

    //Busca por clave primaria

    public static function buscaById($id)
    {
        $sql = "select * from productos where codigoProducto = ?;";

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
        echo "update ";
    }
    
    //crea o inserta 
    public static function save($objeto)
    {
        $consulta = 0;
        $sql = "insert into usuarios values(?,?,?,?,?,?)";
        $parametros = array($objeto->usuario, $objeto->clave, $objeto->nombre, $objeto->correo, $objeto->fechaNacimiento, $objeto->perfil);
        $consulta = ConexionBD::ejecutaTransaccion($sql, $parametros);

        return $consulta;
    }

    //borrar
    public static function delete($objeto)
    {
        echo "delete ";
    }
        

    public static function muestra()
    {
        echo "Ejemplo de la interfaz otraInterfaz";
    }


}

?>