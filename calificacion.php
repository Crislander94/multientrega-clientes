<?php 
    session_start();
    include_once 'verificar.php';
    if(isset($_SESSION["generate_pedido"])){
        include_once 'views/calificacion.view.php';
    }else{
        header('Location: index.php');
    }

