<?php 
    class clienteModels{
        private $db;
        private $productos;
        public function __construct($conexion){
            $this->db = $conexion;
            $this->prodcutos = array();
        }
        public function getProducts(){

        }
        public function orderProduct(){
            $sql="queryordenar";
        }
    }
