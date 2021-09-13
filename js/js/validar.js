const exprRegEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/;
const exprRegDate = /^(0[1-9]|1\d|2\d|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}$/;

function validarCampos(){
    let form = document.FormularioXYZ;
    console.log(form.Sexo.value);
    console.log(form.EstadoCivil.value);
    console.log(form.Instruccion.value);
    console.log(form.fecha.value);
    if (form.nombre.value === '') {
        alert('Campo Nombre Obligatorio');
        form.nombre.focus();
        return false;
    }

    if (form.apellido.value === '') {
        alert('Campo Apellido Obligatorio');
        form.apellido.focus();
        return false;
    }

    if (form.correo.value === '') {
        alert('Campo Email Obligatorio');
        form.correo.focus();
        return false;
    }

    if(form.identificacion.value.match(exprRegEmail)) {
        alert('Campo Email es incorrecto');
        form.pago.focus();
        return false;
    }

    if (form.pago.value === '') {
        alert('Campo Fecha Obligatorio');
        form.fecha.focus();
        return false;
    }

    if(form.fecha.value.match(exprRegDate)) {
        alert('Campo Fecha es incorrecto');
        form.fecha.focus();
        return false;
    }

    if(form.Sexo.value === '') {
        alert('Campo Sexo Obligatorio');
        form.Sexo.focus();
        return false;
    }

    if(form.EstadoCivil.value === '') {
        alert('Campo Estado Civil Obligatorio');
        form.EstadoCivil.focus();
        return false;
    }

    if(form.Instruccion.value === '') {
        alert('Campo Instrucción Obligatorio');
        form.Instrucción.focus();
        return false;
    }
    let message = 'han sido ingresados los datos correctamente:'
    + 'Nombre: ' + form.nombre.value
    + 'Apellido: ' + form.apellido.value
    + 'Email: ' + form.email.value
    + 'Fecha: ' + form.fecha.value
    + 'Sexo: ' + form.Sexo.value
    + 'EstadoCivil: ' + form.EstadoCivil.value
    + 'Instrucción: ' + form.Instruccion.value;
    alert(message);
}
