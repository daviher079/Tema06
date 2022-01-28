<?php

if(isset($_POST['logout']))
{

    unset($_SESSION['validada']);
    session_destroy();
    header("Location: index.php");
    exit();

}elseif(isset($_POST['volver']))
{
    
    $_SESSION['pagina']='inicio';
    header('Location: index.php');
    exit();
}
elseif(isset($_POST['modificar']))
{
    //al modificar vuelve a la misma
    //pagina pero con los datos nuevos
    $todoOK=true; //validar los datos introducidos

    if($todoOK)
    {

    }


   
}elseif(isset($_POST['usuarios']))
{

    if($_SESSION['perfil'] == 'admini')
    {
        $_SESSION['vista'] = $vistas['listaUsuarios'];

        $lista = UsuarioDAO::findAll();

        require_once $vistas['layout'];   
    }else
    {
        header('Location: 403Forbbiden.php');
        exit();
    }
}elseif(isset($_GET['mostrar']))
{

    if($_SESSION['perfil']=='admini')
    {
        $codUsuario = $_GET['mostrar'];
        $usuario = UsuarioDAO::buscaById($codUsuario);
        $_SESSION['vista']=$vistas['perfil'];
        require_once $vistas['layout'];
    }



}else
{

    //Suponiendo que es mi perfil
    $_SESSION['vista']= $vistas['perfil'];
    require_once $vistas['layout'];
}


?>