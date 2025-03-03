<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/customer.js" defer></script>

    <?php
    /*

    // para el SELECT de Clientes se va a utilizar PHP
    // para el SELECT de Productos se va a utilizar AJAX

    <? if (isset($_POST['cliente_id'])): ?>
        <script src="<?= base_url() ?>assets/js/customer.js" defer></script>
    <? else: ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#cliente").change(function(){
                    var clienteId = $(this).val();
                    if(clienteId){
                        $.ajax({
                            type: "POST",
                            url: "cargar_productos.php",
                            data: {cliente_id: clienteId},
                            success: function(response){
                                $("#productos").html(response);
                            }
                        });
                    }
                });
            });

        </script>
    <? endif; ?>
    */
    ?>
    
    

</head>


<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">cliente: XXXXXX</span>
        </nav>

        <form id="form">


            <div class="form-group">
                <label for="">Producto:</label>
                <select id="selectProducto" placeholder="Choose..." onchange="opcionSeleccionada()">
                    <option selected>Choose...</option>
                </select>
            </div>

            <br>
        </form>

        <form id="form">
            <div class="form-group">
                <label for="">Producto:</label>
                <select id="selectProducto" placeholder="Choose..." onchange="opcionSeleccionada()">
                    <option selected>Choose...</option>
                </select>
            </div>



            <br>
            <div class="form-group col-12">
                    <label for="street">Description</label>
                    <input type="text" readonly class="form-control" id="descripcion" placeholder="Product Description">
            </div>
            <br>
            <br>
            <div>
                <label for="precioUnitario">Precio Unitario:</label>
                <input type="number" readonly id="precio">
            <br>
            </div>
            <div>
                <label for="precioUnitario">ID del Producto:</label>
                <input type="number" readonly id="ID_producto">
            <br>
            </div>
            <div>
                <label for="">Cantidad:</label>
                <input type="number" readonly id="cantidad">
            <br>
            </div>
            <div>
                <label for="precio">Total renglón:</label>
                <input type="number" readonly id="totalRenglon">
            <br>
            </div>

            <br>
            *********************
            <div>
                <label for="">STOCK:</label>
                <input type="number" readonly id="existencia">
            <br>
            </div>


            </div>

            <button type="button" onclick="añadirProducto()">Añadir</button>

            <script>
            function añadirProducto() {
                // Aquí puedes añadir la lógica para añadir el producto
                alert("Producto añadido!");
            }
            </script>

            <button type="submit" class="btn col-12 btn-primary">Añadir</button>
        </form>
        <hr>
        <table class="table table-dark table-striped w-auto mx-auto">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody id="products">   

            </tbody>
        </table>
    </div>
</body>

</html>