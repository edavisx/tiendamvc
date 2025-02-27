<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Cliente</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Registrar Nuevo Cliente</h2>
        <form action="http://127.0.0.1/tiendamvc/customer/new" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" >
            </div>
            <h4> Dirección</h4>
            <div class="form-group">
                <label for="telefono">street:</label>
                <input type="text" class="form-control" id="" name="calle" >
            </div>
            <div class="form-group">
                <label for="telefono">zip-code:</label>
                <input type="text" class="form-control" id="" name="codigoPostal" >
            </div>
            <div class="form-group">
                <label for="telefono">city:</label>
                <input type="text" class="form-control" id="" name="ciudad" >
            </div>
            <div class="form-group">
                <label for="telefono">country:</label>
                <input type="text" class="form-control" id="" name="pais" >
            </div>

            <button type="submit" class="btn btn-primary btn-block">Registrar Cliente</button>
        </form>
    </div>

    <!-- Incluye Bootstrap JS y dependencias -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
