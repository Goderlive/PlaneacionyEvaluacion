<?php 
require_once '../models/conection.php';
date_default_timezone_set('America/Mexico_City'); // Ajusta a tu zona horaria

$sentencia = "SELECT * FROM programacion_reconducciones pr
LEFT JOIN reconducciones_atividades ra ON ra.id_reconduccion_actividades = pr.id_reconduccion  
";
$stm = $con->query($sentencia);
$programaciones = $stm->fetchAll(PDO::FETCH_ASSOC);

$sentencia2 = "SELECT * FROM programaciones_eliminadas";
$stm2 = $con->query($sentencia2);
$elim = $stm2->fetchAll(PDO::FETCH_ASSOC);


function actualizar($id_reconduccion, $id_eliminacion){

}

foreach($programaciones as $p){
    $fecha = $p['fecha'];
    foreach($elim as $e){
        if($fecha = $e['eliminacion']){
                    
        }
    }

}















?>