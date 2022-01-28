<?php
//si se ha pulsado el registro

if(isset($_POST['registro']))
{
    $_SESSION['pagina']='registro';
    header('Location: index.php');
    exit();
}elseif(isset($_POST['iniciar']))
{
    //que haya rellenado los campos y verifique si existe el usuario
    $todoOK =true;
    //llamamos al valida y retorna true/false

    if($todoOK)
    {
        $user = $_POST['nombre'];
        $pass = $_POST['pass'];
        $pass = hash("SHA256", $pass);

        $usuario = UsuarioDAO::validaUser($user, $pass);

        if($usuario != null)
        {
                echo "bien";
                $_SESSION['validada']=true;
                $_SESSION['user']=$usuario->codUsuario;
                $_SESSION['nombre']=$user;
                $_SESSION['perfil']=$usuario->perfil;
                $_SESSION['pagina']='inicio';
                header('Location: index.php');
        }else
        {
           $_SESSION['mensaje'] = "No existe el usuario";
           $_SESSION['vista'] = $vistas['login']; 
           require_once $vistas['layout'];
        }

    }

}elseif(isset($_POST['volver']))
{
    $_SESSION['pagina']='inicio';
    header('Location: index.php');
    exit();
}else
{
    //que sea la primera vez que se entra en login
    $_SESSION['vista'] = $vistas['login']; 
    require_once $vistas['layout'];
}

?>