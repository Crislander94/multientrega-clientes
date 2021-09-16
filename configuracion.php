<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        setcookie("letra_cliente",$_POST["letra"].' !important;',time()+60*60*24*360,'/');
        header('Location: index.php');
    }else{
        require_once 'verificar.php';
        include_once 'partials/cabecera.php';
        include_once 'config/settings.php';
        require_once 'db/conexion.php';
        $db = new DBClass();
        $conexion  = $db->getconnection();
        include_once 'partials/menu.php';
        require_once 'views/configuracion.view.php';
    }
?>