<?php 
    /*
        Verifica que el usuario se encuentre en nuestros registros....
    */
    require_once '../db/conexion.php';
    session_start();
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(
            isset($_POST['user_email']) &&
            isset($_POST['user_password'])
        ){
            $email_verify = $_POST['user_email'];
            $password_verify = $_POST['user_password'];
            $sql = "Select * from clientes  where correo = '$email_verify' and password = '$password_verify'";
            $statment = $conexion->prepare($sql);
            $statment->execute();
            $result = $statment->fetchAll();
            if(count($result) ===1){
                if($result[0]["st_cliente"] === 'P'){
                    $_SESSION['pending'] = true;
                    header('Location: index.php');    
                }else{
                    $_SESSION['usernamex'] = $result[0]['nombres'];
                    $_SESSION['cod_cliente'] = $result[0]['cod_cliente'];
                    $_SESSION['identificacion'] = $result[0]['identificacion'];
                    $_SESSION['direccion'] = $result[0]["direccion"];
                    $_SESSION['metodo_pago'] = $result[0]['metodo_pago'];
                    header('Location: ../index.php');
                }
            }else{
                $_SESSION['errorL'] = true;
                header('Location: index.php');
            }
        }
    }
?>