// Obtener el URL completo
const fullUrl2 = window.location.href;

// Dividir el URL en partes usando "/" como separador
const parts = fullUrl2.split('/');

// Unir las primeras cuatro partes (incluyendo el protocolo)
const result = parts.slice(0, 4).join('/') + '/';
console.log(result);


fetch(result + "api/ORDER_products")
    .then(data => data.json())
    .then(datos => {
        datos.forEach(element => {
            let option = document.createElement("option");
            option.value = element.product_id;
            option.textContent = element.name;
            document.getElementById("selectProducto").appendChild(option);
        });
    })
    .catch(err => {
        console.log(err);
    })

function opcionSeleccionada() {
    const selectElement = document.getElementById("selectProducto");
    const selectedValue = selectElement.value;
    console.log("La opción seleccionada es: " + selectedValue);
    fetch(result + "api/ORDER_productoElegido/" + selectedValue)
        .then(data => data.json())
        .then(datos => {
            document.getElementById("descripcion").value = datos[0].name + " : " + datos[0].description;
            document.getElementById("precio").value = datos[0].price;
            document.getElementById("ID_producto").value = datos[0].product_id;
            document.getElementById("existencia").value = datos[0].stock;
            
        })
        .catch(err => {
            console.log(err);
        })
}







//fetch("http://localhost/tiendamvc/api/products")
fetch(result + "api/products")
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
    fetch(result + "api/newproduct",{
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

///////////////////
function agregarProducto() {
    const selectElement = document.getElementById("selectProducto");
    const selectedValue = selectElement.value;
    console.log("La opción seleccionada es: " + selectedValue);
    fetch(result + "api/ORDER_productoElegido/" + selectedValue)
        .then(data => data.json())
        .then(datos => {
            document.getElementById("descripcion").value = datos[0].name + " : " + datos[0].description;
            document.getElementById("precio").value = datos[0].price;
            document.getElementById("ID_producto").value = datos[0].product_id;
            document.getElementById("existencia").value = datos[0].stock;
            
        })
        .catch(err => {
            console.log(err);
        })
}