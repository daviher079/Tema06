<?php

class VentaDAO implements DAO
{


    public static function findAll()
    {
        $sql = "select * from venta";

        $consulta = ConexionBD::ejecutaConsulta($sql, []);
        $cont =0;
        
        
        while($row = $consulta->fetchObject())
        {
            $venta = new Venta($row->codigoVenta,
                $row->UsuarioNickV, $row->fechaCompra, $row->codigoProductoV, $row->cantidad, $row->precioTotal);
                $registros[$cont]=$venta;
                $cont++;

        }
        return $registros;

    }

    public static function validaUser($user, $pass)
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
    }

    //Busca por clave primaria
    public static function buscaById($id)
    {
        $sql = "select * from usuarios where usuario = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$id]);
        $usuario =null;

        while($row = $consulta->fetchObject())
        {
            $usuario = new Usuario($row->usuario, $row->nombre, $row->clave, $row->correo, $row->fechaNacimiento, $row->perfil);  
        }

        return $usuario;
    }

    //modifica o actualiza
    public static function update($objeto)
    {
        $consulta = 0;
        $sql="update usuarios 
            set clave = ?, 
            nombre = ?, 
            correo = ?, 
            fechaNacimiento = ?,
            perfil = ? 
            WHERE usuario = ?";
            
        $parametros = array($objeto->clave, $objeto->nombre, $objeto->correo, $objeto->fechaNacimiento, $objeto->perfil, $objeto->usuario);

        $arrayParametros = [
            $sql => $parametros
        ];

        $consulta = ConexionBD::ejecutaTransaccion($arrayParametros);
    
        return $consulta;
    }
    
    //crea o inserta 
    public static function save($objeto)
    {
        $consulta = 0;
        $sql = "insert into usuarios values(?,?,?,?,?,?)";
        $parametros = array($objeto->usuario, $objeto->clave, $objeto->nombre, $objeto->correo, $objeto->fechaNacimiento, $objeto->perfil);

        $arrayParametros = [
            $sql => $parametros
        ];
        $consulta = ConexionBD::ejecutaTransaccion($arrayParametros);

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