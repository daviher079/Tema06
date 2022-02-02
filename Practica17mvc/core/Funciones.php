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

    function recordarGenerico($var, $boton)
    {
        if(!empty($_REQUEST[$var])&& isset($_REQUEST[$boton]))
        {
            echo $_REQUEST[$var];        
        }
    }

    function recordarGenericoMod($var, $nombre, $boton){
        if(!empty($_REQUEST[$var])&& isset($_REQUEST[$boton]))
        {
            echo $_REQUEST[$var];        
        }else
        {
            echo $nombre;
        }
    }

    function comprobarGenerico($var, $boton)
    {
        if(empty($_REQUEST[$var]) && isset($_REQUEST[$boton])){
            
            label("Debe haber un campo ".$var);
        }           
    }

    function expresionGenerico($patron, $var, $boton)
    {
        
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


    function validarCompra($cantidad, $stockFinal)
    {
        /**
         * Si existe el boton de comprar producto en la varaible
         * superglobal request y la cantidad ha sido validada correctamente
         * devuelve true y ejecuta la compra
         */
        $bandera=false;
        
        if(validarCantidad($cantidad, $stockFinal)==true)
        {
            $bandera=true;
        }else
        {
            $bandera=false;
        }

        return $bandera;
    }

    function validarCantidad($cantidad, $stockFinal)
    {
        $bandera=true;
        if(!empty($_REQUEST['cantidad']))
        {
            $cantidad = (int)$cantidad;
            $stockFinal = (int)$stockFinal;
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

    function comprobarSesion()
    {
        $bandera=true;
           
        if(!isset($_SESSION['validada']))
        {
            $bandera=false;

        }

        
        return $bandera;
    }

    function recordarPass($var, $boton)
    {
        if(!empty($_REQUEST[$var])&& isset($_REQUEST[$boton]))
        {
            echo $_REQUEST[$var];        
        }

    }

/**
 * 
 * DUDAS 
 * 1. Como ajustar el controlador para que cuando se recargue la vista no se vaya la vista 
 * actual
 * 
 * 2. a que fichero hay que mandar los datos del js cuando hace clic en el corazon
 * 
 * 3. Se podría hacer un array asociativo con la key con la consulta
 * y el value el array con los parametros para poder hacer las transacciones??
 */

    function generarVenta()
    {
        
        try{
            /**
             * Se genera una nueva linea en la tabla de venta
             */
            $user = $_SESSION["usuario"];
            $fecha = date ('Y-m-d', time());
            $codigo = $_REQUEST['codigo'];
            $cantidad = (int)$_REQUEST['nProductos'];
            $precioTotal = (float)$_REQUEST['precio'] * $cantidad;
            $stockFinal = (int)$_REQUEST['stock'] - $cantidad;

            $con= new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $preparada=$con->prepare("insert into venta values(idVenta,?,?,?,?,?)");

            $con->beginTransaction();  
            $arrayInsert=array($user, $fecha, $codigo, $cantidad, $precioTotal);
            $preparada->execute($arrayInsert);
            /**
             * Se actualiza el stock del producto 
             */
            $preparada=$con->prepare("
                UPDATE productos SET stock = stock - ? WHERE codigoProducto = ?;
            ");
            
            $arrayUpdate=array($stockFinal, $codigo);
            $preparada->execute($arrayUpdate);

            $con->commit();
            $preparada->closeCursor();
    
        }
        catch(PDOException $e)
        {
            $con->rollBack();
            $numError = $e->getCode();
    
            // Si no existe la tabla... (nº error = 1146)
            if($numError == 1146)
            {
                echo "<p>La tabla no existe.</p>";
            }
            
            // Error al no reconocer la BBDD
            if($numError == 1049)
            {
                echo "<p>No se reconoce la BBDD.</p>";
            }
            // Error al conectar con el servidor...
            else if($numError == 2002)
            {
                echo "<p>Error al conectar con el servidor.</p>";
            }
            // Error de autenticación...
            else if($numError == 1045)
            {
                echo "<p>Error en la autenticación.</p>";
            }
        }finally
        {
            unset($con);
        }    
    }
    


    

?>