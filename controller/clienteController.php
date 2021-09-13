<?php 
    class clienteController{
        public function index($conexion){
            //Cargamos la vista principal....
            require_once 'views/index.view.php';
        }


        public function renderCalification($conexion){
            //Renderizamos Calificacion
            require_once 'views/calificacion.view.php';
        }
    }