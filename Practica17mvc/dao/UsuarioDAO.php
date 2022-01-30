<?php



class UsuarioDAO implements DAO
{

    public static function findAll()
    {
        $sql = "select * from usuarios";

        $consulta = ConexionBD::ejecutaConsulta($sql, []);
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

    public static function paginasUsuario($perfil)
    {
        $sql = "select descripcion, url 
                from paginas p join accede a 
                on (p.codigo = a.codigoPagina)
                where codigoPerfil = ?";
        $consulta = ConexionBD::ejecutaConsulta($sql, [$perfil]);
                        
        $paginas=array();

        while($row=$consulta->fetch())
        {
            $paginas[$row[0]]=$row[1];
        }
        
        return $paginas;
        
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