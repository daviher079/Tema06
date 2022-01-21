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


//include "./core/funciones.php";
//require "./config/config.php";
require "./config/datosBD.php";
require "./modelo/Conexion.php";
require "./dao/DAO.php";
require "./modelo/Usuario.php";
require "./dao/UsuarioDAO.php";


$controladores = 
[
    'inicio' => 'controlador/cInicio.php',
    'login' => 'controlador/cLoging.php'
];

$vistas = 
[
    'inicio' => 'vista/vInicio.php',
    'login' => 'vista/vLoging.php',
    'layout' => 'vista/vLayout.php'
]

?>