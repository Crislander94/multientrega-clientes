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
    <style type="text/css">
        body { 
            background: url("..img/logo4.jpg")   rgb(249,249,249); 
            opacity: .9   
        }
    </style>
</head>
<body class="hold-transition sidebar-mini ">
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
        <li>
          <img src="img/dire.PNG" style="width: 40px; height: 40px;"  alt="">
          <button id="btndir" style="margin-left:50px; border-radius: 10px;" onclick="direccion()">Agregar Dirección</button>   
        </li>       
  <div>   
    <label for="user1"id="username" readonly></label>
  </div>
      </li>
    </ul>
  </nav>