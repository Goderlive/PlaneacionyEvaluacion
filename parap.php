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



    




    ?>
</body>

</html>