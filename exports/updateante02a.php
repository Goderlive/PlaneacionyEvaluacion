<?php 
session_start();
require_once '../models/conection.php';

if(!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")){    
    header("Location: ../index.php");
}


function traeProgramacion($con, $id_actividad){
    $sentencia = "
    SELECT SUM(COALESCE(enero, 0) + COALESCE(febrero, 0) + COALESCE(marzo, 0) + COALESCE(abril, 0) + COALESCE(mayo, 0) + COALESCE(junio, 0) + COALESCE(julio, 0) + COALESCE(agosto, 0) + COALESCE(septiembre, 0) + COALESCE(octubre, 0) + COALESCE(noviembre, 0) + COALESCE(diciembre, 0)) as suma
    FROM programaciones
    WHERE id_actividad = $id_actividad;
    ";
    $stm = $con->query($sentencia);
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result['suma']; 
}
function traeAvances($con, $id_actividad){
    $sentencia = "SELECT * FROM avances WHERE id_actividad = $id_actividad";
    $stm = $con->query($sentencia);
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $suma = 0;
    foreach($result as $i){
        $suma += $i['avance'];
    }
    return $suma; 
}
function actualizaAnteproyecto($con, $programado, $alcanzado, $id_actividad){
    $sql = "UPDATE ante_actividades SET programado_anual_anterior = ?, alcanzado_anual_anterior = ? WHERE id_actividad = ?";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($programado, $alcanzado, $id_actividad));
}




$stm = $con->query("SELECT * FROM ante_actividades");
$ante_ac = $stm->fetchAll(PDO::FETCH_ASSOC);



foreach($ante_ac as $a){
    $programacion_anual = traeProgramacion($con, $a['id_actividad']);
    $alcanzado_anual = traeAvances($con, $a['id_actividad']);
    actualizaAnteproyecto($con, $programacion_anual, $alcanzado_anual, $id_actividad);
}