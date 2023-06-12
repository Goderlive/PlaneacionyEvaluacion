<?php 
require_once 'conection.php';


function traeAvance($con, $id_avance){
    $stm = $con->query("SELECT * FROM avances a 
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_avance
    WHERE a.id_avance = $id_avance");
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    return $avance;
}


function traelocalidades($con)
{
    $stm = $con->query("SELECT * FROM localidades");
    $localidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $localidades;
}


function traeModificacion($con, $id_modificacion){
    $stm = $con->query("SELECT * FROM modificaciones_actividades WHERE id_modificacion = $id_modificacion");
    $modificacion = $stm->fetch(PDO::FETCH_ASSOC);
    return $modificacion;
}

function TraeActividad($con, $id_actividad)
{
    $sql = "SELECT * FROM actividades a
    JOIN programaciones p ON p.id_actividad = a.id_actividad
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas li ON li.id_linea = la.id_linea 
    WHERE a.id_actividad = $id_actividad";
    $stm = $con->query($sql);
    $actividades = $stm->fetch(PDO::FETCH_ASSOC);
    return $actividades;
}

function traeDatosDependencia($con, $id_actividad){
    $sql = "SELECT * FROM actividades ac
    JOIN areas ar ON ar.id_area = ac.id_area
    JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia 
    WHERE ac.id_actividad = $id_actividad";
    $stm = $con->query($sql);
    $dependencia = $stm->fetch(PDO::FETCH_ASSOC);
    return $dependencia;
}


if(isset($_POST['actualizar'])){
    session_start();
    if($_SESSION['sistema'] != 'pbrm'){
        header("Location: ../actividades.php");
    }



}

?>