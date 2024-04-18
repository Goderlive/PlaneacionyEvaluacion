<?php

use FontLib\Table\Type\post;

require_once 'conection.php';

function traeAjustes($con, $anio){
    $stm = $con->query("SELECT * FROM setings WHERE year_report = $anio");
    $ajustes = $stm->fetch(PDO::FETCH_ASSOC);
    return $ajustes;
}

function get_usuario($id_usuario,$con){
    $stm = $con->query("SELECT * FROM usuarios u
    LEFT JOIN permisos p ON p.id_usuario = u.id_usuario
    LEFT JOIN areas a ON a.id_area = p.id_area
    LEFT JOIN dependencias d ON d.id_dependencia = a.id_dependencia OR d.id_dependencia = p.id_dependencia
    WHERE u.id_usuario = $id_usuario");
    $data_usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $data_usuario;
}

function traeinconsistencias($con){
    $stm = $con->query("SELECT id_actividad, mes, COUNT(*) as cantidad
    FROM avances
    GROUP BY id_actividad, mes
    HAVING COUNT(*) > 1");
    $inconsistencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $inconsistencias;
}

function traeinconsistenciasi($con){
    $stm = $con->query("SELECT id_avance, id_indicador, trimestre, COUNT(*) as cantidad FROM avances_indicadores GROUP BY id_indicador, trimestre HAVING COUNT(*) > 1");
    $inconsistencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $inconsistencias;
}

function getPermisos($con, $permisos){
    $anio = $permisos['anio'];
    $id_usuario = $permisos['id_usuario'];
    $stm = $con->query("SELECT * FROM permisos WHERE id_usuario = $id_usuario AND anio = $anio");
    $permiso = $stm->fetch(PDO::FETCH_ASSOC);
    return $permiso;
}


function VerificaAvancesActividades($con){
    $stm = $con->query("SELECT * FROM avances a
    LEFT JOIN actividades p ON p.id_actividad = a.id_actividad
    LEFT JOIN areas ar ON ar.id_area = p.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE a.validado != 1
    GROUP BY p.id_area
    LIMIT 5
    ");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data_avances_actividades;
}

function VerificaAvancesIndicadores($con){
    $stm = $con->query("SELECT * FROM avances_indicadores WHERE validado != 1");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data_avances_actividades;
}


function VerificaModificaciones($con){
    $anio = $_SESSION['anio'];
    $stm = $con->query("SELECT * FROM modificaciones_actividades ma
    JOIN avances av ON av.id_avance = ma.id_avance
    JOIN actividades ac ON ac.id_actividad = av.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE ma.atendida = 0 AND dp.anio = $anio LIMIT 5");
    $modificaciones = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $modificaciones;
}


function VerificaModificacionesEnlaces($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM modificaciones_actividades ma
    JOIN avances av ON av.id_avance = ma.id_avance
    JOIN actividades ac ON ac.id_actividad = av.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE ma.atendida = 0 AND ar.id_dependencia = $id_dependencia
    LIMIT 5");
    $modificaciones = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $modificaciones;
}


function VerificaModificacionesEnlaces5($con, $id_area){
    $stm = $con->query("SELECT * FROM modificaciones_actividades ma
    JOIN avances av ON av.id_avance = ma.id_avance
    JOIN actividades ac ON ac.id_actividad = av.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE ma.atendida = 0 AND ac.id_area = $id_area
    LIMIT 5");
    $modificaciones = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $modificaciones;
}

function VerificaReconduccionesActividades($con){
    $stm = $con->query("SELECT * FROM reconducciones_atividades ra 
    LEFT JOIN areas ar ON ar.id_area = ra.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE ra.validado != 1
    LIMIT 5
    ");
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