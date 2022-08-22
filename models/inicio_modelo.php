<?php
require_once 'models/conection.php';


function get_usuario($id_usuario,$con){
    $stm = $con->query("SELECT * FROM dependencias dp
    LEFT JOIN dependencias_generales dg ON dp.id_dependencia_gen = dg.id_dependencia 
    LEFT JOIN usuarios u ON u.id_dependencia = dp.id_dependencia 
    LEFT JOIN dependencias ds ON u.id_dependencia = ds.id_dependencia
    WHERE u.id_usuario = $id_usuario");
    $data_usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $data_usuario;
}

function VerificaAvancesActividades($con){
    $stm = $con->query("SELECT * FROM avances a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad
    WHERE a.validado != 1");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data_avances_actividades;
}
function VerificaAvancesIndicadores($con){
    $stm = $con->query("SELECT * FROM avances_indicadores WHERE validado != 1");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data_avances_actividades;
}

function VerificaReconduccionesActividades($con){
    $stm = $con->query("SELECT * FROM reconducciones_atividades WHERE validado != 1");
    $data_reconducciones_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data_reconducciones_actividades;
}

function VerificaReconduccionesIndicadores($con){
    $stm = $con->query("SELECT * FROM reconducciones_indicadores WHERE validado != 1");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data_avances_actividades;
}
?>