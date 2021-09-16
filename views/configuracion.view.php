<div class="content-wrapper">
    <div class="p-4 row m-0">
        <div class="px-4 card col-12">
            <div class="card-header">
                <form action="configuracion.php" class="d-flex justify-content-between align-items-center" method="post" style="border:none">
                    <div style="width:40%">
                        <select class="select_custom_styles p-2 text-white" name="letra" id="value_family" style="width:80%; background-color:#17a2b8;">
                            <option value="Arial">Default</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Coming Soon">Coming Soon</option>
                            <option value="Poppins">Poppins</option>
                            <option value="Dancing Script">Dancing Script</option>
                        </select>
                    </div>
                    <div>
                        <input class="btn btn-info" type="submit" value="Cambiar estilo del sitio">
                    </div>
                </form>
            </div>
        </div>
        <div class=" col-12 d-flex justify-content-center align-items-center" style="width:80%; height:200px; box-shadow: 0 0 10px rgba(0,0,0,.5); transition:background-color .5s ease; border-radius: 0 0 5px 5px; background:#fee6bb;">
            <h3 class="text-center text-dark" id="prueba_letra">MIS ESTILOS</h3>
        </div>
    </div>
</div>
<?php include_once 'partials/footer.php' ?>
<script>
    const value_family = document.getElementById('value_family');
    const prueba_letra = document.getElementById('prueba_letra');
    prueba_letra.style.fontFamily = value_family.value;
    value_family.addEventListener('change', () => {
        prueba_letra.style.fontFamily = value_family.value;
    });
</script>