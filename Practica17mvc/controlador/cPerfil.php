<?php

if(isset($_POST['logout']))
{

    unset($_SESSION['validada']);
    session_destroy();

    if(isset($_COOKIE['recuerdame']))
    {
        setcookie('recuerdame[0]',$_COOKIE['recuerdame'][0], time()-31536000, "/" );
        setcookie('recuerdame[1]',$_COOKIE['recuerdame'][1], time()-31536000, "/" );

    }

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