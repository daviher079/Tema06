<?php
    if(isset($_POST['comprarProducto']))
    {
        
        $_SESSION['cantidad']=$_POST['cantidad'];
        $_SESSION['vista'] = $vistas['finalizarCompra'];
        require_once $vistas['layout'];
        
    }
    elseif(isset($_POST['volver']))
    {
        $_SESSION['pagina']='inicio';
        header('Location: index.php');
        exit();
    }elseif(isset($_POST['logout']))
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
        
    }elseif(isset($_POST['perfil']))
    {
        $_SESSION["pagina"] = "perfil";
        header("Location: index.php");
        exit();
    }elseif(isset($_POST['finalizarCompra']))
    {
            
        generarVenta();
        //funcion que genera una compra

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
    
    }
    else
    {
        
        
        //que sea la primera vez que se entra en login
        $_SESSION['vista'] = $vistas['finalizarCompra'];
        require_once $vistas['layout'];
    }


?>