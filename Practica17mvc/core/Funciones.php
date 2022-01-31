<?php
    define("PATRONNOMBRECOMPLETO", '/[A-Z]{1}[a-z]{2,}\s[A-Z]{1}[a-z]{2,}\s[A-Z]{1}[a-z]{2,}/');
    define("PATRONCONTRASEÑA", '/^[A-Za-z0-9]{5,}([A-Z]{1}[a-z]{1}[0-9]{1})$/');
    function br()
    {
        echo"<br/>";
    }

    function h1($cadena)
    {
        echo "<h1>",$cadena,"</h1>";
    }

    function p($cadena)
    {
        echo "<p>".$cadena."</p>";
    }

    function self()
    {
        return basename($_SERVER['SCRIPT_FILENAME']);
    }

    function label($cadena)
    {
        echo "<label style='color:red; font-family: monospace;'>".$cadena."</label>";
    }

    function inputNumber($valor)
    {
        echo "<input type='number' id='".$valor."' name='".$valor."' value='".$valor."' min='0' max='10'>";
    }
    
    function recuerdame()
    {
        
        $recuerdame=$_REQUEST['recordarme'];
        if($recuerdame=="on")
        {

            $user = $_REQUEST['user'];
            $pass = $_REQUEST['pass'];
            $encrip=sha1($pass);
            setcookie('recuerdame[0]',$user, time()+31536000, "/" );
            setcookie('recuerdame[1]',$encrip, time()+31536000, "/" );
        }
        
    }

    function recordarGenerico($var, $boton){
        if(!empty($_REQUEST[$var])&& isset($_REQUEST[$boton]))
        {
            echo $_REQUEST[$var];        
        }
    }

    function comprobarGenerico($var, $boton){
        if(empty($_REQUEST[$var]) && isset($_REQUEST[$boton])){
            
            label("Debe haber un campo ".$var);
        }           
    }

    function expresionGenerico($patron, $var, $boton){
        
        $bandera=true;
        $valida = preg_match($patron, $var);
        if(!empty($var) && isset($_REQUEST[$boton]) && $valida==false)
        {
            $bandera=false;
        }

        return $bandera;
    }

    function validarUsuario($boton)
    {
        $bandera=false;
        if(!empty($_REQUEST['user']) && isset($_REQUEST[$boton]))
        {
            if(UsuarioDAO::buscarUser($_REQUEST['user'])==true)
            {
                $bandera = true;
            }else
            {
                $bandera = false;
            }
    
        }
        return $bandera;
    }

    function validarNombreComp($boton)
    {
        $bandera=true;
        if(!empty($_REQUEST['nCompleto']) && isset($_REQUEST[$boton]) && expresionGenerico(PATRONNOMBRECOMPLETO, $_REQUEST['nCompleto'], $boton)==true)
        {
            $bandera=true;    
        }
        else
        {
            $bandera=false;
        }
        return $bandera;
    }

    function validarMail($boton)
    {
        $bandera=true;
        if(!empty($_REQUEST['correo']) && isset($_REQUEST[$boton]))
        {
            $bandera=true;    
        }
        else
        {
            $bandera=false;
        }
        return $bandera;
    }

    function validarFecha($boton)
    {
        $bandera=true;
        if(!empty($_REQUEST['fecha']) && isset($_REQUEST[$boton]))
        {
            $bandera=true;    
        }
        else
        {
            $bandera=false;
        }
        return $bandera;
    }

    function validarPass($boton)
    {
        $bandera=false;
        if(!empty($_REQUEST['pass']) && !empty($_REQUEST['rPass']) && isset($_REQUEST[$boton]))
        {
            if($_REQUEST['pass']==$_REQUEST['rPass'])
            {
                if(expresionGenerico(PATRONCONTRASEÑA, $_REQUEST['pass'], $boton)==true)
                {
                    $bandera=true;    
                }
            }
        }
        else
        {
            $bandera=false;
        }
        return $bandera;
    }


    function validarCompra()
    {
        /**
         * Si existe el boton de comprar producto en la varaible
         * superglobal request y la cantidad ha sido validada correctamente
         * devuelve true y ejecuta la compra
         */
        $bandera=true;
        if(isset($_REQUEST['comprarProducto'])==true)
        {
            if(validarCantidad()==true)
            {
                $bandera=true;
            }else
            {
                $bandera=false;
            }
            
        }else
        {
            $bandera=false;
        }

        return $bandera;
    }

    function comprobarCantidad(){
        /**
         * Para validar el numero de productos que el usuario ha comprado 
         * Si el input no esta vacio y la cantidad que solicita el usuario
         * no es mayor que la de stock se ejecutará la compra
         */
        if(!empty($_REQUEST['cantidad']) && isset($_REQUEST['comprarProducto'])){
            $cantidad = (int)$_REQUEST['cantidad'];
            $stockFinal = (int)$_REQUEST['stock'];

            if($cantidad>$stockFinal)
            {
                label("No puede superar el numero de stock disponible");

            }
            
        }   
        
        if(empty($_REQUEST['cantidad']) && isset($_REQUEST['comprarProducto']))
        {
            label("El Nº de unidades no puede estar vacio");
        }
    }

    function validarCantidad()
    {
        $bandera=true;
        if(!empty($_REQUEST['cantidad']) && isset($_REQUEST['comprarProducto']))
        {
            $cantidad = (int)$_REQUEST['cantidad'];
            $stockFinal = (int)$_REQUEST['stock'];
            if($cantidad>$stockFinal)
            {
                $bandera=false;
            }
        }
        else
        {
            $bandera=false;
        }  

        return $bandera;
    }
    

    function comprobarSesion()
    {
        $bandera=true;
            
        if(validaSession()==false)
        {
            $bandera=false;
        }
        return $bandera;
    }

?>