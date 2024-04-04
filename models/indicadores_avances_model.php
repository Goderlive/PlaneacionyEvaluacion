<?php 
require_once 'conection.php';

function TraeDependencias($con, $id_usuario){
    $stm = $con->query("SELECT * FROM dependencias dp
    JOIN indicadores_uso iu ON iu.id_dependencia = dp.id_dependencia 
    WHERE id_administrador = $id_usuario
    GROUP BY dp.id_dependencia
    ");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}

function TraeTodasDependencias($con){
    $anio = $_SESSION['anio'];
    $stm = $con->query("SELECT * FROM dependencias dp
    JOIN indicadores_uso iu ON iu.id_dependencia = dp.id_dependencia 
    WHERE dp.anio = $anio
    GROUP BY dp.id_dependencia
    ");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($dependencias);
    return $dependencias;
}

function TraeNombredependencia($con, $id_dependencia)
{
    $stm = $con->query("SELECT nombre_dependencia FROM dependencias WHERE id_dependencia = $id_dependencia");
    $nombre_dependencia = $stm->fetch(PDO::FETCH_ASSOC);
    return $nombre_dependencia['nombre_dependencia'];
}


function traeavance($con, $id_indicador, $trimestre){
    $resp = "SELECT av.*, us.id_usuario, us.nombre, us.apellidos, us.correo_electronico, us.tel FROM avances_indicadores av
        LEFT JOIN usuarios us ON av.id_usuario_reporta = us.id_usuario
        WHERE av.id_indicador = $id_indicador AND av.trimestre = $trimestre";
    $stm = $con->query($resp);
    $avances = $stm->fetch(PDO::FETCH_ASSOC);
    return $avances;
}

function tieneavances($con, $id_indicador, $trimestre){
    $resp = "SELECT id_avance, validado FROM avances_indicadores WHERE id_indicador = $id_indicador AND trimestre = $trimestre";
    $stm = $con->query($resp);
    $avances = $stm->fetch(PDO::FETCH_ASSOC);
    return $avances;
}



function Indicadores($con, $trimestre, $id_dependencia){
    $trimestre = intval($trimestre);
    if($trimestre == 1 || $trimestre == 3){
        $thesql = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
            WHERE iu.id_dependencia = $id_dependencia AND (i.frecuencia = 'Trimestral' OR i.frecuencia = 'Mensual')
        GROUP BY iu.id";
    }
    if($trimestre == 2){
        $thesql = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
            WHERE iu.id_dependencia = $id_dependencia AND (i.frecuencia = 'Trimestral' OR i.frecuencia = 'Mensual' OR i.frecuencia = 'Semestral')
        GROUP BY iu.id";
    }
    if($trimestre == 4){
        $thesql = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
            WHERE iu.id_dependencia = $id_dependencia AND (i.frecuencia = 'Trimestral' OR i.frecuencia = 'Mensual' OR i.frecuencia = 'Semestral' OR i.frecuencia = 'Anual')
        GROUP BY iu.id";
    }

    $stm = $con->query($thesql);
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);


    return $data;
}



?>