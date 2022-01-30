<?php

    //establece la conexion a la base de datos y contiene todas las consultas sobre la base de datos

    class ConexionBD
    {

        //se le pasa la consulta preparada y un array con todos los parametros que necesite la consulta preparada

        public static function ejecutaConsulta($sql, $parametros)
        {
            try
            {

                $con = new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $consulta =$con->prepare($sql);
                $consulta ->execute($parametros);
    
            }catch(PDOException $ex)
            {
                $numError = $ex->getCode();
            
                // Error al no reconocer la BBDD
                if($numError == 1049)
                {
                    echo "<p>No se reconoce la BBDD.</p>";
                    
                }
                
                // Si no existe la tabla... (nº error = 1146)
                if($numError == 1146)
                {
                    echo "<p>La tabla no existe.</p>";
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
                return $consulta;
            }

        }

        


        public static function ejecutaTransaccion($sql, $parametros)
        {
            try
            {

                $con = new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consulta =$con->prepare($sql);
                $con->beginTransaction();  
                $consulta ->execute($parametros);
                $con->commit();
                $consulta->closeCursor();
    
            }catch(PDOException $ex)
            {
                $con->rollBack();
                $numError = $ex->getCode();
            
                // Error al no reconocer la BBDD
                if($numError == 1049)
                {
                    echo "<p>No se reconoce la BBDD.</p>";
                }
                
                // Si no existe la tabla... (nº error = 1146)
                if($numError == 1146)
                {
                    echo "<p>La tabla no existe.</p>";
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
                return $consulta;
            }

        }








    }

?>