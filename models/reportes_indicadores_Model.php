<?php
require_once 'conection.php';

function TraeTodasDepencias($con){
    $stm = $con->query("SELECT id_dependencia, nombre_dependencia FROM dependencias");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}

function TieneDirector($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $titularDependencia = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $titularDependencia;
}

function CuentaAvances($con, $id_dependencia, $trimestre){
    $stm = $con->query("SELECT COUNT(ai.id_avance) FROM avances_indicadores ai
    LEFT JOIN indicadores_uso iu ON iu.id = ai.id_indicador
    WHERE iu.id_dependencia = $id_dependencia AND ai.trimestre = $trimestre AND validado = 1");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(ai.id_avance)']) ? $c_avance['COUNT(ai.id_avance)'] : -1;
    return $c_avance;
}

function CuentaActividades($con, $id_dependencia, $periodicidad){
    if($periodicidad == "trimestral"){
        $stm = $con->query("SELECT COUNT(id) FROM indicadores_uso iu
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
        WHERE id_dependencia = $id_dependencia AND (frecuencia = 'Trimestral' OR frecuencia = 'Mensual')");
    }elseif($periodicidad == "semestral"){
        $stm = $con->query("SELECT COUNT(id) FROM indicadores_uso iu
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
        WHERE id_dependencia = $id_dependencia AND frecuencia != 'Anual'");
    }else{
        $stm = $con->query("SELECT COUNT(id) FROM indicadores_uso iu
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
        WHERE id_dependencia = $id_dependencia");
    }
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(id)']) ? $c_avance['COUNT(id)'] : NULL;

    return $c_avance;
}