<?php
//si se ha pulsado el registro
if(isset($_POST['comprarProducto']))
{
    if(validarCompra($_REQUEST['cantidad'], $_REQUEST['stock'])==true)
        {
            //si la compra es correcta se comprueba si la sesion ha
            //ya ha sido validada si ha sido validada se genera la venta
            //sino te lleva login

            if(comprobarSesion()==false)
            {
                $_SESSION["pagina"] = "login";
                header("Location: index.php");
                exit();

            }else
            {
                $_SESSION["pagina"] = "finalizarCompra";
                $controlador=$controladores[$_SESSION['pagina']];
                require_once $controlador;

                //header("location: ./finalizarCompra.php?codigo=".$_REQUEST['codigo']."&stock=".$_REQUEST['stock']."&precio=".$_REQUEST['precio']."&unidades=".$_REQUEST['cantidad']."&descripcion=".$_REQUEST['descripcion']."&imagen=".$_REQUEST['imagen']);
            }

        }else
        {
            $_SESSION['vista'] = $vistas['comprarProducto'];
        require_once $vistas['layout'];
        }
}
elseif(isset($_POST['volver']))
{
    $_SESSION['pagina']='inicio';
    header('Location: index.php');
    exit();

}elseif(isset($_POST['login']))
{
    $_SESSION["pagina"] = "login";
    header("Location: index.php");
    exit();

}else if(isset($_POST['perfil']))
{
    $_SESSION["pagina"] = "perfil";
    header("Location: index.php");
    exit();

}else if(isset($_POST['logout']))
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
    
}elseif(isset($_POST['producto']))
{
    /*$_SESSION['pagina']='comprarProducto';
    header('Location: index.php');
    exit();*/
    if(isset($_POST['codigo']))
    {
        $_SESSION['codigoProducto']=$_POST['codigo'];

    }

    $_SESSION['vista'] = $vistas['comprarProducto'];
    require_once $vistas['layout'];
    
}elseif(isset($_POST['listaDeseos']))
{
    if(isset($_POST['accion']))
    {

        if($_POST['accion']=="true")
        {
            addDeseo($_POST['codigo']);
        }else
        {
            deleteDeseo($_POST['codigo']);
        }

    }
    $_SESSION['vista'] = $vistas['listaDeseos'];
    require_once $vistas['layout'];
}
else
{
    

    $_SESSION['vista'] = $vistas['verProductos']; 
    require_once $vistas['layout'];

    
}

?>