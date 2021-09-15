<div class="content-wrapper">
    <?php if(isset($_SESSION['error_payment'])) : ?>
        <div class="alert col-12 alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
            Logueese o verifique su forma de pago.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['error_payment']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success_resenia'])) : ?>
        <div class="alert col-12 alert-success alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
            Su orden y la calificacion se realizaron exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['success_resenia']);
        endif; 
    ?>
    <?php if(isset($_SESSION['error_resenia'])) : ?>
        <div class="alert col-12 alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
            Error! no se guardo la calificacion a nuestro servicios.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['error_resenia']);
        endif; 
    ?>
    <?php if(isset($_SESSION['error_order'])) : ?>
        <div class="alert col-12 alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
            !Error! No se pudo generar el pedido.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['error_order']);
        endif; 
    ?>
    <section class="p-4" >  
        <h2 class="text-center title_main mb-4" id="title_main_products">Lista de Productos</h2>
        <div class="row" id="listProducts">
            <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card pt-4">
                    <img src="img/home.svg" class="py-2 card-img-top" alt="...">
                    <div class="card-body">
                        <p class="mb-0 text-bold" style="font-size:18px">Nombre Producto</p>
                        <p class="card-text mb-0">$5.00</p>
                        <p class="mb-0" style="color:#a42d28">Sin ofertas</p>
                        
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-end">
                        <form action="index.php?c=cliente&a=generatePedido" method="POST">
                            <input type="text" id="cod_empresa" name="cod_empresa">
                            <input type="text" id="cod_producto" name="cod_producto">
                            <input type="text" id="precio" name="precio">
                            <input type="text" id="oferta" name="oferta">
                            <input type="text" id="nom_producto" name="nom_producto">
                            <button type="submit" class="btn btn-info">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card pt-4">
                    <img src="img/electronics.svg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="mb-0 text-bold">Nombre Producto</p>
                        <del class="card-text text-muted mb-0">$5.00</del><span class="ml-2" style="color:#fe738f">10%</span>
                        <p class="mb-0">$4.90</p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
</div>
<script src="js/list-productos.js"></script>
<?php include_once 'partials/footer.php'; ?>