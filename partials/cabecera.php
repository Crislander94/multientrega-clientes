<?php 
// 022864 ===> Color 1
// 3F386B ===> Color 2
// 3A553A ===> Color 3
// 0C9789 ===> Color 4
// 0693C6 ===> Color 5
  $font_family = '';
  if(isset($_COOKIE["letra_cliente"])){
    $font_family = $_COOKIE["letra_cliente"];
  }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title ima>MultiEntregas</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>  
    <link href="css_/bootstrap.min.css" rel="stylesheet">
    <link href="css_/estilosPersonalizados.css"rel="stylesheet" type="text/css" />
    <link href="css_/estilosIndex.css"rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css_/adminlte.min.css">
    <link rel="stylesheet" href="css_/estilosIndex.css">
    <!-- ICONOS -->
    <!-- TipoGrafias -->
    <!-- POPPINS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,300&display=swap" rel="stylesheet">


    <!-- Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet"> 

    <!-- Coming Soon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 


    <link rel="stylesheet" href="./assets/libs/bootstrap-4.6.0-dist/css/bootstrap.css"> 
    <link rel="stylesheet" href="./assets/libs/bootstrap-select-1.13.1/css/bootstrap-select.css"/>
    <link rel="stylesheet" href="./assets/css/personalizacion.css">


    <!-- Dancing Script -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style type="text/css">


        body { 
            background: url("..img/logo4.jpg")   rgb(249,249,249); 
            opacity: .9   
        }
    </style>
</head>
<body class="hold-transition sidebar-mini" style="font-family: <?php  echo $font_family?> , Arial, sans-serif">
<div class="wrapper  ">  
  <nav class="main-header navbar navbar-expand color">    
    <ul class="navbar-nav color">
      <li class="nav-item ">
        <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><label id="user"></label></a>
      </li>    
    </ul>     
    <ul class="navbar-nav ml-auto">         
      <li class="nav-item"> 
        <?php  if(isset($_SESSION["usernamex"])) :?>
          <a href="./configuracion.php" class="btn btn-info">Estilos</a>
          <a href="index.php?c=cliente&a=tracking" class="btn btn-success">Seguimiento de mis pedidos</a>
          <a href="login/cerrar-sesion.php" class="btn btn-info">Cerrar Sesion</a>
        <?php else: ?>
          <a href="login/index.php" class="btn btn-primary">Iniciar Sesion</a>
        <?php endif;?>
      </li>
  <div>   
  </div>
      </li>
    </ul>
  </nav>