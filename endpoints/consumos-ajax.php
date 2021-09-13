<?php
    require_once '../db/conexion.php';
    require_once '../config/settings.php';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if(isset($_POST["key"])){

        //Todo Productos....


    }else{
        $result = array("status" => false, "codigo" => 404 , "data" => null);
        header("Content-Type: application/json"); 
        echo json_encode($result, JSON_PRETTY_PRINT);
        exit;
    }
