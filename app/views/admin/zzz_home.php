<?php
/* 
session_start();  
var_dump($_SESSION);
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $data['mensaje'] ?></h1>
    <a href="<?=base_url()?>login">Login</a>

<hr>

    <?php
        $controladores = [
            'Usuario' => ['crear', 'editar', 'eliminar'],
            'Producto' => ['listar', 'mostrar', 'actualizar'],
            'Orden' => ['procesar', 'cancelar', 'enviar']
        ];

 
    ?>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const controladores = <?php echo json_encode($controladores); ?>;
            const baseUrl = "<?php echo base_url(); ?>";

            const controladorSelect = document.getElementById('controlador');
            const metodoSelect = document.getElementById('metodo');

            controladorSelect.addEventListener('change', function () {
                const controlador = controladorSelect.value;
                metodoSelect.innerHTML = '';

                if (controlador) {
                    controladores[controlador].forEach(function (metodo) {
                        const option = document.createElement('option');
                        option.value = metodo;
                        option.textContent = metodo;
                        metodoSelect.appendChild(option);
                    });

                    metodoSelect.style.display = 'block';
                } else {
                    metodoSelect.style.display = 'none';
                }
            });
        });
    </script>
    

    <div class="container">
        <h2>Seleccione un Controlador y Método</h2>
        <div class="form-group">
            <label for="controlador">Controlador:</label>
            <select id="controlador" class="form-control">
                <option value="">Seleccione un controlador</option>
                <?php foreach ($controladores as $controlador => $metodos): ?>
                    <option value="<?php echo htmlspecialchars($controlador); ?>"><?php echo htmlspecialchars($controlador); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group" style="display: none;" id="metodoDiv">
            <label for="metodo">Método:</label>
            <select id="metodo" class="form-control" style="display: none;"></select>
        </div>
    </div>

</body>
</html>
