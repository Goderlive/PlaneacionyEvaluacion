<?php
require_once 'conection.php';


function TraeDepsGen($con, $anio){ // Trae las dependencias generales de centralizados y no centralizados
    $stm = $con->query("SELECT * FROM dependencias_generales WHERE anio = $anio");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}

function dependencias($con, $anio){
    $stm = $con->query("SELECT * FROM dependencias WHERE anio = $anio ORDER BY nombre_dependencia ASC");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}

function TraerAreas($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM areas WHERE id_dependencia = $id_dependencia");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}

function TraeTitular($con, $id_area){
    $stm = $con->query("SELECT * FROM titulares WHERE id_area = $id_area");
    $titular = $stm->fetch(PDO::FETCH_ASSOC);
    return $titular;
}
function TraeDirector($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $director = $stm->fetch(PDO::FETCH_ASSOC);
    return $director;
}

function TraeTitularEspecifico($con, $id_titular){
    $stm = $con->query("SELECT * FROM titulares WHERE id_titular = $id_titular");
    $titular = $stm->fetch(PDO::FETCH_ASSOC);
    return $titular;
}


if(isset($_POST['registrar'])){
    $data = $_POST;
    $sql = "INSERT INTO titulares (nombre, apellidos, cargo, id_area, id_registrante) VALUES (?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($data['nombre'],$data['apellidos'],$data['cargo'],$data['id_area'],$data['id_registrante'])); 
    header("Location: ../mis_areas.php");
}

if(isset($_POST['registrarDirector'])){
    $data = $_POST;
    $sql = "INSERT INTO titulares (nombre, apellidos, cargo, id_registrante, id_dependencia) VALUES (?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($data['nombre'],$data['apellidos'],$data['cargo'],$data['id_registrante'],$data['id_dependencia'])); 
    header("Location: ../mis_areas.php");
}

if(isset($_POST['eliminar'])){
    $data = $_POST;
    $titular = TraeTitularEspecifico($con, $data['id_titular']);
    $id_titular = $titular['id_titular'];

    $sql = "INSERT INTO titulares_eliminados (nombre, apellidos, cargo, id_area, id_dependencia, id_registrante, id_eliminante, fecha_alta) VALUES (?,?,?,?,?,?,?,?)";
    $sqlr = $con->prepare($sql);
    $sqlr->execute(array($titular['nombre'],$titular['apellidos'],$titular['cargo'],$titular['id_area'],$titular['id_dependencia'],$titular['id_registrante'], $data['id_eliminante'], $titular['fecha_alta']));
    $nrows = $con->exec("DELETE FROM titulares WHERE id_titular = $id_titular");
    

    header("Location: ../mis_areas.php");

}
?>