<?php

    include_once 'config/settings.php';
    include_once 'partials/cabecera.php';
    include_once 'partials/menu.php';
    require_once 'core/routes.php';
    require_once 'db/conexion.php';
    $db = new DBClass();
    $conexion  = $db->getconnection();
    $sql = "select * from clientes";
    $stmt = $conexion->prepare($sql);
    $resultado = $stmt->execute();
    //Cargar el controlador correspondiente y cargar la accion por GET
    if(isset($_GET['c'])){
        $controller = loadController($_GET['c']);
        if(isset($_GET['a'])){
            loadAction($controller, $_GET['a'], $conexion);
        }else{
            loadAction($controller, ACTION_MAIN, $conexion);
        }
    }else{
        $controller = loadController(CONTROLLER_MAIN);
        loadAction($controller, ACTION_MAIN, $conexion);
    }