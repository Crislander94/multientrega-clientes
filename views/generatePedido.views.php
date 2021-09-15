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
                <div class="form-group mb-3" id="direccion_nueva">
                    <label for="">Nueva Direccion</label>
                    <input type="text" class="form-control">
                </div>
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
        const direccion_nueva = document.getElementById('direccion_nueva');
        if(element.value === 'S'){
            direccion_actual.style.display ="none";
            direccion_nueva.style.display ="block";
        } 
        if(element.value === 'N'){
            direccion_nueva.style.display ="none";
            direccion_actual.style.display ="block";
        } 
    }
    document.getElementById('direccion_nueva').style.display ="none";
</script>
<script src="js/generar-pedido.js"></script>
<?php include_once 'partials/footer.php'; ?>