<?php

use FontLib\Table\Type\post;

require_once 'conection.php';

function get_usuario($id_usuario,$con){
    $stm = $con->query("SELECT * FROM usuarios u
    LEFT JOIN permisos p ON p.id_usuario = u.id_usuario
    LEFT JOIN areas a ON a.id_area = p.id_area
    LEFT JOIN dependencias d ON d.id_dependencia = a.id_dependencia OR d.id_dependencia = p.id_dependencia
    WHERE u.id_usuario = $id_usuario");
    $data_usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $data_usuario;
}

function getPermisos($con, $id_usuario){
    $anio = date("Y");
    $stm = $con->query("SELECT * FROM permisos WHERE id_usuario = $id_usuario AND anio = $anio");
    $permiso = $stm->fetch(PDO::FETCH_ASSOC);
    return $permiso;
}


function VerificaAvancesActividades($con){
    $stm = $con->query("SELECT * FROM avances a
    LEFT JOIN actividades p ON p.id_actividad = a.id_actividad
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

if(isset($_GET['post'])){
    session_start();
    if ($_GET['anteproyecto']) {
        $_SESSION['anio'] = $_GET['anteproyecto'];
    }
    header("Location: ../index.php");
}

?>