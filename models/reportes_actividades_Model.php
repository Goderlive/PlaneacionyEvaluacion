<?php
require_once 'conection.php';

function TraeTodasDepencias($con){
    $stm = $con->query("SELECT id_dependencia, nombre_dependencia FROM dependencias");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}


function TraeAreasDependencias($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM areas WHERE id_dependencia = $id_dependencia");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}



function RevisaAvances($con, $id_area){
    $stm = $con->query("SELECT * FROM actividades WHERE id_area = $id_area");
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}



function CuentaAvances($con, $id_area, $mesI, $mesF){

    $stm = $con->query("SELECT COUNT(av.id_avance) FROM avances av
    LEFT JOIN actividades ac ON ac.id_actividad = av.id_actividad
    WHERE ac.id_area = $id_area AND av.mes > $mesI-1 AND av.mes < $mesF+1 AND av.validado = 1");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(av.id_avance)']) ? $c_avance['COUNT(av.id_avance)'] : NULL;
    return $c_avance;
}

function CuentaActividades($con, $id_area){
    $stm = $con->query("SELECT COUNT(id_actividad) FROM actividades WHERE id_area = $id_area");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(id_actividad)']) ? $c_avance['COUNT(id_actividad)'] : NULL;
    return $c_avance*3;
}


?>