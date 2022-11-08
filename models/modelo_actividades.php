<?php
require_once 'conection.php';

function areas_con($con, $dep, $anio){
    $sql = "SELECT * FROM areas a
        INNER JOIN dependencias_generales dp ON a.id_dependencia = dp.id_dependencia
        INNER JOIN dependencias_auxiliares da ON a.id_dependencia_aux = da.id_dependencia_auxiliar
        INNER JOIN proyectos py ON a.id_proyecto = py.id_proyecto
        WHERE a.id_dependencia = $dep AND a.anio = $anio";
    $stm = $con->query($sql);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function dependencias($con){
    $stm = $con->query("SELECT * FROM dependencias");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}


function TraeUnidades_Medida($con){
    $sql = "SELECT * FROM unidades_medida"; 
    $stm = $con->query($sql);
    $unidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $unidades;
}



if(isset($_POST['guardar'])){
    var_dump($_POST);
    die();
}
?>