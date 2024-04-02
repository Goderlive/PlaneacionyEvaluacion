<?php
session_start();
require_once '../models/conection.php';
require_once 'indicadoresgaceta.php';
mb_internal_encoding('UTF-8');

if (!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")) {
    header("Location: ../index.php");
}



function uneIndicadores($indicadores_gaceta, $indicadores_osfem)
{



    foreach ($indicadores_gaceta as $i) {
        $nombre_gaceta = mb_strtolower($i[8]);
        $nombre_gaceta = rtrim($nombre_gaceta, '.');
        $programa_gaceta = mb_strtolower($i[0]);
        $programa_gaceta = rtrim($programa_gaceta, '.');
        $find = 0;
        foreach ($indicadores_osfem as $o) {
            $nombre_osfem = mb_strtolower($o[3]);
            $nombre_osfem = rtrim($nombre_osfem, '.');
            $programa_osfem = mb_strtolower($o[1]);
            $programa_osfem = rtrim($programa_osfem, '.');

            similar_text($nombre_osfem, $nombre_gaceta, $percent_nombre);
            similar_text($programa_osfem, $programa_gaceta, $percent_programa);

            // Definir un umbral de similitud, por ejemplo, 80%
            if ($percent_nombre > 80 && $percent_programa > 80) {
                $find = $o;
                break; // Rompe el bucle si encuentra una coincidencia
            }
        }


        if ($find != 0) {
            $varA = mb_strtolower($find[6]);
            $varA = mb_strtoupper(mb_substr($varA, 0, 1)) . mb_substr($varA, 1);
            $varB = mb_strtolower($find[7]);
            $varB = mb_strtoupper(mb_substr($varB, 0, 1)) . mb_substr($varB, 1);

            print
                $find[2] . "|" .
                $varA . "|" .
                $varB . "|" .
                $find[4] . "|" .
                $find[5] . "|" .
                $i[5] . "|" .
                $i[6] . "|" .
                $i[7] . "|" .
                $i[8] . "|" .
                $i[9] . "|" .
                $i[10] . "|" .
                $i[11] . "|" .
                $i[12] . "|" .
                $i[13] . "|" .
                $i[0] . "|";
            print "<br>";
        } else {
            print $i[8] . "//////////////////////////////////////////////////////<br>";
        }
    }
}


function IdPrograma($con, $indicadores_totales){
     
    $stm = $con->query("SELECT * FROM programas_presupuestarios WHERE anio = '2024'");
    $programas = $stm->fetchAll(PDO::FETCH_ASSOC);


    foreach($indicadores_totales as $i){
        $nombre_totales = mb_strtolower($i[14]);
        $nombre_totales = rtrim($nombre_totales, '.');
        $find = 0;

        foreach($programas as $p){
            $nombre_programas = mb_strtolower($p['nombre_programa']);
            $nombre_programas = rtrim($nombre_programas, '.');

            similar_text($nombre_totales, $nombre_programas, $percent_nombre);

            if ($percent_nombre > 90) {
                $find = $p;
                break; // Rompe el bucle si encuentra una coincidencia
            }
        }

        if ($find != 0) {

            print $find['id_programa'] . '<br>';
        }else{
            print "///////////////////////////// <br>";
        }
    }
}


function actualizaIndicadores($con){
    $sentencia = "SELECT * FROM ante_indicadores_uso ai 
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ai.id_dep_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ai.id_dep_aux
    LEFT JOIN proyectos p ON p.id_proyecto = ai.id_proyecto
    WHERE ai.anio = '2024'";
    $stm = $con->query($sentencia);
    $ante_indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);


    foreach($ante_indicadores as $a){
        $id = $a['id'];


        $general = $a['clave_dependencia'];
        $stm = $con->query("SELECT * FROM dependencias_generales WHERE clave_dependencia = '$general' AND anio = '2024'");
        $generales = $stm->fetch(PDO::FETCH_ASSOC);
        $generales = $generales['id_dependencia'];
        
        $auxiliar = $a['clave_dependencia_auxiliar'];
        $stm = $con->query("SELECT * FROM dependencias_auxiliares WHERE clave_dependencia_auxiliar = '$auxiliar' AND anio = '2024'");
        $auxiliares = $stm->fetch(PDO::FETCH_ASSOC);
        $auxiliares = $auxiliares['id_dependencia_auxiliar'];

        $proyecto = $a['codigo_proyecto'];
        $stm = $con->query("SELECT * FROM proyectos WHERE codigo_proyecto = '$proyecto' AND anio = '2024'");
        $proyectos = $stm->fetch(PDO::FETCH_ASSOC);
        $proyectos = $proyectos['id_proyecto'];

        $sql = "UPDATE ante_indicadores_uso SET id_dep_general = ?, id_dep_aux = ?, id_proyecto = ? WHERE id = $id";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($generales, $auxiliares, $proyectos));
    }
}




//uneIndicadores($indicadores_gaceta, $indicadores_osfem);
//IdPrograma($con, $indicadores_totales);
//indicadores_uso($con);

actualizaIndicadores($con);