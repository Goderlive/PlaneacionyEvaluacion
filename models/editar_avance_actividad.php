<?php 
require_once 'conection.php';


function traeAvance($con, $id_avance){
    $stm = $con->query("SELECT * FROM avances WHERE id_avance = $id_avance");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}


function traeModificacion($con, $id_modificacion){
    $stm = $con->query("SELECT * FROM modificaciones_actividades WHERE id_modificacion = $id_modificacion");
    $modificacion = $stm->fetch(PDO::FETCH_ASSOC);
    return $modificacion;
}






?>