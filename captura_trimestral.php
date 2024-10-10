<?php
session_start();
if (!$_SESSION['sistema'] == "pbrm") {
    header("Location: index.php");
    die();
}
$anio = $_SESSION['anio'];
$trimestre = 3;
$id_usuario = $_SESSION['id_usuario'];
$post_trimestre = $_POST['trimestre'];
require_once 'Controllers/Inicio_Controlador.php';
include 'header.php';
include 'head.php';



function defineElMes($trimestre){
    if($trimestre == 1){
        $mes1 = 1;
        $mes3 = 3;
    } 
    if($trimestre == 2){
        $mes1 = 4;
        $mes3 = 6;
    }
    if($trimestre == 3){
        $mes1 = 7;
        $mes3 = 9;
    } 
    if($trimestre == 4){
        $mes1 = 10;
        $mes3 = 12;
    }

    return array($mes1,$mes3);
}

function revisaavances($con, $id_actividad, $mes1, $mes3){
    $sql = " SELECT * FROM avances 
        WHERE id_actividad = $id_actividad AND mes BETWEEN $mes1 AND $mes3
        ORDER BY mes ASC
        ";
    $stm = $con->query($sql);
    $avances = $stm->fetchAll(PDO::FETCH_ASSOC);
 
    return $avances;
}

function avanceacumulado($con, $id_actividad, $mesfinal){
    $sql = " SELECT SUM(avance) FROM avances 
    WHERE id_actividad = $id_actividad AND mes BETWEEN 1 AND $mesfinal
    ";
$stm = $con->query($sql);
$avances = $stm->fetchAll(PDO::FETCH_ASSOC);

return $avances;
}


function traeActividades($con){
    $sql = " SELECT * FROM actividades ac
    LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area 
    LEFT JOIN dependencias dp ON ar.id_dependencia = dp.id_dependencia 
    LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    WHERE dp.tipo = 1 AND dp.anio = '2024'
    ORDER BY dg.clave_dependencia, da.clave_dependencia_auxiliar, py.codigo_proyecto, ac.codigo_actividad
    ";
        $stm = $con->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatos de captura trimestral</title>
</head>

<body>

    <?php if (!$_POST) : ?>
        <br>
        <div class="text-center">
            <br>
            <h4 class="text-2xl font-bold dark:text-white">Generación de archivo para captura trimestral</h4>
            <br><br>
        </div>
        <div>
            <form class="max-w-sm mx-auto" method="POST">
                <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione Indicadores o Actividades</label>
                <select id="tipo" name="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">Actividades</option>
                    <option value="2">Incicadores</option>
                </select>
                <br>
                <label for="trimestre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione el Trimestre a Capturar</label>
                <select id="trimestre" name="trimestre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">1er Trimestre</option>
                    <option value="2">2do Trimestre</option>
                    <option value="3">3er Trimestre</option>
                    <option value="4">4to Trimestre</option>
                </select>
                <br>
                <label for="periodicidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mostrar Información</label>
                <select id="periodicidad" name="periodicidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">Trimestral</option>
                    <option value="2">Mensual</option>
                    <option value="3">Ambos</option>
                </select>
                <br>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Continuar</button>


            </form>
        </div>

    <?php endif ?>

    <?php if ($_POST) : // Aqui comenzamos con los ifs de las opciones 
    ?>

        <?php if ($_POST['tipo'] == '3') : ?>
            NOS DICE LAS LINEAS DE ACCION QUE NO TIENEN ACTIVIDAD VINCULADA
            <?php
            $sqlpdm = "SELECT * FROM pdm_lineas 
            WHERE id_linea NOT IN (SELECT id_linea FROM lineasactividades WHERE anio = $anio)
            ";
            $stm = $con->query($sqlpdm);
            $verificavinculacion = $stm->fetchAll(PDO::FETCH_ASSOC); ?>


            <?php foreach ($verificavinculacion as $uno) : ?>
                <?= $uno['clave_linea'] . ' ' . $uno['nombre_linea'] ?>
                <br>
            <?php endforeach ?>
        <?php endif ?>


        <?php if (isset($_POST['tipo']) && $_POST['tipo'] == 2) : ?>

            <?php $sql = " SELECT * FROM indicadores_uso iu
                LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
                LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador
                LEFT JOIN dependencias dp ON iu.id_dependencia = dp.id_dependencia 
                LEFT JOIN dependencias_generales dg ON iu.id_dep_general = dg.id_dependencia
                LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
                LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
                WHERE ai.trimestre = $trimestre AND dp.anio = '2024' AND (i.frecuencia = 'Trimestral')
                ORDER BY dg.clave_dependencia, da.clave_dependencia_auxiliar, py.codigo_proyecto
                ";

            $stm = $con->query($sql);
            $indicadores_avances = $stm->fetchAll(PDO::FETCH_ASSOC); ?>


            Nos muestras las areas que faltan por capurar indicadores: <br>
            <?php foreach ($indicadores_avances as $ind) : ?>
                <?php if (!$ind['id_avance']) : ?>
                    <?= $ind['nombre_dependencia'] . " - " . $ind['id'] . "<br>" ?>
                <?php endif ?>

            <?php endforeach ?>
            <br>



            Muestra los avances de indicadores <br>
            <?php 
            print '<pre>'; 
            var_dump($trimestre); ?>
            <table>

                <?php foreach ($indicadores_avances as $indica) : ?>
                    <?php if ($indica['id_avance']) : ?>
                        <?= "<tr>" . "<td>" . $indica['clave_dependencia'] . " | " .
                            $indica['clave_dependencia_auxiliar'] . " | " .
                            $indica['codigo_proyecto'] . " | " .
                            $indica['nombre'] . " | " .
                            $indica['at2'] . " | " .
                            $indica['avance_a'] . "</td>" . "</tr>" ?>
                        <?= "<tr>" . "<td>" . $indica['clave_dependencia'] . " | " .
                            $indica['clave_dependencia_auxiliar'] . " | " .
                            $indica['codigo_proyecto'] . " | " .
                            $indica['nombre'] . " | " .
                            $indica['bt2'] . " | " .
                            $indica['avance_b'] . "</td>" . "</tr>" ?>
                        <tr>
                            <td>-</td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
                <br>
                <br>
            </table>

            <div class="container text-center mx-auto">

                <h1> nos dice las actividades faltantes de reportar PDM</h1>

                <?php foreach ($actividadesyavancespdm as $faltamagi) : ?>
                    <?php if (isset($faltamagi['id_linea'])) : ?>
                        <?php if (!$faltamagi['id_avance']) : ?>
                            <?= $faltamagi['nombre_dependencia'] . " /// " .  $faltamagi['nombre_actividad'] ?> <br>
                        <?php endif ?>
                    <?php endif ?>
                <?php endforeach ?>

            <?php endif ?>
            <br><br><br>
            <?php if (isset($_POST) && $_POST['tipo'] == 1) : ?>

                <?php $meses = defineElMes($_POST['trimestre']) ?>


                <h2>Nos muestra las actividades listas para capturar</h2>
                <?php $actividadesyavances = traeActividades($con) ?>
                
                "Dep. Gen"|"Dep. Aux"|"Proyecto"|"No. Actividad"|"Nombre Actividad"|"Programado Anual"|"otro dato"| <br>
                <br>
                <?php
                $contador = 0;
                print "<table>";
                foreach ($actividadesyavances as $a) :
                    if ($trimestre == $post_trimestre) {
                        $avance = revisaavances($con, $a['id_actividad'], $meses[0], $meses[1]);
                        $avanceacumulado = avanceacumulado($con, $a['id_actividad'], $mes[1]);

                        $metatrimav = 0;
                        if($avance){
                            if(count($avance) == 3){
                                foreach ($avance as $v) {
                                    $metatrimav += $v['avance'];
                                }
                            }
                        }else{
                            $avance = array(array("avance"=> "sin avance"), array("avance"=> "sin avance"), array("avance"=> "sin avance"));
                        }

                        if($trimestre == 1){
                        $metatrimpro = $a['enero'] + $a['febrero'] + $a['marzo'];
                        }
                        if($trimestre == 2){
                        $metatrimpro = $a['abril'] + $a['mayo'] + $a['junio'];
                        }
                        if($trimestre == 3){
                        $metatrimpro = $a['julio'] + $a['agosto'] + $a['septiembre'];
                        }
                        if($trimestre == 4){
                        $metatrimpro = $a['octubre'] + $a['noviembre'] + $a['diciembre'];
                        }

                        
                        $metatrimpro = $a['julio'] + $a['agosto'] + $a['septiembre'];
                        $prog_acumulado = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'];
                        $metaanual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
                        print '"' . $a['clave_dependencia'] . '"|"' . $a['clave_dependencia_auxiliar'] . '"|"' . $a['codigo_proyecto'] . '"|"' . $a['codigo_actividad'] . '"|"' . $a['nombre_actividad'] . '"|"';
                        print $metaanual . '"|"' . $a['abril'] . '"|"' . $a['mayo'] . '"|"' . $a['junio'] . '"|"';
                        print @$prog_acumulado . '"|"';
                        print @$avance[0]['avance'] . '"|"';
                        print @$avance[1]['avance'] . '"|"';
                        print @$avance[2]['avance'] . '"';
                        print @$avanceacumulado . '"|"';
                        print "<br>";
                        $contador += 1;
                    } ?>

                <?php endforeach ?>
                </table>

                Nos dice las dependencias que faltan de capturar actividades <br>
                <?php
                $sql = " SELECT * FROM actividades ac
                LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
                LEFT JOIN areas ar ON ar.id_area = ac.id_area 
                LEFT JOIN dependencias dp ON ar.id_dependencia = dp.id_dependencia 
                LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia
                LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
                LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
                WHERE dp.tipo = 1
                ";
                $stm = $con->query($sql);
                $actividadesyavances = $stm->fetchAll(PDO::FETCH_ASSOC); ?>


                <?php
                $contador = 0;


                foreach ($actividadesyavances as $a) :
                    if ($trimestre == 4) {
                        $avance = revisaavances($con, $a['id_actividad'], 10, 12);
                        if (count($avance) != 3) {
                            print $a['nombre_dependencia'] . " esta incompleta " . $a['nombre_actividad'] . " <br>";
                            $contador += 1;
                        }
                    } ?>
                <?php endforeach ?>

            <?php endif ?>
        <?php endif ?>

        <?php include 'footer.php'; ?>

</body>

</html>