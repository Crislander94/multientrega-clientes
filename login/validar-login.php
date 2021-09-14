<?php
    session_start();
    if(isset($_SESSION['usernamex'])){
        header('Location: ../index.php');
    }