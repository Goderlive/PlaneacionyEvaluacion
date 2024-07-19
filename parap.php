<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>

<body class="bg-gray-100 p-6">

    <?php
require_once 'models/conection.php';
$trimestre = 2;
    $sqldependencia = "SELECT * FROM dependencias dp 
WHERE dp.anio = '2024'";
    $stmdependencia = $con->query($sqldependencia);
    $dependencias = $stmdependencia->fetchAll(PDO::FETCH_ASSOC);


    function traeAreas($con, $id_dependencia){
        $sql = "SELECT * FROM areas WHERE id_dependencia = $id_dependencia";
        $stm = $con->query($sql);
        $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $areas;
    }

    
    function sumaProgramada($a, $trimestre)
    {
        if ($trimestre == 1) {
            return $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'];
        }
        if ($trimestre == 2) {
            return $a['abril'] + $a['mayo'] + $a['junio'];
        }
        if ($trimestre == 3) {
            return $a['julio'] + $a['agosto'] + $a['septiembre'];
        }
        if ($trimestre == 4) {
            return $a['octubre'] + $a['noviembre'] + $a['diciembre'];
        }
    }


    function traeavances($con, $id_actividad, $mes_maximo, $mes_minimo)
    {
        $sql = "SELECT SUM(avance) as avance 
    FROM avances 
    WHERE validado = 1 AND validado_2 = 1
    AND id_actividad = $id_actividad 
    AND mes BETWEEN $mes_minimo AND $mes_maximo";
        $stm = $con->query($sql);
        $avance = $stm->fetch(PDO::FETCH_ASSOC);
        return $avance['avance'];
    }

$mes_maximo = 6; 
$mes_minimo = 1;

    foreach ($dependencias as $d) {
        $areas = traeAreas($con, $d['id_dependencia']);

        foreach ($areas as $ar) { //Recorremos las areas y buscamos sus actividades
            $id_area = $ar['id_area'];
            $sql = "SELECT * FROM actividades a 
                    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
                    WHERE a.id_area = $id_area";
            $stm = $con->query($sql);
            $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
            $actvidadesSuma = array();
            foreach ($actividades as $a) { // Recorremos las actividades en busqueda de sus avances y los sumamos a un total por area
                $metaActividad = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
                $id_actividad = $a['id_actividad'];
                $avancetotal = traeavances($con, $id_actividad, $mes_maximo, $mes_minimo);
                $resultado_operacion = ($metaActividad != 0) ? ($avancetotal / $metaActividad) * 100 : "100";
                array_push($actvidadesSuma, $resultado_operacion);
            }

            $suma = 0;
            foreach ($actvidadesSuma as $numero) {
                $suma += $numero;
            }
            // Obtener longitud
            $cantidadDeElementos = count($actvidadesSuma);
            // Dividir, y listo
            if ($cantidadDeElementos > 0) {
                $promedio = $suma / $cantidadDeElementos;
            } else {
                $promedio = 0;
            }


            print $d['nombre_dependencia'] . "|" . $ar['nombre_area'] . "|" . '100' . "|" . $promediosActividades = number_format($promedio, 2) . '<br>' ;
        }
    }

    ?>


</body>

</html>