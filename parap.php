<!DOCTYPE html>
<html lang="es">

<?php require_once 'models/conection.php' ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <title>Sistema</title>
</head>
<body>
 

<?php 
$sentencia = "SELECT ac.nombre_actividad, la.lineaactividad, a.beneficiarios FROM avances a
JOIN actividades ac ON ac.id_actividad = a.id_actividad
JOIN lineasactividades la ON a.id_actividad = la.id_actividad
JOIN pdm_lineas li ON li.id_linea = la.id_linea 
WHERE a.mes = 3  
ORDER BY `la`.`lineaactividad` ASC"; 


$stm = $con->query($sentencia);
$data = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($data as $d): ?>

    <?php 
    $texto = preg_replace('/\d+/', '', $d['beneficiarios']);
    $texto = trim($texto);
    $texto = str_replace(',', '', $texto);
    $texto = str_replace('.', '', $texto);

//    echo $texto . "\n";
    echo $d['nombre_actividad'];
  ?>
<br>

<?php endforeach ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>