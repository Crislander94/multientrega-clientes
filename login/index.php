<?php require_once 'validar-login.php';?>
<?php 
    require_once '../db/conexion.php';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css_/estilosPersonalizados.css">
    <title>Unetenos</title>
</head>
<body>
    <div class="row m-0">
        <div class="col-12  d-flex-justify-content-center text-center mb-4">
            <img src="../img\logo3.jpg" height="150" width="150">
        </div>
    </div>
    <div class="container">  
        <div class="row py-3"> 
            <?php if(isset($_SESSION['errorL'])) : ?>
                <div class="alert col-12 alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
                    El usuario no se encuentra en nuestros registros
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['errorL']);
                endif; 
            ?>
            <?php if(isset($_SESSION['pending'])) : ?>
                <div class="alert col-12 alert-info alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
                    El usuario aún no ha sido gestionado por los administradores, sea paciente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['pending']);
                endif; 
            ?>
            <?php if(isset($_SESSION['register_correct'])) : ?>
                <div class="alert col-12 alert-success alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
                    El usuario ha sido creado correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['register_correct']);
                endif; 
            ?>
            <?php if(isset($_SESSION['register_error'])) : ?>
                <div class="alert col-12 alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
                    <?php echo $_SESSION['register_error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['register_error']);
                endif; 
            ?>
            <div class="col-12 mb-2 text-center">
                <a href="../index.php" class="btn btn-primary">Ver Productos</a>
            </div>
            <div class="col-md-6">
                <div style="background-color:#D8BFD8;border-radius: 5px;">
                    <div class="p-2 form-group">
                        <h4 class="text-center" style="font-weight:bold">Logueate</h4>
                    </div>
                    <form action="validar-usuario.php" id="form_loguear" method="POST" class="py-4"> 
                        <div class="row" style="padding: 10px;">
                             
                            <div class="col-12 form-group">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" name="user_email" class="form-control" id="user_email" />
                            </div>  
                            <div class="col-12 form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control"  id="user_password" name="user_password" />
                            </div>
                            <div class="d-flex justify-content-center col-12">                                  
                                <input type="submit" value="ingresar" class="w-100 btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div style="background-color:#B0C4DE;border-radius: 5px;">
                    <div class="text-center p-2 form-group">
                        <h4 style="font-weight: bold">REGISTRATE</h4>
                    </div>
                    <form action="registrar.php" id="form_registrar" class="py-3" method="post">
                        <div class="row" style="padding: 10px;">
                            <div class="col-12 mb-2 form-group">
                                <label style="width:100%" for="nameR">Nombres:</label>
                                <input type="text" class="form-control" id="nameR" name="nameR"/>
                            </div>
                            <div class="col-12 mb-2">
                                <label style="width:100%" for="user_emailR">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="user_emailR" name="user_emailR" />
                            </div>   
                            <div class="col-12 mb-4">
                                <label style="width:100%" for="pass">Contraseña:</label>
                                <input type="password" class="form-control" id="passR" name="passR">
                            </div>       
                                         <div class="col-12 form-group">
                                <label for="user_identificacion">Identificacion:</label>
                                <input type="text" class="form-control"  id="user_identificacion" name="user_identificacion" />
                            </div>
                            <div class="col-12 form-group">
                                <label for="user_telefono">Telefono:</label>
                                <input type="text" class="form-control"  id="user_telefono" name="user_telefono" />
                            </div>
                            <div class="col-12 form-group">
                                <label for="user_direccion">Direccion:</label>
                                <input type="text" class="form-control"  id="user_direccion" name="user_direccion" />
                            </div>
                            <div class="col-12 form-group">
                                <label for="user_direccion">Metodo de Pago:</label>
                                <?php 
                                    $sql = "select descripcion from formas_pago";
                                    $stmt = $conexion->prepare($sql);
                                    $stmt->execute();
                                    $resultado = $stmt->fetchAll();
                                    echo '<select name="metodo_pago" id="metodo_pago" class="select_custom_styles w-100">';
                                    echo '<option value="">Seleccione un metodo de pago</option>';
                                    foreach ($resultado as $key => $metodo) {
                                        echo '<option value="'.$metodo["descripcion"].'">'.$metodo["descripcion"].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center col-12 form-group">
                                <input type="submit" value="Registrarte"  class="w-100 btn btn-info">
                            </div>
                        </div>
                    </form>
                </div> 
            </div>  
        </div>         
    </div>
</body>
</html>

<script src="../js/libs/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="js/validar_login.js"></script>