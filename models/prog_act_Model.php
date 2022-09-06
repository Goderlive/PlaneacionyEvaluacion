<?php
require_once 'conection.php';


function TraeActividades($con, $id_area){
    $sql = "SELECT * FROM actividades a LEFT JOIN programaciones p ON a.id_actividad = p.id_actividad WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $actividades;
}

?>
