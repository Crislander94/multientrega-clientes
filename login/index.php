<!DOCTYPE html>
<html lang="es">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css_/estilosPersonalizados.css">
    <title>Principal</title>
</head>
<body>
    <img src="img\logo3.jpg" height="150" width="150">   
<br>
<br>
    <div class="container">  
        <div class="row"> 
            <div class="col-md-1"></div>                  
            <div class="col-md-3">
                <div class="col-md-12" style="background-color:	#D8BFD8; border: solid 1px; right:30px;border-radius: 20px 20px;">
                    <div class="form-group">
                        <h4>INGRESAR</h4>
                    </div>
                    <form action="/" method="post"> 
                        <div class="row col-12" style="padding: 10px;">
                            <div class="form-group">
                                <div class="offset-2 col-8-md">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="email" name="user_email" id="user_nameR" />
                                  </div>
                                  <div class="offset-2 col-8-md">
                                    <label for="password">Contraseña:</label>
                                    <input type="password"  id="user_password" />
                                  </div>    
                            </div>
                                            
                            <div class="row form-group">
                                <div class="col-md-1">                            
                                </div>   
                                <div class="col-md-4">                                  
                                    <input type="button" value="ingresar" onclick="validarCampos()" class="btn btn-light">                                 
                                </div>                        
                                <div class="offset-1 col-md-4">
                                    <input type="button" value="Cancelar" onclick="validarCampos()" class="btn btn-light">                             
                                </div>  
                            </div>                                  
                        </div>                                                
                       </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12"style="background-color:#B0C4DE ;border-radius: 20px 20px;right:75px;">
                    <div class="form-group">
                        <h4>REGISTRATE</h4>
                    </div>
                    <form action="/" method="post"> 
                        <div class="row col-12" style="padding: 10px;">
                            <div class="form-group">
                                <div class="offset-2 col-8-md">
                                    <label for="name">Nombres:</label>
                                    <input type="text"   />
                                  </div>
                                  <div class="offset-2 col-8-md">
                                    <label for="mail">Correo Electrónico:</label>
                                    <input type="email"  id="user_emailR" />
                                  </div>   
                                    <div class="offset-2 col-8-md">
                                    <label for="mail">Contraseña:</label>
                                 <input type="password" id="pass">
                                  </div>   
                            </div>                                        
                            <div class="row form-group">
                                <div class="col-md-1">                            
                                </div>   
                                <div class="col-md-4">                                    
                                    <input type="button" onclick="validarCamposRegistrar()" value="Ingresar"  class="btn btn-light" data-toggle="modal" data-target="#myModal">                                   
                                </div>                        
                                <div class="offset-1 col-md-4">                            
                                    <input type="button" onclick="validarCamposRegistrar()"  value="Cancelar"class="btn btn-light" data-toggle="modal" data-target="#myModal" >                    
                                </div>  
                            </div>                                  
                        </div>                                                
                       </form>
                </div> 
            </div>                                   
        </div>         
    </div>
<div class="container">
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Usario Registrado</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <p>Su regitro a sido exitoso</p>
          Bienvenido: <input type="text" id="obtenerUser">         
        </div>

        <div class="modal-footer">
          <button type="button" onclick="redirectIndex()" class="btn btn-danger">Bienvenido</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
  var valorSesion=false;
    $( document ).ready(function() {
        // cargar modal
        
      $('#myModal').on('shown.bs.modal', function () {
     $('#myInput').trigger('focus')
})
});

    function redirectIndex() {

     debugger
    // obtener usuario logueado
       let valor=  $('#user_nameR').val()+"Cinthya Andrade";
       $('#obtenerUser').val(valor)
       localStorage.setItem('user', valor)
     
    }

    // valida campos de inicio de sesión
    function validarCampos(){    
        debugger

    if ($('#user_name').val() === ''|| $('#user_email').val() === '' || valorSesion===false)
    {
        if (valorSesion===false){
            alert('Debe registrarse')
        }
        limpiarCampos()
     
         alert('Campo  Obligatorio');      
        return false;
    }
    
    if ($('#user_nameR').val() === ''|| $('#user_password').val() === '' ||valorSesion===false)
    {
        if (valorSesion===false){
            alert('Debe registrarse')
        }
        limpiarCampos()
     
         alert('Campo  Obligatorio');      
        return false;
    }
    else {
        redirectIndex()
         window.location.href = 'index.html';
    }      
}

// validar campos registro de usuario
function validarCamposRegistrar(argument) {
   if ($('#user_emailR').val() === '' || $('#user_emailR').val() === '') {
    limpiarCampos()
         alert('Campo Obligatorio');      
        return false;
    }
    else {
        redirectIndex()
         valorSesion=true;
      }  
   }


function limpiarCampos() {
    $('#user_email').val('');
    $('#user_name').val('');
    $('#user_emailR').val('');
    $('#user_nameR').val('');
    $('#pass').val('');
    
}
</script>