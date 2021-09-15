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
                if(
                    isset($_POST["cod_empresa"]) &&
                    isset($_POST["cod_producto"]) &&
                    isset($_POST["precio"]) &&
                    isset($_POST["oferta"]) &&
                    isset($_POST["nom_producto"])
                ){
                    var_dump($_SESSION);
                    $cod_empresa = $_POST["cod_empresa"];
                    // Verificar que la empresa cuente con la misma forma de recibir el pago
                    $sql = "select formas_pago from empresa where cod_empresa ='$cod_empresa'";
                    require_once 'views/generatePedido.views.php';
                }else{
                    header('Location: index.php');
                }
        }
    }