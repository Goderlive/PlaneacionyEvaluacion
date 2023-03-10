<?php

use FontLib\Table\Type\post;

require_once 'conection.php';

function get_usuario($id_usuario,$con){
    $stm = $con->query("SELECT * FROM usuarios u
    LEFT JOIN dependencias ds ON u.id_dependencia = ds.id_dependencia
    WHERE u.id_usuario = $id_usuario");
    $data_usuario = $stm->fetch(PDO::FETCH_ASSOC);

    //var_dump($data_usuario);
    return $data_usuario;
}


function getPermisos($con, $id_usuario){
    $stm = $con->query("SELECT * FROM permisos WHERE id_usuario = $id_usuario");
    $permiso = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $permiso;
}

function VerificaAvancesActividades($con){
    $stm = $con->query("SELECT * FROM avances a
<<<<<<< HEAD
    LEFT JOIN actividades p ON p.id_actividad = a.id_actividad
=======
    LEFT JOIN actividades ac ON ac.id_actividad = a.id_actividad
>>>>>>> 841b8827b18cbe727022cd8d0ec34402b5d304ec
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

if($_GET){
    session_start();
    if ($_GET['anteproyecto']) {
        $_SESSION['anio'] = $_GET['anteproyecto'];
    }
    header("Location: ../index.php");
}

?>