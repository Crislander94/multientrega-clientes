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
                if(
                    isset($_POST["cod_empresax"]) &&
                    isset($_POST["cod_producto"]) &&
                    isset($_POST["precio"]) &&
                    isset($_POST["oferta"]) &&
                    isset($_POST["nom_producto"])
                ){
                    $cod_empresa = $_POST["cod_empresax"];
                    $cod_cliente = $_SESSION["cod_cliente"];
                    $cod_producto = $_POST["cod_producto"];
                    $metodo_pago = $_SESSION["metodo_pago"];
                    $nom_producto = $_POST["nom_producto"];
                    $nombre_cliente = $_SESSION["usernamex"];
                    $direccion = $_SESSION["direccion"];
                    $precio = floatval($_POST["precio"]);
                    $oferta = floatval($_POST["oferta"]);
                    $precio_final = ($precio * $oferta)/100;
                    $precio_final = $precio - $precio_final;
                    $precio_final = round($precio_final, 2);
                    $ganancia_web = round(($precio_final * 0.10), 2);
                    $ganancia_repartidor = round(($precio_final * 0.30), 2);
                    $ganancia_empresa = round(($precio_final * 0.60),2);
                    require_once 'models/clienteModel.php';
                    $cliente = new clienteModels($conexion);
                    // Verificar que la empresa cuente con la misma forma de recibir el pago
                    $verificar_pago = $cliente->verifyPayment($cod_empresa,$metodo_pago);
                    if($verificar_pago){
                        $nom_empresa = $cliente->getNameEnterprise($cod_empresa);
                        $direccion_empresa = $cliente->getDirection($cod_empresa);
                        require_once 'views/generatePedido.views.php';
                    }else{
                        $_SESSION['error_payment']  = true;
                        header('Location: index.php');
                    }
                }else{
                    header('Location: index.php');
                }
        }

        public function createPedido($conexion){
            require_once 'models/clienteModel.php';
            $cliente = new clienteModels($conexion);
            $result = $cliente->orderProduct($_POST["cod_producto"], $_POST["cod_cliente"], $_POST["cod_empresa"],$_POST["precio_final"], $_POST["ganancia_repartidor"],$_POST["ganancia_empresa"], $_POST["ganancia_web"]);
            if(!$result){
                $_SESSION['error_order'] = true;
                header('Location:index.php');
            }else{
                $_SESSION["generate_pedido"] = true;
                header('Location: calificacion.php');
            }
        }

        public function createResenia($conexion){
            require_once 'verificar.php';
            require_once 'models/clienteModel.php';
            $cliente = new clienteModels($conexion);
            $estrellas = $_POST["estrellas"];
            $comentario = $_POST["comentario"];
            $cod_cliente = $_SESSION["cod_cliente"];
            $result = $cliente->createResenia($estrellas, $comentario,$cod_cliente);
            if(!$result){
                $_SESSION['error_resenia'] = true;
            }else{
                $_SESSION["success_resenia"] = true;
            }
            header('Location:index.php');
        }
        
        
        public function tracking($conexion){
            require_once 'verificar.php';
            require_once 'models/clienteModel.php';
            $cliente = new clienteModels($conexion);
            $cod_cliente = $_SESSION["cod_cliente"];
            $data["pedidos"] = $cliente->getPedidos($cod_cliente);
            //Traemos la vista para renderizar al producto....
            require_once "views/seguimiento.view.php";
        }

        public function disclaimerPedido($conexion){
            require_once 'models/clienteModel.php';
            if(isset($_POST["cod_pedido"])){
                $id = $_POST["cod_pedido"];
            }
            $motivos = $_POST["motivo"];
            $cliente = new clienteModels($conexion);
            $result = $cliente->disclaimerPedido($id, $motivos);
            if(!$result){
                $_SESSION['error_disclaimer'] = true;
            }else{
                $_SESSION['success_disclaimer'] = true;
            }
            header('Location: index.php?c=cliente&a=tracking');
        }
    }