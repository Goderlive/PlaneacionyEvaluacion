<?php
require_once 'conection.php';


function TraeActividades($con, $id_area){
    $sql = "SELECT * FROM actividades a 
    LEFT JOIN programaciones p ON a.id_actividad = p.id_actividad 
    LEFT JOIN unidades_medida u ON u.id_unidad = a.id_unidad 
    WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}

function area($con, $id_area){
    $sql = "SELECT * FROM areas a 
    WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $actividades = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividades['nombre_area'];
}



?>
