
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.0/dist/flowbite.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

    <title>Sistema</title>
</head>


<?php

function tiempos($dato_timestamp){
    $hora_actual = date('Y-m-d H:i:s');
    $timestamp_bd = strtotime($dato_timestamp);
    $diferencia = time() - $timestamp_bd;
    $dias_diferencia = floor($diferencia / (60 * 60 * 24));
    $horas_diferencia = floor(($diferencia % (60 * 60 * 24)) / 3600);
    $minutos_diferencia = floor(($diferencia % 3600) / 60);

    // Imprime el resultado
    echo "Reportado hace:\n";
    if($dias_diferencia != 0){
        if($dias_diferencia > 1){
            echo $dias_diferencia . ' días, ';
        }else{
            echo $dias_diferencia . ' día, ';
        }
    }
    if($horas_diferencia != 0){
        if($horas_diferencia > 1){
            echo $horas_diferencia . ' horas, ';
        }else{
            echo $horas_diferencia . ' hora, ';
        }
    }
    echo $minutos_diferencia . " minutos";
}




?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>
</html>
