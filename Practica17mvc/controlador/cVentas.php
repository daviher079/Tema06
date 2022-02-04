<?php

if(isset($_POST['volver']))
{

    $_SESSION['pagina']='inicio';
    header('Location: index.php');
    exit();

}
elseif(isset($_POST['login']))
{
    $_SESSION['pagina']='login';
    header('Location: index.php');
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
    
}else if(isset($_POST['perfil']))
{
    $_SESSION["pagina"] = "perfil";
    header("Location: index.php");
    exit();
}elseif(isset($_POST['producto']))
{
    $_SESSION["pagina"] = "cProducto";
    $controlador=$controladores[$_SESSION['pagina']];
    require_once $controlador;
    
}elseif(isset($_POST['verProductos']))
{

    $_SESSION["pagina"] = "cProducto";
    $controlador=$controladores[$_SESSION['pagina']];
    require_once $controlador;

}elseif(isset($_POST['listaDeseos']))
{
    
    $_SESSION["pagina"] = "cProducto";
    $controlador=$controladores[$_SESSION['pagina']];
    require_once $controlador;

}elseif (isset($_POST['insertarProductos'])) {

    $_SESSION["pagina"] = "cProducto";
    $controlador=$controladores[$_SESSION['pagina']];
    require_once $controlador;

}elseif(isset($_POST['modificarProductos']))
{

    $_SESSION["pagina"] = "cProducto";
    $controlador=$controladores[$_SESSION['pagina']];
    require_once $controlador;

}else
{
    if(isset($_POST['modVenta']))
    {
        $_SESSION['vista']= $vistas['modVenta'];
        require_once $vistas['layout'];
    }else
    {
        $_SESSION['vista']= $vistas['verVentas'];
        require_once $vistas['layout'];

    }
}


?>