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
elseif(isset($_POST['modificarPerfil']))
{
    //al modificar vuelve a la misma
    //pagina pero con los datos nuevos

    $boton ='modificarPerfil';

    if(validarNombreComp($boton)==true && validarMail($boton) == true && validarFecha($boton) ==true && validarPass($boton)==true)
    {
        
            $con= new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $preparada=$con->prepare("update usuarios 
                    set clave = ?, 
                    nombre = ?, 
                    correo = ?, 
                    fechaNacimiento = ?,
                    perfil = ? 
                    WHERE usuario = ?");
            $con->beginTransaction();

            $user=$_REQUEST['user'];
            $nCompleto=$_REQUEST['nCompleto'];
            $_SESSION['nombre']=$nCompleto;
            $cElectronico=$_REQUEST['correo'];
            $fecha=$_REQUEST['fecha'];
            $pass=$_REQUEST['pass'];
            $perfil=$_SESSION['perfil'];

            $arrayParametros=array($pass, $nCompleto, $cElectronico, $fecha, $perfil, $user);
            $preparada->execute($arrayParametros);    

            $con->commit();
            $preparada->closeCursor();
        
        

        $bandera=true;
    }   
    else{
        
        $bandera = false;
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



}elseif(isset($_POST['verProductos']))
{
    $_SESSION["pagina"] = "verProductos";
    header("Location: index.php");
    exit();
}else
{

    //Suponiendo que es mi perfil
    $_SESSION['vista']= $vistas['perfil'];
    require_once $vistas['layout'];
}


?>