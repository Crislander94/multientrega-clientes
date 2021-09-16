<div class="content-wrapper">
    <h3 class="text-center title_main mb-4">Generando_pedido...</h3>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <form class="w-75 mb-4" style="border: 1px solid rgba(0,0,0,.2); border-radius:5px;" action="index.php?c=cliente&a=createPedido" method="POST">
                <div class="form-group mb-3">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo $nombre_cliente ?>" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Producto:</label>
                    <input type="text" class="form-control" value="<?php echo $nom_producto ?>" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Empresa</label>
                    <input type="text" class="form-control" value="<?php echo $nom_empresa ?>" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Precio</label>
                    <input type="text" class="form-control" value="<?php echo '$'.$precio_final; ?>" name="precio" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Tu pedido en:</label>
                    <input type="text" class="form-control" value="<?php echo $direccion_empresa ?>" disabled>
                </div>
                <div class="col-12">
                    <label for="">¿Quieres colocar una nueva direccion para tu pedido?</label>
                </div>
                <div class="custom-control mb-3 custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline13" name="selected_direccion" onclick="validarSeleccion(this)" value="S" class="custom-control-input" checked>
                    <label class="custom-control-label" for="customRadioInline13">Si</label>
                </div>
                <div class="custom-control mb-3 custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline23" name="selected_direccion" onclick="validarSeleccion(this)" value="N" checked class="custom-control-input" >
                    <label class="custom-control-label" for="customRadioInline23">No</label>
                </div>
                <div class="form-group mb-3" id="direccion_actual">
                    <label for="">Tu Direccion: </label>
                    <input type="text" class="form-control" value="<?php echo $direccion; ?>" disabled>
                </div>
                <div id="direccion"></div>
                <input type="hidden" class="form-control" value="<?php echo $cod_empresa ?>" name="cod_empresa">
                <input type="hidden" class="form-control" value="<?php echo $cod_producto ?>" name="cod_producto">
                <input type="hidden" class="form-control" value="<?php echo $cod_cliente ?>" name="cod_cliente">
                <input type="hidden" class="form-control" value="<?php echo $precio_final ?>" name="precio_final">
                <input type="hidden" class="form-control" value="<?php echo $ganancia_web ?>" name="ganancia_web">
                <input type="hidden" class="form-control" value="<?php echo $ganancia_repartidor ?>" name="ganancia_repartidor">
                <input type="hidden" class="form-control" value="<?php echo $ganancia_empresa ?>" name="ganancia_empresa">
                <div class="form-group d-flex justify-content-center" style="width:100%">
                    <input type="submit" class="mr-2 btn btn-info" value="Generar Pedido">
                    <a href="index.php" class="btn btn-danger">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const validarSeleccion  = (element) =>{
        const direccion_actual = document.getElementById('direccion_actual');
        if(element.value === 'S'){
            direccion_actual.style.display ="none";
            direccion();
        } 
        if(element.value === 'N'){
            direccion_actual.style.display ="block";
        } 
    }
    document.getElementById('direccion_nueva').style.display ="none";
</script>
<script src="js/generar-pedido.js"></script>
<?php include_once 'partials/footer.php'; ?>
<script>
    function direccion() {
        $('#direccion').html('<form action="" id=><div class="col borde"><div class="col" style="color: tomato;"><label class="col-sm-1 control-label"><b>Direcci&oacute;n</b></label></div><div class="col mt-2" style="padding: 8px;"><input class="sinborde" type="text" placeholder="Ingresar Direcci&oacute;n" /></div></div><br /><div class="col borde"><div class="col mt-2" style="color: tomato;"><label class="col-sm-1 cotrol-label"> <b>Piso/Oficina/Apto/Depto</b></label></div><div class="col mt-2"></div><div class="col mt-2" style="margin: 4px;"><input class="sinborde" type="text" placeholder="Descripci&oacute;n" /></div></div><br /><iframe height="300" style="border: 0; width:100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255168.25640204886!2d-80.12019029593307!3d-2.1521517080089017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d13cbe855805f%3A0x8015a492f4fca473!2sGuayaquil!5e0!3m2!1ses!2sec!4v1626974687202!5m2!1ses!2sec" allowfullscreen="allowfullscreen" loading="lazy"></iframe> <br /><br /></form>');  
    }
</script>