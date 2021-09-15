<div class="content-wrapper">
    <?php if(isset($_SESSION['error_disclaimer'])) : ?>
        <div class="alert col-12 alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
            Error! No se pudo cancelar el pedido.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['error_disclaimer']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success_disclaimer'])) : ?>
        <div class="alert col-12 alert-success alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
            Peticion mandada a revisar por administradores.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['success_disclaimer']);
        endif; 
    ?>
    <section class="p-4" >  
        <h2 class="text-center title_main mb-4" id="title_main_products">Lista de pedidos</h2>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Nombre empresa</th>
                    <th>Fecha Creación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($data["pedidos"]) === 0) :?>
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="container_thumb_center d-flex justify-content-center mb-4">
                                <div class="thumb_lg">
                                    <img src="img/not_found.svg" alt="#Not Found" style="width:450px;height:450px">
                                </div>
                            </div>
                            <span style="font-style:italic;">No se han encontrado clientes con solicitudes pendientes</span>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php foreach($data["pedidos"] as $key => $pedidos){
                        $array_meses  = ["Enero", "Febero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre","Octubre", "Noviembre", "Diciembre"];
                        $fecha_final = explode(" ",$pedidos["fecha_creacion"])[0];
                        $fecha_final = explode("-", $fecha_final)[2].'/'.$array_meses[(explode("-",$fecha_final)[1])-1]."/".explode("-", $fecha_final)[0];
                    ?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $pedidos["nom_producto"] ?></td>
                        <td><?php echo $pedidos["precio"] ?></td>
                        <td><?php echo $pedidos["nom_empresa"] ?></td>
                        <td style="color:#12121; font-weight:bold;"><?php echo $fecha_final; ?></td>
                        <td>
                            <span class="badge badge-<?php echo $pedidos['color_estado']?>"><?php echo $pedidos['estado']?></span>
                        </td>
                        <td>
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <?php if($pedidos["estado"] !== 'Completado' && $pedidos["estado"] !== 'Cancelado') : ?>
                                    <a data-id="<?php echo $pedidos["id"] ?>" onclick="showModalMotivos(this)"  href="#"  data-toggle="tooltip" data-placement="top" title="Cancelar Pedidos" id="modificar1">
                                        <button type="button" style="border-radius: 5px !important;" class="btn btn-danger">
                                            <i style="color:#fff; font-size:16px !important;"class="fas fa-times"></i>
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <i class="fas fa-chalkboard-teacher" data-toggle="tooltip" data-placement="top" title="Sin acciones posibles"></i>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- Modal Motivo Cancelacion -->
        <div class="modal fade" id="modal_cancelacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog custom_modal_dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Motivo Cancelacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo RUTA.'index.php?c=cliente&a=disclaimerPedido';?>" class="modal-body row p-4" id="formulario-motivos" method="POST" style="border:none">
                        <div class="input-group d-flex justify-content-center p-4 mb-3" style="width:100%">
                            <textArea type="text" class="form-control custom_input_single" style="max-width:70%; min-width:70%; min-height:150px; max-height:200px" name="motivo" id="motivo" aria-label="Recipient's username" aria-describedby="button-addon2" placeholder="Escriba su motivo aqui..."></textArea>
                            <div class="input-group-append">
                                <span class="input-group-text" id="button-addon2"><i class="fas fa-window-close"></i></span>
                            </div>
                            <input type="hidden" name="cod_pedido" id="cod_pedido">
                        </div>  
                        <div class="modal-footer d-flex justify-content-end mt-1" style="width:100%">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-info">Enviar Motivo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
<?php include_once 'partials/footer.php'; ?>
<script>
    const formulario_motivos = document.getElementById('formulario-motivos');
    const showModalMotivos = (element) =>{
        $("#modal_cancelacion").modal('show');
        document.getElementById('cod_pedido').value = element.getAttribute('data-id');
    }
    formulario_motivos.addEventListener('submit', (e) =>{
        console.log('Holia')
        if(document.getElementById('motivo').value === ""){
            Swal.fire('Validate Form', 'No puede cancelar sin motivo', 'warning');
            e.preventDefault();
            return;
        }
        if(document.getElementById('motivo').value === ""){
            Swal.fire('Validate Form', 'Verifique su codigo de pedido', 'warning');
            e.preventDefault();
            return;
        }
    })
</script>