<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista de Datos del usuario ID</title>
</head>
<body>
    <?php 
    /*var_dump($data); 
    echo "br";
    echo "br";
    echo "br************";
    echo $data['contacto']->nombre;
    exit();
    */
    ?>
    
    <?php if ((isset($data['mensaje'])) && ($data['mensaje'] != '')): ?>
        <h2><?php echo htmlspecialchars($data['mensaje']); ?></h2>
    <?php endif; ?>

    <?php if ($data): ?>
       
        
        <form action=<?php echo "http://127.0.0.1/tiendamvc/customer/update/" . $data['contacto']->id; ?> method="POST">
            <input type="text" name="id" placeholder="<?php echo htmlspecialchars($data['contacto']->id); ?>" readonly><br><br>
            
            <label for="nombre">Nombre y Apellido:</label>
            <input type="text" id="campo1" name="nombreApellido" placeholder="<?php echo htmlspecialchars($data['contacto']->nombre); ?>" required><br><br>
            
            <label for="campo2">Teléfono:</label>
            <input type="text" id="campo2" name="tlf" placeholder="<?php echo htmlspecialchars($data['contacto']->telefono); ?>" required><br><br>

            <label for="campo3">Email:</label>
            <input type="text" id="campo3" name="email" placeholder="<?php echo htmlspecialchars($data['contacto']->email); ?>" required><br><br>

            <label for="campo4">Dirección:</label>
            <input type="text" id="campo4" name="direccion" placeholder="<?php echo htmlspecialchars($data['contacto']->direccion); ?>" ><br><br>

            <button type="submit" name="upd">Actualizar</button>
        </form>
    <?php endif; ?>
    <form action="http://127.0.0.1/agenda/" method="post">
        <input type="text" name="cancelar" style="display: none">
        <input type="submit" value="CANCELAR"><br>
    </form>

</body>
</html>

