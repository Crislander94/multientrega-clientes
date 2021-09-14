document.addEventListener('DOMContentLoaded', () => {
    const form_loguear = document.getElementById('form_loguear');
    const form_registrar = document.getElementById('form_registrar');
    // valida campos de inicio de sesión
    const validarCampos = () =>{
        if ($('#user_email').val() === ''){
            alert('Falta  Email');
            return false;
        }
        if ($('#user_password').val() === ''){
            alert('Falta Password');      
            return false;
        }
        return true;
    }
    // validar campos registro de usuario
    const validarCamposRegistrar = () => {
        if ($('#nameR').val() === '') {
            alert('Falta nombre');
            return false;
        }
        if ($('#user_emailR').val() === '') {
            alert('Falta email');      
            return false;
        }
        if ($('#passR').val() === '') {
            alert('Falta Password');
            return false;
        }
        if ($('#user_identificacion').val() === '') {
            alert('Falta Identificacion');
            return false;
        }
        if ($('#user_telefono').val() === '') {
            alert('Falta Telefono');
            return false;
        }
        if ($('#user_direccion').val() === '') {
            alert('Falta Direccion');
            return false;
        }
        if ($('#metodo_pago').val() === '') {
            alert('Seleccione un metodo de pago');
            return false;
        }
        return true;
    }
    form_loguear.addEventListener('submit', (e) =>{ 
        const verificar =validarCampos();
        if(!verificar){e.preventDefault(); return}
    });
    form_registrar.addEventListener('submit', (e) =>{ 
        const verificar = validarCamposRegistrar();
        if(!verificar){e.preventDefault(); return}
    });
})