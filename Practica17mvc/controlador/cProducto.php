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

    if(isset($_POST['codigo']))
    {
        $_SESSION['codigoProducto']=$_POST['codigo'];

    }

    $_SESSION['vista'] = $vistas['comprarProducto'];
    require_once $vistas['layout'];
    
}elseif(isset($_POST['listaDeseos']))
{
    
    $_SESSION['vista'] = $vistas['listaDeseos'];
    require_once $vistas['layout'];

}elseif(isset($_POST['verProductos']))
{

    $_SESSION['vista'] = $vistas['verProductos']; 
    require_once $vistas['layout'];

}elseif (isset($_POST['insertarProductos'])) {

    $_SESSION['vista'] = $vistas['insertarProducto'];
    require_once $vistas['layout'];

}elseif(isset($_POST['modificarProductos']))
{
    if(isset($_POST['modProducto']))
    {
        //modOneProducto

        if(isset($_POST['codigo']))
        {
            $_SESSION['codigoProducto']=$_POST['codigo'];

        }

        $boton ='modificarProducto';

        if(validarNombreComp($boton)==true && validarMail($boton) == true && validarFecha($boton) ==true && validarPass($boton)==true)
        {
            

            $user=$_REQUEST['user'];
            $encrip = sha1($_REQUEST['pass']);
            $nCompleto=$_REQUEST['nCompleto'];
            $cElectronico=$_REQUEST['correo'];
            $fecha=$_REQUEST['fecha'];
            $perfil=$_SESSION['perfil'];
            $_SESSION['nombre']=$nCompleto;
            $usuarioAct = new Usuario($user, $nCompleto, $encrip, $cElectronico, $fecha, $perfil);

            if(UsuarioDAO::update($usuarioAct)!=0)
            {
                $_SESSION['pagina']='perfil';
                header('Location: index.php');
            }


        
        }else
        {
            $_SESSION['vista'] = $vistas['modOneProducto'];
            require_once $vistas['layout'];
        }   

    }else
    {
        $_SESSION['vista'] = $vistas['modificarProducto'];
        require_once $vistas['layout'];
    }

}else
{
    
    if($_SESSION['vista']==$vistas['listaDeseos'])
    {
       
        $_SESSION['vista'] = $vistas['listaDeseos'];
        require_once $vistas['layout'];

    }
    elseif($_SESSION['vista']==$vistas['comprarProducto'])
    {

        if(isset($_POST['codigo']))
        {
            $_SESSION['codigoProducto']=$_POST['codigo'];

        }

        $_SESSION['vista'] = $vistas['comprarProducto'];
        require_once $vistas['layout'];

    }elseif($_SESSION['vista']==$vistas['insertarProducto'])
    {

        $_SESSION['vista'] = $vistas['insertarProducto'];
        require_once $vistas['layout'];
    
    }elseif($_SESSION['vista']==$vistas['modificarProducto'])
    {

        if(isset($_POST['modProducto']))
        {
            //modOneProducto
    
            if(isset($_POST['codigo']))
            {
                $_SESSION['codigoProducto']=$_POST['codigo'];
    
            }
    
            $boton ='modificarProducto';

            $codigo = $_REQUEST['codigo'];
            $descripcion = $_REQUEST['descripcion'];
            $precio = (float)$_REQUEST['precio'];
            $stock = (int)$_REQUEST['stock'];
    
            if(validarDescripcion($descripcion, $boton)==true && validarPrecio($precio, $boton)==true && validarStock($stock, $boton) ==true)
            {
                
    
                $sql="update productos 
                set descripcion = ?, 
                precio = ?, 
                stock = ? 
                WHERE codigoProducto = ?";
    
                if(UsuarioDAO::update($usuarioAct)!=0)
                {
                    /*$_SESSION['pagina']='perfil';
                    header('Location: index.php');*/
                    $_SESSION['vista'] = $vistas['modificarProducto'];
                    require_once $vistas['layout'];
                }
    
    
            
            }else
            {
                $_SESSION['vista'] = $vistas['modOneProducto'];
                require_once $vistas['layout'];
            }   
    
        }else
        {
            $_SESSION['vista'] = $vistas['modificarProducto'];
            require_once $vistas['layout'];
        }
    
    }elseif($_SESSION['vista']==$vistas['modOneProducto'])
    {
        if(isset($_POST['codigo']))
            {
                $_SESSION['codigoProducto']=$_POST['codigo'];
    
            }
    
            $boton ='modificarProducto';
    
            if(validarNombreComp($boton)==true && validarMail($boton) == true && validarFecha($boton) ==true && validarPass($boton)==true)
            {
                
    
                $user=$_REQUEST['user'];
                $encrip = sha1($_REQUEST['pass']);
                $nCompleto=$_REQUEST['nCompleto'];
                $cElectronico=$_REQUEST['correo'];
                $fecha=$_REQUEST['fecha'];
                $perfil=$_SESSION['perfil'];
                $_SESSION['nombre']=$nCompleto;
                $usuarioAct = new Usuario($user, $nCompleto, $encrip, $cElectronico, $fecha, $perfil);
    
                if(UsuarioDAO::update($usuarioAct)!=0)
                {
                    $_SESSION['pagina']='perfil';
                    header('Location: index.php');
                }
    
    
            
            }else
            {
                $_SESSION['vista'] = $vistas['modOneProducto'];
                require_once $vistas['layout'];
            }   
    }

    else
    {
        
        $_SESSION['vista'] = $vistas['verProductos']; 
        require_once $vistas['layout'];

    }

    
}

?>