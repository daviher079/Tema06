<?php

    class Usuario
    {
        private $usuario;
        private $nombre;
        private $clave;
        private $correo;
        private $fechaNacimiento;
        private $perfil;
        //private $fechaUltimaConexion


        function __construct($codU, $nom, $pass, $correo, $fNacimiento, $perfil)
        {
            $this->usuario=$codU;
            $this->nombre = $nom;
            $this->clave = $pass;
            $this->correo = $correo;
            $this->fechaNacimiento = $fNacimiento;
            $this->perfil = $perfil; 
        }

        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $valor)
        {
            $this->name = $valor;
        }

        


    } 


?>