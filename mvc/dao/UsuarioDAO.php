<?php



class UsuarioDAO implements DAO
{

    public static function findAll()
    {
        $sql = "select * from usuario";
        $consulta =ConexionBD::ejecutaConsulta($sql, []);
        $cont =0;
        while($row = $consulta->fetchObject())
        {
            $usuario = new Usuario($row->codUsuario,
                $row->nombre, $row->pass, $row->perfil);
                $registros[$cont]=$usuario;
                $cont++;

        }
        return $registros;

    }

    public static function validaUser($user, $pass)
    {
        $sql = "select * from usuario where codUsuario = ? and password = ?";
        $consulta =ConexionBD::ejecutaConsulta($sql, [$user, $pass]);
        $usuario =null;
        
        while($row = $consulta->fetchObject())
        {
            $usuario = new Usuario($row->codUsuario,
                $row->nombre, $row->password, $row->Perfil);
                

        }
        return $usuario;
    }

    //Busca por clave primaria
    public static function buscaById($id)
    {
        echo "buscaByID ".$id;
    }

    //modifica o actualiza
    public static function update($objeto)
    {
        echo "update ";
    }
    
    //crea o inserta 
    public static function save($objeto)
    {
        echo "save ";
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