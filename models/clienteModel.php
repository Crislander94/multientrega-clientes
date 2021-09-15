<?php 
    class clienteModels{
        private $db;
        private $productos;
        public function __construct($conexion){
            $this->db = $conexion;
            $this->productos = array();
        }
        public function verifyPayment($cod_empresa,$metodo_pago){
            $sql = "select formas_pago from empresa where cod_empresa = '$cod_empresa'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $data = $statment->fetchAll();
            $formas_pago = $data[0]["formas_pago"];
            $formas_pago = explode(',' ,$formas_pago);
            foreach($formas_pago as $key => $pago){
                if(trim($pago) === $metodo_pago){return true;}
            }
            return false;
        }

        public function getNameEnterprise($cod_empresa){
            $sql = "select nom_empresa from empresa where cod_empresa = '$cod_empresa'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->productos = $statment->fetchAll();
            return $this->productos[0]["nom_empresa"];
        }
        public function getDirection($cod_empresa){
            $sql = "select direccion from empresa where cod_empresa = '$cod_empresa'";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->productos = $statment->fetchAll();
            return $this->productos[0]["direccion"];
        }
        public function orderProduct($cod_producto, $cod_cliente, $cod_empresa,$precio_final, $ganancia_repartidor,$ganancia_empresa, $ganancia_web){
            $sql="insert into pedidos(producto, cliente,cod_empresa,precio,ganancia_repartidor,
                                      ganancia_empresa, ganancia_web,created_by)
            values('$cod_producto','$cod_cliente','$cod_empresa','$precio_final', '$ganancia_repartidor','$ganancia_empresa','$ganancia_web','$cod_cliente')";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }
        public function createResenia($estrellas, $comentario,$cod_cliente){
            $sql = "insert into resenia_clientes(cod_cliente, comentario, estrellas)
            values('$cod_cliente', '$comentario', '$estrellas')";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }

        public function getPedidos($cod_cliente){
            $sql=  "select p.precio,
                    p.id,p.fecha_envio as fecha_creacion, pr.nom_producto, emp.nom_empresa,
                    case p.st_pedido
                        when 'P' then 'Pendiente'
                        when 'X' then 'Cancelado'
                        when 'F' then 'Completado'
                        when 'A' then 'Generado'
                        when 'C' then 'Canelación Pendiente'
                    end as estado,
                    case p.st_pedido  
                        when 'P' then 'info'
                        when 'X' then 'danger'
                        when 'F' then 'success'
                        when 'A' then 'primary'
                        when 'C' then 'warning'
                    end as color_estado
                    from pedidos p
                    inner join productos pr on pr.id = p.producto
                    inner join clientes c on c.cod_cliente = p.cliente
                    inner join empresa emp on pr.cod_empresa = emp.cod_empresa
                    and c.cod_cliente = '$cod_cliente'
                    order by p.precio ASC";
            $statment = $this->db->prepare($sql);
            $statment->execute();
            $this->productos = $statment->fetchAll();
            return $this->productos;
        }

        public function disclaimerPedido($id,$motivo){
            $sql ="update pedidos set 
                st_pedido = 'C',
                motivo_cancelacion = '$motivo',
                fecha_cancelacion = CURRENT_TIMESTAMP
                where id = '$id'";
            try{
                //Iniciamos la transaccion
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                //Ejecutamos el query
                $this->db->exec($sql);
                $this->db->commit();
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
                $this->db->rollBack();
                return false;
            }
        }
    }