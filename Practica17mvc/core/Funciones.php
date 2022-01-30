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
    

?>