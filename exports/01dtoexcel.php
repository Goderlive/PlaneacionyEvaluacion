<?php
session_start();
require_once '../models/conection.php';
require_once 'indicadoresgaceta.php';

if (!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")) {
    header("Location: ../index.php");
}

$sql_query = "SELECT nombre_actividad FROM ante_actividades";
$result = $con->query($sql_query);
$actividades = $result->fetchAll(PDO::FETCH_ASSOC);
$data = array(array("nombre_actividad" => ""));
$actividades = $data + $actividades;


try {
    // Consulta SQL
    $sql_query = "
        SELECT *
        FROM ante_indicadores_uso ai
        LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ai.id_dep_general
        LEFT JOIN dependencias_auxiliares da ON ai.id_dep_aux = da.id_dependencia_auxiliar
        LEFT JOIN proyectos py ON py.id_proyecto = ai.id_proyecto
        LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
        ORDER BY pp.codigo_programa ASC
    ";

    // Ejecutar la consulta SQL
    $result = $con->query($sql_query);

    // Obtener todos los resultados como diccionarios
    $indicadores_uso = $result->fetchAll(PDO::FETCH_ASSOC);


    // Llamada a la función comparador con los datos adecuados
    comparador($indicadores_uso, $indicadores_gaceta, $actividades, $indicadores_osfem);
    //Revisor($indicadores_uso, $indicadores_gaceta);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}



function Revisor($indicadores_uso, $indicadores_gaceta) {
    foreach($indicadores_uso as $uso) {
        $tada2 = 0;
        $nom_uso = rtrim(mb_strtolower($uso['nombre_indicador'], 'UTF-8'), '.');

        foreach($indicadores_gaceta as $gac) {
            if($nom_uso == rtrim(mb_strtolower($gac[2], 'UTF-8'), '.')) {
                $tada2 = 1;
            }
        }

        if($tada2 == 0) {
            print($nom_uso . "<br>");
        }
    }
}


function comparador($indicadores_uso, $indicadores_gaceta, $actividades, $indicadores_osfem)
{
    $arrayencuentra2 = array("/////////////","/////////////","/////////////","/////////////","/////////////","/////////////","/////////////","/////////////");
    foreach ($indicadores_uso as $i) {
        print $i['id'];
        $indicador = $i['nombre_indicador'];
        $encuentra = 0;
        $encuentra2 = 0;
        foreach ($indicadores_gaceta as $j) {
            if ($indicador == $j[8]) {
                $encuentra = $j;
            }
        }

        foreach ($indicadores_osfem as $os) {
            $indicador = rtrim(mb_strtolower($indicador, 'UTF-8'), '.');
            $ind_isfem = rtrim(mb_strtolower($os[3], 'UTF-8'), '.');
            if ($indicador == $ind_isfem) {
                $encuentra2 = $os;
            }
        }
        if($encuentra2 == 0){
            $encuentra2 = $arrayencuentra2;
        }
        
        

        //Aqui pondremos el dato de lo capturado por Meli

        if ($encuentra != 0) {
            if ($i['actividades_ids']) {
                $metas = '';
                $activ = json_decode($i['actividades_ids']);
                foreach ($activ as $ac) {
                    if ($ac == "Seleccione las Actividades") {
                        continue;
                    } else {
                        if(isset($actividades[$ac]['nombre_actividad'])){
                           $metas .= $actividades[$ac]['nombre_actividad'] . "... ";
                        }else{
                            $metas .= " ";
                        }
                    }
                }
            } else {
                $metas = '';
            }
            $nivelIndicador = $encuentra[5][0] . $encuentra[6];

            echo $i['nombre_indicador'] . "|" . $encuentra[8] . "|2024||" . $i['clave_dependencia'] . $i['clave_dependencia_auxiliar'] . "|" . $i['codigo_proyecto'] . "|||" . $nivelIndicador . "|" .
                $encuentra[7] . "|" . // descripcion indicador
                $encuentra2[2] . "|" .
                $encuentra[8] . "|" . // nombre del indicador
                "|||" .

                // aqui comienza A
                $encuentra2[6] . "|" .
                $i['umedida_a'] . "|" .
                $i['tipo_op_a'] . "|" .
                $encuentra2[4] . "|" .
                 // Valor?
                "|||" . $i['at1'] .
                "|||" . $i['at2'] .
                "|||" . $i['at3'] .
                "|||" . $i['at4'] .
                "|" .


                // aqui comienza B
                $encuentra2[7] . "|" .
                $i['umedida_b'] . "|" .
                $i['tipo_op_b'] . "|" .
                $encuentra2[5] . "|" .
                // Valor?
                "|||" . $i['bt1'] .
                "|||" . $i['bt2'] .
                "|||" . $i['bt3'] .
                "|||" . $i['bt4'] .
                "||" .


                $encuentra[11] . "|" .
                $i['medios_de_verificacion'] . "|" .
                $encuentra[13] . "|" .
                $encuentra[3] . "|" .
                $encuentra[4] . "|" .
                $i['factor_de_comparacion'] . "|" .
                $i['desc_factor_de_comparacion'] . "|" .
                $encuentra[9] . "|" .
                $i['dimension'] . "|" .
                $i['interpretacion'] . "|" .
                $encuentra[10] . "|" .
                $i['desc_meta_anual'] . "|" .
                $metas . "|" .
                "|" .
                $i['linea_base'] . "|" .
                "<br>";
        } else {
            echo "///////////////////////////////// " . $indicador . "||<br>";
        }
    }
}
