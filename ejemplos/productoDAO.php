<?php

require_once("./DAO.php");
require_once("./otraInterfaz.php");

class ProductoDAO implements DAO, otraInterfaz
{


    public static function findAll()
    {
        echo "findAll";
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