<?php
    session_start();
    unset($_SESSION['usernamex']);
    unset($_SESSION['identificacion']);
    unset($_SESSION['cod_cliente']);
    session_destroy();
    header('Location: index.php');
