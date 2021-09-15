const title_main_products = document.getElementById('title_main_products');
const listProducts = document.getElementById('listProducts');
const imagenes = {
    "Inmuebles" : {ruta_img: 'img/properties.svg'},
    "Oficina" : {ruta_img: 'img/office.svg'},
    "Deportes" : {ruta_img: 'img/sports.svg'},
    "Hogar" : {ruta_img: 'img/home.svg'},
    "Electrónica" : {ruta_img: 'img/electronics.svg'},
    "Musica" : {ruta_img: 'img/music.svg'},
    "Mascotas" : {ruta_img: 'img/pets.svg'},
    "other" : {ruta_img: 'img/other_category.svg'}

}
const getProduts = () => {
    //Renderizamos todos los productos....
    const form = new FormData();
    const ajax = new XMLHttpRequest();
    ajax.open('POST', 'endpoints/consumos-ajax.php');
    form.append("key",'list-products');
    ajax.onreadystatechange = () => {
        if(ajax.readyState === 4 && ajax.status === 200){
            const response = JSON.parse(ajax.responseText);
            const {codigo, data} = response;
            if(codigo === 200){
                listProducts.innerHTML = '';
                title_main_products.innerHTML = 'Lista de Productos';
                data.forEach(producto => {
                    const {nom_producto,nombreCategoria,precio,ofertas,cod_empresa, id} = producto;
                    let new_nombreCat = (nombreCategoria === 'Inmuebles o propiedades') ? 'Inmuebles' : nombreCategoria;
                    const {ruta_img} = imagenes[new_nombreCat];
                    listProducts.innerHTML += renderProducts(nom_producto,ruta_img,precio,ofertas,cod_empresa,id);
                });
            }else{
                listProducts.innerHTML = notFound();
            }
        }
    }
    ajax.send(form);
}
const getProductsByCategory = (element) => {
    //Renderizamos productos por categoria
    const categoria = element.getAttribute('data-id');
    const nom_cateogria = element.children[1].textContent;
    const form = new FormData();
    const ajax = new XMLHttpRequest();
    ajax.open('POST', 'endpoints/consumos-ajax.php');
    form.append("key",'list-products-by-category');
    form.append("categoria", categoria);
    ajax.onreadystatechange = () => {
        if(ajax.readyState === 4 && ajax.status === 200){
            console.log(ajax.responseText);
            const response = JSON.parse(ajax.responseText);
            const {codigo, data} = response;
            if(codigo === 200){
                listProducts.innerHTML = '';
                title_main_products.innerHTML = 'Categoria de la lista: '+ data[0].nombreCategoria;
                data.forEach(producto => {
                    const {nom_producto,nombreCategoria,precio,ofertas,cod_empresa, id} = producto;
                    let new_nombreCat = (nombreCategoria === 'Inmuebles o propiedades') ? 'Inmuebles' : nombreCategoria;
                    const {ruta_img} = imagenes[new_nombreCat];
                    listProducts.innerHTML += renderProducts(nom_producto,ruta_img,precio,ofertas,cod_empresa,id);
                });
            }else{
                listProducts.innerHTML = notFound();
            }
        }
    }
    ajax.send(form);
}
const renderProducts = (nom_producto, ruta_img, precio, ofertas, cod_empresa, cod_producto) => {
    let tmp_ofertas = '';
    
    if(ofertas !== '0'){
        const descuento = ((parseFloat(precio) * parseFloat(ofertas))/100).toFixed(2);
        const precio_final = (parseFloat(precio) - descuento).toFixed(2);
        tmp_ofertas = `<p class="mb-0 text-bold">${nom_producto}</p>
                            <del class="card-text text-muted mb-0">$${precio}</del><span class="ml-2" style="color:#fe738f">${ofertas}%</span>
                        <p class="mb-0">$${precio_final}</p>`;
    }else{
        tmp_ofertas = `<p class="mb-0 text-bold" style="font-size:18px">${nom_producto}</p>
                        <p class="card-text mb-0">$${precio}</p>
                        <p class="mb-0" style="color:#a42d28">Sin ofertas</p>`
    } 
    return `<div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card pt-4">
                    <img src="${ruta_img}" class="py-2 card-img-top" alt="...">
                    <div class="card-body">
                        ${tmp_ofertas}
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-end">
                        <form action="index.php?c=cliente&a=generatePedido" class="p-0" style="border:none" method="POST">
                            <input type="hidden" id="cod_empresa" name="cod_empresax" value=${cod_empresa}>
                            <input type="hidden" id="cod_producto" name="cod_producto" value=${cod_producto}>
                            <input type="hidden" id="precio" name="precio" value=${precio}>
                            <input type="hidden" id="oferta" name="oferta" value=${ofertas}>
                            <input type="hidden" id="nom_producto" name="nom_producto" value=${nom_producto}>
                            <button type="submit" class="btn btn-info">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>`;
}
const notFound = () => {
    return `
        <div class="col-12 text-center">
            <img src="img/not_found.svg" class="py-2 w-75 h-75" alt="#not Founds">
            <div class="card-body">
                <p>No se encontraron productos disponibles...</p>
            </div>
        </div>
    `;
}
//Inicializar....
getProduts();

