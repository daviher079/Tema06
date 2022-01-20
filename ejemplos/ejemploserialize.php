<?php

require_once("./ProductoMagico.php");

$objetonuevo = unserialize($_COOKIE['objetoPrueba']);
//En $_SESSION[] no hace falta serializar ni deserializar para meter un objeto dentro de la variable superglobal $_SESSION[]
echo $objetonuevo

?>