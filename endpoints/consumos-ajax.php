<?php
    require_once '../db/conexion.php';
    require_once '../config/settings.php';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if(isset($_POST["key"])){

        //Todos los productos....
        if($_POST["key"] === 'list-products'){
            $data = null;
            $sql = "select p.id, p.nom_producto, cat.descripcion as nombreCategoria,
                    p.precio, p.ofertas, p.cod_empresa from productos p
                    inner join categorias cat on cat.id = p.categoria
                    where disponibilidad != 0
                    and st_producto = 'A'";
            $statment = $conexion->prepare($sql);
            $statment->execute();
            while($fila = $statment->fetch(PDO::FETCH_ASSOC)){
                $data[] = $fila;
            }
            if(!empty($data)){
                $result = array("status" => true, "codigo" => 200 , "data" => $data);
            }else{
                $result = array("status" => false, "codigo" => 204 , "data" => $data);
            }
            header("Content-Type: application/json"); 
            echo json_encode($result, JSON_PRETTY_PRINT);
            exit;
        }
        //Productos por categoria....
        if($_POST["key"] === 'list-products-by-category'){
            if(isset($_POST["categoria"])){
                $categoria = $_POST["categoria"];
                $data = null;
                $sql = "select p.id,p.nom_producto, cat.descripcion as nombreCategoria,
                        p.precio, p.ofertas, p.cod_empresa from productos p
                        inner join categorias cat on cat.id = p.categoria
                        where cat.id = '$categoria'
                        and disponibilidad != 0
                        and st_producto = 'A'";
                $statment = $conexion->prepare($sql);
                $statment->execute();
                while($fila = $statment->fetch(PDO::FETCH_ASSOC)){
                    $data[] = $fila;
                }
                if(!empty($data)){
                    $result = array("status" => true, "codigo" => 200 , "data" => $data);
                }else{
                    $result = array("status" => false, "codigo" => 204 , "data" => $data);
                }
            }else{
                $result = array("status" => false, "codigo" => 204 , "data" => null);
            }
            header("Content-Type: application/json"); 
            echo json_encode($result, JSON_PRETTY_PRINT);
            exit;
        }

    }else{
        $result = array("status" => false, "codigo" => 404 , "data" => null);
        header("Content-Type: application/json"); 
        echo json_encode($result, JSON_PRETTY_PRINT);
        exit;
    }
