<?php require_once 'models/conection.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php include 'head.php'; ?>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tags-input/1.3.6/jquery.tagsinput.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tags-input/1.3.6/jquery.tagsinput.min.js"></script>
</head>
<body>

<label for="frutas">Elige o agrega tus frutas favoritas:</label>
<input type="text" id="frutas" name="frutas" list="frutas-list">
<datalist id="frutas-list">
  <option value="Manzana">
  <option value="Banana">
  <option value="Naranja">
  <option value="Pera">
  <option value="Piña">
</datalist>

<script>
    const datalist = document.querySelector('#frutas-list');

// Crear una nueva opción
const nuevaOpcion = document.createElement('option');
nuevaOpcion.value = 'Mango';

// Agregar la nueva opción al datalist
datalist.appendChild(nuevaOpcion);

</script>

</body>
</html>