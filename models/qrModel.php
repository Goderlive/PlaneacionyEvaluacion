<?php 
require_once 'conection.php';

function Dependencia($con, $id_dependencia){
    $sentencia = "SELECT * FROM dependencias
    WHERE id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    $dependencia = $stm->fetch(PDO::FETCH_ASSOC);
    return $dependencia;
}

function TraeAreas($con, $id_dependencia){
    $sentencia = "SELECT a.id_area, a.nombre_area FROM areas a
    WHERE a.id_dependencia = $id_dependencia";
    $stm = $con->query($sentencia);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}


function traeActividades($con, $id_area){
    $sentencia = "SELECT * FROM actividades a
    LEFT JOIN programaciones p ON p.id_actividad = a.id_actividad 
    WHERE a.id_area = $id_area 
    ";
    $stm = $con->query($sentencia);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;   
}


function traeAvanceActividad($con, $id_actividad, $mes){
    $sentencia = "SELECT avance FROM avances
    WHERE id_actividad = $id_actividad AND mes = $mes
    ";
    $stm = $con->query($sentencia);
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;   
}



?>