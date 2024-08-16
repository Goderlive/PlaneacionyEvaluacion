<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entrada'])) {
    require_once '../models/conection.php';
    $entrada = $_POST['entrada'];
    $trimestre = $_POST['trimestre'];
    $lineas = explode("\n", $entrada);
    function limpiarDatos($lineas) {
        $datosLimpios = [];
        foreach ($lineas as $linea) {
            // Eliminar comillas y dividir la línea en elementos
            $linea = str_replace('"', '', $linea);  // Remueve comillas
            $elementos = explode("|", $linea);
            $elementosLimpios = array_map('trim', $elementos);  // Limpia espacios antes y después
            $datosLimpios[] = $elementosLimpios; // Guarda el array limpio
        }
        return $datosLimpios;
    }

    // Limpieza de los datos
    $actividadesTxt = limpiarDatos($lineas);

    //Traemos las Actividades
    $sentencia = "SELECT * FROM actividades ac
    JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto 
    WHERE dp.anio = '2024' AND dp.tipo = 1
    ";
    $result = $con->query($sentencia);
    $actividades = $result->fetchAll(PDO::FETCH_ASSOC);

    //Funcion para traer los avances de cada actividad
    function traeAvances($con, $id_actividad, $trimestre){
        if($trimestre == 1){
            $where = "1 AND 3";
        }
        if($trimestre == 2){
            $where = "4 AND 6";
        }
        if($trimestre == 3){
            $where = "7 AND 9";
        }
        if($trimestre == 4){
            $where = "10 AND 12";
        }
        $sentencia = "SELECT * FROM avances
        WHERE id_actividad = $id_actividad AND mes BETWEEN $where
        ";
        $result = $con->query($sentencia);
        $avances = $result->fetchAll(PDO::FETCH_ASSOC);

        $ttl = 0;
        foreach($avances as $a){
            $ttl += $a['avance'];
        }
        return $ttl;
    }

    function traeReconducciones($con, $id_actividad){
        $sentencia = "SELECT * FROM programacion_reconducciones
        WHERE id_actividad = $id_actividad
        ORDER BY id_programaciones_reconduccion ASC
        ";
        $stm = $con->query($sentencia);
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }
    
    // Mostramos el titulo
    print "<h3>Estamos consultando la comparación con el trimestre " . $trimestre . "</h3><br>"; 

    //Recorremos cada actividad 

    print "Nos muestra las actividades que No se encuentran en el SIMONTS<br>";
    foreach($actividadesTxt as $t1){
        $clavetxt = $t1[2] . $t1[3] . $t1[4] .$t1[5] . $t1[6] . $t1[7] . $t1[8] . $t1[9] . $t1[10];
        $find = 0;
        foreach ($actividades as $ac){
            $clave = $ac['clave_dependencia'] . $ac['clave_dependencia_auxiliar'] . $ac['codigo_proyecto'] . $ac['codigo_actividad'] ;
            if($clave == $clavetxt){
                $find = $ac;
            }
        }
        
        if($find == 0){
            print $clave . " - " . $ac['nombre_actividad'] . "<br>";
        }
    }

    print "<br>";

    print "Nos muestra las actividades que No se encuentran en el TXT pero si en el SIMONTS<br>";
    foreach ($actividades as $ac){
        $anual = $ac['enero'] + $ac['febrero'] + $ac['marzo'] + $ac['abril'] + $ac['mayo'] + $ac['junio'] + $ac['julio'] + $ac['agosto'] + $ac['septiembre'] + $ac['octubre'] + $ac['noviembre'] + $ac['diciembre'];
        $clave = $ac['clave_dependencia'] . $ac['clave_dependencia_auxiliar'] . $ac['codigo_proyecto'] . $ac['codigo_actividad'] ;
        $find = 0;

        foreach($actividadesTxt as $t){
            $clavetxt = $t[2] . $t[3] . $t[4] .$t[5] . $t[6] . $t[7] . $t[8] . $t[9] . $t[10];
            if($clave == $clavetxt){
                $find = $t;
            }
        }

        if($find == 0){
            print $clave . $ac['nombre_actividad'] . "<br>";
        }
    }


    print "Se muestran las diferencias: <br> "; 

    foreach ($actividades as $ac){
        if($trimestre == 1){
            $programadotrimestral = $ac['enero'] + $ac['febrero'] + $ac['marzo'];
        }
        if($trimestre == 2){
            $programadotrimestral = $ac['abril'] + $ac['mayo'] + $ac['junio'];
        }
        if($trimestre == 2){
            $programadotrimestral = $ac['julio'] + $ac['agosto'] + $ac['septiembre'];
        }
        if($trimestre == 2){
            $programadotrimestral = $ac['octubre'] + $ac['noviembre'] + $ac['diciembre'];
        }

        $anual = $ac['enero'] + $ac['febrero'] + $ac['marzo'] + $ac['abril'] + $ac['mayo'] + $ac['junio'] + $ac['julio'] + $ac['agosto'] + $ac['septiembre'] + $ac['octubre'] + $ac['noviembre'] + $ac['diciembre'];
        $clave = $ac['clave_dependencia'] . $ac['clave_dependencia_auxiliar'] . $ac['codigo_proyecto'] . $ac['codigo_actividad'] ;
        $find = 0;

        foreach($actividadesTxt as $t){
            $clavetxt = $t[2] . $t[3] . $t[4] .$t[5] . $t[6] . $t[7] . $t[8] . $t[9] . $t[10];
            if($clave == $clavetxt){
                $find = $t;
            }
        }

        if($find != 0){
            $avance = traeAvances($con, $ac['id_actividad'], $trimestre);
            if($find[16] != 0){
                if($find[16] != $anual){
                    print $find[2] . " - " . $find[3] . " - " . $find[4] . $find[5] . $find[6] . $find[7] . $find[8] . $find[9] . " - " . $find[11] . " - " . $find[12] . " - " . $anual . " " .  "El ANUAL 2 es diferente<br>";
                }
            }elseif($find[13] != $anual){
                print $find[2] . " - " . $find[3] . " - " . $find[4] . $find[5] . $find[6] . $find[7] . $find[8] . $find[9] . " - " . $find[11] . " - " . $find[12] . " - " . $anual . " " .  "El ANUAL es diferente<br>";
            }
            if($find[17] != $programadotrimestral){
                print $find[2] . " - " . $find[3] . " - " . $find[4] . $find[5] . $find[6] . $find[7] . $find[8] . $find[9] . " - " . $find[11] . " - " . $find[12] . " - " . $programadotrimestral . " PROGRAMADO TRIMESTRAL es diferente<br>";
            }
            if($find[18] != $avance){
                print $find[2] . " - " . $find[3] . " - " . $find[4] . $find[5] . $find[6] . $find[7] . $find[8] . $find[9] . " - " . $find[11] . " - " . $find[12] . " - " . $avance . " AVANCE TRIMESTRAL es diferente<br>";
            }
        }
    }



}   



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar Trimestral</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>

<body class="m-4">

    <h4 class="text-2xl font-bold dark:text-white">Coparador de avances SIMONTS y avances TXT</h4>
    <br>
    <form action="" method="post">

        <select name="trimestre" id="trimestre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="1">1er Trimestre</option>
            <option value="2">2do Trimestre</option>
            <option value="3">3er Trimestre</option>
            <option value="4">4to Trimestre</option>
        </select>
<br>        <p>Pegar el contenido del TXT a continuación</p>
        <textarea name="entrada" id="entrada" cols="90" rows="30" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Revisar</button>

    </form>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>