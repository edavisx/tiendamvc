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
   

    <div class="container">
        <h2>Seleccione un Controlador y Método</h2>

        <a href="<?=base_url() . 'admin' . '/';?>">controlador: admin - método: index</a>
        <br>
        <a href="<?=base_url() . 'api';?>">controlador: api - método: </a>
        <br>
        <a href="<?=base_url() . 'customer' . '/' . 'home';?>">controlador: admin - método: home"</a>
    </div>



</body>
</html>
