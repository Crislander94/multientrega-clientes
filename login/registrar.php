<?php 
    /*
        Verifica que el usuario se encuentre en nuestros registros....
    */
    require_once '../db/conexion.php';
    session_start();
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        var_dump($_POST);
        if(
            isset($_POST['nameR']) &&
            isset($_POST['user_emailR']) &&
            isset($_POST['passR']) &&
            isset($_POST['user_identificacion']) &&
            isset($_POST['user_telefono']) &&
            isset($_POST['user_direccion']) &&
            isset($_POST['metodo_pago'])
        ){
            $nombres  = $_POST['nameR'];
            $password = $_POST['passR'];
            $direccion  = $_POST['user_direccion'];
            $identificacion  = $_POST['user_identificacion'];
            $email  = $_POST['user_emailR'];
            $telefono  = $_POST['user_telefono'];
            $metodo_pago = $_POST['metodo_pago'];
            $sql = "INSERT INTO clientes(nombres, password, direccion, identificacion, correo, telefono, metodo_pago)
            values('$nombres','$password','$direccion','$identificacion','$email','$telefono','$metodo_pago')";
            try{
                //Iniciamos la transaccion
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->beginTransaction();
                //Ejecutamos el query
                $conexion->exec($sql);
                $conexion->commit();
                $_SESSION["register_correct"] = true;
                header('Location: index.php');
            }catch(Exception $e){ 
                $_SESSION["register_error"] = $e->getMessage();
                $conexion->rollBack();
                header('Location:index.php');
            }
        }else{
            header('Location: index.php');
        }
    }
?>