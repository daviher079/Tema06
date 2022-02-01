<?php

/**
 * Aqui vamos a definir constantes que podamos necesitar
 * incluir los ficheros que más utilicemos
 * 
 * vamos a definir algunos arrays para ayudarnos
 * en la navegación entre páginas php
 * es decir controladores y vistas
 * 
 * 
 */


//define('IMAGENES', "Tema-6/mvc/webroot/img/");


require "./core/Funciones.php";
require "./config/datosBD.php";
require "./modelo/Conexion.php";
require "./dao/DAO.php";
require "./modelo/Usuario.php";
require "./modelo/Producto.php";
require "./dao/UsuarioDAO.php";
require "./dao/ProductoDAO.php";


$controladores = 
[
    'inicio' => 'controlador/cInicio.php',
    'login' => 'controlador/cLogin.php',
    'registro' => 'controlador/cRegistro.php',
    'perfil' => 'controlador/cPerfil.php',
    'comprarProducto' => 'controlador/cComprarProducto.php',
    'finalizarCompra' => 'controlador/cFinalizarCompra.php',
    'verProductos' => 'controlador/cVerProductos.php'
];

$vistas = 
[
    'inicio' => 'vista/vInicio.php',
    'login' => 'vista/vLogin.php',
    'layout' => 'vista/vLayout.php',
    'registro' => 'vista/vRegistro.php',
    'perfil' => 'vista/vPerfil.php',
    'comprarProducto' => 'vista/vComprarProducto.php',
    'finalizarCompra' => 'vista/vFinalizarCompra.php',
    'verProductos' => 'vista/vVerProductos.php'
];




function crearBD()
{
    try
    {
        
        $con=new PDO("mysql:host=".IP.";dbname=".BBDD, USER, PASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        $numError = $e->getCode();
        
        // Error al no reconocer la BBDD
        if($numError == 1049)
        {
            //echo "<p>No se reconoce la BBDD.</p>";
            $con=new PDO("mysql:host=".IP, USER, PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $commands = file_get_contents("./config/tiendaOnline.sql");
            $con->exec($commands);
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
    }
}




?>