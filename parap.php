<?php
require_once 'models/conection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Para Pruebas 1</title>
</head>

<body>

    <?php

    $consulta = "SELECT * FROM indicadores_uso iu
    LEFT JOIN dependencias dp ON iu.id_dependencia = dp.id_dependencia
    ";
    $stm = $con->query($consulta);
    $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);


    function avanceIndicadores($con, $id_indicador)
    {
        $consulta = "SELECT * FROM avances_indicadores WHERE id_indicador = $id_indicador";
        $stm = $con->query($consulta);
        $avances = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $avances;
    }




    foreach ($indicadores as $i) {
        $id_indicador = $i['id'];
        $avances = avanceIndicadores($con, $id_indicador);
        $avanceTotalA = 0;
        $avanceTotalB = 0;
        foreach ($avances as $a) {
            $avanceTotalA += $a['avance_a'];
            $avanceTotalB += $a['avance_b'];
        }
        $programacionAnualA = $i['at1'] + $i['at2'] + $i['at3'] + $i['at4'];
        $programacionAnualB = $i['bt1'] + $i['bt2'] + $i['bt3'] + $i['bt4'];
        print $i['nombre_dependencia']. '<br>';
        print $i['nombre_indicador']. '<br>';


        // Verificación para evitar división por cero y para imprimir solo si está fuera del rango .91 a 1.09
        if ($programacionAnualA != 0) {
            $resultadoA = $avanceTotalA / $programacionAnualA;
            if ($resultadoA < 0.90 || $resultadoA > 1.10) {
                print $resultadoA . '<br>';
            }
        } else {
            print "N/A (programación anual A es 0)<br>";
        }
    
        if ($programacionAnualB != 0) {
            $resultadoB = $avanceTotalB / $programacionAnualB;
            if ($resultadoB < 0.90 || $resultadoB > 1.10) {
                print $resultadoB . '<br>';
            }
        } else {
            print "N/A (programación anual B es 0)<br>";
        }
    
        print '<br>';
    }
    
    




    ?>
</body>

</html>