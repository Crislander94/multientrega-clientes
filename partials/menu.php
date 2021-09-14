<aside class="main-sidebar color elevation-4">
    <a href="#" class="brand-link">
      <img src="img/logo3.jpg" alt="" >     
    </a>
    <?php if(!isset($_GET['c'])):?>
        <div class="sidebar p-0">
            <h3>Categorias</h3>
            <?php
                $sql = "select id,descripcion from categorias";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll();
                foreach ($resultado as $key => $categoria) {
                    $descripcion = $categoria["descripcion"];
                    echo '<p style="position:relative" class="p-3 mb-0 list-menu" data-id="'.$categoria["id"].'" onclick="getProductsByCategory(this)">';
                    //Iconos....
                    if($descripcion === 'Oficina'){echo '<i class="fas fa-briefcase mr-3"></i>';}
                    else if($descripcion === 'Inmuebles o propiedades'){echo '<i class="fas fa-store-alt mr-3"></i>';}
                    else if($descripcion === 'Deportes'){echo '<i class="fas fa-futbol mr-3"></i>';}
                    else if($descripcion === 'Hogar'){echo '<i class="fas fa-home mr-3"></i>';}
                    else if($descripcion === 'Electrónica'){echo '<i class="fas fa-charging-station mr-3"></i>';}
                    else if($descripcion === 'Musica'){echo '<i class="fas fa-music mr-3"></i>';}
                    else if($descripcion === 'Mascotas'){echo '<i class="fas fa-paw mr-3"></i>';}
                    else {echo '<i class="fas fa-question"></i>';}
                    $descripcion = (strlen($descripcion) > 12) ? substr($descripcion,0,8).'...' : $descripcion;
                    echo '<span style="position:absolute; left:48px;">'.$descripcion.'</span></p>';
                }

            ?>
        </div>
    <?php else: ?>
        <p style="position:relative" class="p-3 mb-0 list-menu">
            <i class="fas fa-question"></i>
            <span style="position:absolute; left:48px;">Generando pedido</span>
        </p>
    <?php  endif; ?>
  </aside>