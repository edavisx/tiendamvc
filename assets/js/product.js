const fullUrl = window.location.href;
console.log(fullUrl);

// Obtener solo el dominio
const domain = window.location.origin;
console.log(domain);

// Obtener el pathname (ruta después del dominio)
const path = window.location.pathname;
console.log(path);

// Obtener los parámetros de búsqueda
const queryString = window.location.search;
console.log(queryString);



// Obtener el URL completo
const fullUrl2 = window.location.href;

// Dividir el URL en partes usando "/" como separador
const parts = fullUrl.split('/');

// Unir las primeras cuatro partes (incluyendo el protocolo)
const result = parts.slice(0, 4).join('/') + '/';
console.log(result);



//fetch("http://localhost/tiendamvc/api/categories")
//fetch("http://127.0.0.1/tiendamvc/api/categories")
fetch(result + "api/categories")
    .then(data => data.json())
    .then(datos => {
        datos.forEach(element => {
            let option = document.createElement("option");
            option.value = element.category_id;
            option.textContent = element.name;
            document.getElementById("category").appendChild(option);
        });
    })
    .catch(err => {
        console.log(err);
    })

//AJAX forma nueva de hacer peticiones al servidor
//fetch(url, options)
//url: la url a la que se va a hacer la petición
//options: las opciones de la petición
//options.method: el método de la petición (GET, POST, PUT, DELETE)
//options.body: el cuerpo de la petición (solo para POST y PUT)
//options.headers: los encabezados de la petición
//fetch devuelve una promesa
//fetch.then(callback): se ejecuta cuando la promesa se cumple
//callback: función que recibe la respuesta del servidor
//fetch.catch(callback): se ejecuta cuando la promesa no se cumple
//callback: función que recibe el error
//fetch.then(callback).then(callback): se pueden encadenar varios then
//callback: función que recibe la respuesta del servidor
//fetch.then(callback).catch(callback): se pueden encadenar un then y un catch


//fetch("http://localhost/tiendamvc/api/providers")
//fetch("http://127.0.0.1/tiendamvc/api/providers")
fetch(result + "api/providers")
    .then(data => data.json())
    .then(datos => {
        datos.forEach(element => {
            let option = document.createElement("option");
            option.value = element.provider_id;
            option.textContent = element.name;
            document.getElementById("provider").appendChild(option);
        });
    })
    .catch(err => {
        console.log(err);
    })

//fetch("http://localhost/tiendamvc/api/products")
fetch(result + "api/PRODUCT_products")
    .then(data => data.json())
    .then(datos => {
        showproducts(datos);
    })
    .catch(err => {
        console.log(err);
    })
    
document.getElementById("form").onsubmit = function (e) {
    e.preventDefault();
    let product={
        'name': document.getElementById("name").value,
        'description':document.getElementById("description").value,
        'category_id':document.getElementById("category").value,
        'provider_id':document.getElementById("provider").value,
        'stock':document.getElementById("stock").value,
        'price':document.getElementById("price").value
    }
    //ToDO: Validar los datos
    //fetch("http://localhost/tiendamvc/api/newproduct",{
    fetch(result + "api/PRODUCT_newproduct",{
        method: 'POST',
        body: JSON.stringify(product),
        headers:{
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then(data => data.json())
    .then(datos => {
        showproducts(datos);
    })
}


function showproducts(datos){   
    let tbody = document.getElementById("products");
    tbody.innerHTML = "";
    datos.forEach(element => {
        let tr = document.createElement("tr");
        let td = document.createElement("td");
        td.textContent = element.product_id;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = element.name;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = element.description;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = element.category.name;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = element.provider.name;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = element.stock;
        tr.appendChild(td);
        td = document.createElement("td");
        td.textContent = element.price;
        tr.appendChild(td);
        tbody.appendChild(tr);
    });
}