<?php



class UsuarioDAO implements DAO
{

    public static function findAll()
    {
        $sql = "select * from usuarios";
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