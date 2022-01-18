<?php

    class ProductoM
    {
        private $id;
        private $descripcion;
        private $PVP;  
        //atributo estatico
        public static $numeroProducto=0;

        public static function funcionStatica()
        {
            echo self::$numeroProducto."</br>";
        }

        public function muestra()
        {
            echo"<p>".$this->id.
            ":".$this->descripcion.":".
            $this->PVP."</p>";
        }

        public function __construct($id, $desc, $PVP)
        {
            $this->id = $id;
            $this->descripcion = $desc;
            $this->PVP = $PVP;
            self::$numeroProducto++;
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function __set($atributo, $value)
        {
            $this->$atributo=$value;
        }

        /*public function __destruct()
        {
            echo "Estoy destruyendo el producto";
        }*/

        public function __toString()
        {
            return "<p>".$this->id.
            ":".$this->descripcion.":".
            $this->PVP."</p>";
        }



    }


    
    
?>    