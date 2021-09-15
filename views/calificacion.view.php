<?php
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        var_dump($_POST);
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css_/estilosPersonalizados.css"> -->
    <title>estrellas</title>
<style>

    form{ width:350px; margin:0 auto; padding:10px; border: 1px solid #d9d9d9; border-radius: 20px;
    background-color:#0F69FA;}
    form p, form input[type = "submit"]{text-align:center; font-size:20px;}

    body { 
    background-color: cornsilk;  
    }
    input[type = "radio"]{ display:none;/*position: absolute;top: -1000em;*/}
    label{ color:grey;}
    .clasificacion{
        direction: rtl;
        unicode-bidi: bidi-override;
    }
    h3,h5 { text-align: center;
    }
    label:hover,
    label:hover ~ label{color:#ffff;}
    input[type = "radio"]:checked ~ label{color:orange;}
</style>
</head>
<body>
    <div id="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col" style="margin-top: 10%">
                <h3><b  style="color: #000;">¿ Qué te parecio en nuestro servicio ?</b></h3>
                <p> <h5> <strong  style="color: #000;">Danos tu opinión</strong></h5></p>
                <form action="index.php?c=cliente&a=createResenia" id="form_resenia" method="post">
                    <p  style="color: #000;">Calificanos!</p>
                    <p class="clasificacion">
                        <input id="radio1" type="radio" name="estrellas" value="5">
                        <label for="radio1">&#9733;</label>
                        <input id="radio2" type="radio" name="estrellas" value="4">
                        <label for="radio2">&#9733;</label>
                        <input id="radio3" type="radio" name="estrellas" value="3">
                        <label for="radio3">&#9733;</label><input id="radio4" type="radio" name="estrellas" value="2">
                        <label for="radio4">&#9733;</label><input id="radio5" type="radio" name="estrellas" value="1">
                        <label for="radio5">&#9733;</label>
                    </p>
                    <div class="form-group">
                        <label for="comentario" style="color:#fff">Dejanos un comentario:</label>
                        <textarea name="comentario" class="form-control custom_input_single" style="max-width:100%; min-width:100%; min-height:150px; max-height:200px" name="comentario" id="comentario"></textarea>
                    </div>
                    <p><input class="btn btn-primary" type="submit" value="Aceptar"/></p>
                </form>
            </div>
        </div>
    </div>

    </div>
<div>
</div>
</body></html>
<script>
    const form_resenia = document.getElementById('form_resenia');
    let estrellax = 0;
    const index = () =>{
        const estrellas = document.getElementsByName('estrellas');
        estrellas.forEach(estrella  =>{
            // console.log(estrella.value, estrella.checked);
            if(estrella.checked){
                estrellax = estrella.value;
                return true;
                // alert('¡¡¡Gracias por apoyar nuestro servicio!!! Calificacion: '+estrella);
            }
        });
        return false;
        //  window.location.href = 'index.html'; //will redirect to your blog page (an ex: blog.html)       
    }
    form_resenia.addEventListener('submit', (e) => {
        index();
        if(estrellax === 0){
            e.preventDefault();
            alert('Debe existir una calificacion de estrella.')
            return;
        }
    })
</script>