<?php 
    class ClienteController{
        public function index($conexion){
            //Cargamos la vista principal....
            require_once 'views/index.view.php';
        }
        public function renderCalification($conexion){
            //Renderizamos Calificacion
            require_once 'views/calificacion.view.php';
        }

        public function generatePedido($conexion){
                //Renderizamos pedido
                require_once 'verificar.php';
                var_dump($_POST);
                var_dump($_SESSION);
                require_once 'views/generatePedido.views.php';
        }
    }