<?php
    //Ruta Total de la app
    $ruta = $_SERVER['HTTP_HOST'];
    $ruta_final = 'https://'.$ruta.'/multientrega-clientes-master/';
    define('RUTA', $ruta_final);

    //Definiendo Rutas por default de los controladores
    define("CONTROLLER_MAIN", 'Cliente');
    define("ACTION_MAIN", 'index');
?>