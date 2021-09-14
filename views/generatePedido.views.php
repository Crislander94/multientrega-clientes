<div class="content-wrapper">
    <h3 class="text-center title_main mb-4">Generando_pedido...</h3>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <form class="w-75 mb-4" style="border: 1px solid rgba(0,0,0,.2); border-radius:5px;" action="index.php?c=cliente&a=create_pedido">
                <div class="form-group mb-3">
                    <label for="">Nombre:</label>
                    <input type="text" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Producto:</label>
                    <input type="text" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Empresa</label>
                    <input type="text" class="form-control" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Precio</label>
                    <input type="text" class="form-control" name="precio" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="">Tu pedido en:</label>
                    <input type="text" class="form-control" disabled>
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
                    <input type="text" class="form-control" disabled>
                </div>
                <div class="form-group mb-3" id="direccion_nueva">
                    <label for="">Nueva Direccion</label>
                    <input type="text" class="form-control">
                </div>
                <input type="text" class="form-control" name="cod_empresa">
                <input type="text" class="form-control" name="cod_producto">
                <input type="text" class="form-control" name="cod_cliente">
                <input type="text" class="form-control" name="precio_final">
                <input type="text" class="form-control" name="ganancia_web">
                <input type="text" class="form-control" name="ganancia_repartidor">
                <input type="text" class="form-control" name="ganancia_empresa">
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
</script>
<script src="js/generar-pedido.js"></script>
<?php include_once 'partials/footer.php'; ?>