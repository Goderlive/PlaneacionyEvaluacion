<?php
require_once 'conection.php';

function Fetch($con, $sentence){
    $stm = $con->query($sentence);
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function FetchAll($con, $sentence){
    $stm = $con->query($sentence);
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function FetchAll2($con, $sentence){
    $stm = $con->query($sentence);
    $data = $stm->fetchAll();
    return $data;
}

function TraeAreasofThis($con, $id_dependencia){
    return FetchAll($con, "SELECT * FROM areas WHERE id_dependencia = $id_dependencia");
}

function Proyectos($con, $anio){
    return FetchAll($con, "SELECT * FROM proyectos WHERE anio = $anio ORDER BY codigo_proyecto");
}


function buscalineas($con, $id_area){
    $sql = "SELECT * FROM actividades a
    JOIN lineasactividades li ON li.id_actividad = a.id_actividad
    WHERE a.id_area = $id_area";
    $stm = $con->query($sql);
    $lineas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $lineas;
}


function unArea($con, $dep){
    $sql = "SELECT * FROM areas a
        INNER JOIN dependencias_generales dp ON a.id_dependencia = dp.id_dependencia
        INNER JOIN dependencias_auxiliares da ON a.id_dependencia_aux = da.id_dependencia_auxiliar
        INNER JOIN proyectos py ON a.id_proyecto = py.id_proyecto
        INNER JOIN programas_presupuestarios pp ON py.id_programa = pp.id_programa
        WHERE a.id_area = $dep";
    $stm = $con->query($sql);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}



function areas_con($con, $dep){
    $sql = "SELECT * FROM areas a
        INNER JOIN dependencias_generales dp ON a.id_dependencia_general = dp.id_dependencia
        INNER JOIN dependencias_auxiliares da ON a.id_dependencia_aux = da.id_dependencia_auxiliar
        INNER JOIN proyectos py ON a.id_proyecto = py.id_proyecto
        INNER JOIN programas_presupuestarios pp ON py.id_programa = pp.id_programa
        WHERE a.id_dependencia = $dep";
    $stm = $con->query($sql);
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $areas;
}

function dependencias($con, $anio){
    $stm = $con->query("SELECT * FROM dependencias WHERE anio = $anio ORDER BY nombre_dependencia ASC");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}


function DependenciasAuxiliares($con, $anio){
    $aux = FetchAll2($con, "SELECT * FROM dependencias_auxiliares WHERE anio = $anio");
    $gen = FetchAll2($con, "SELECT * FROM dependencias_generales WHERE anio = $anio");
    $mix = array_merge($aux, $gen);
    return $mix;

    
}


function TraeUnidades_Medida($con){
    $sql = "SELECT * FROM unidades_medida"; 
    $stm = $con->query($sql);
    $unidades = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $unidades;
}


function TraeDepsGen($con, $anio){ // Trae las dependencias generales de centralizados y no centralizados
    $sentencia = "SELECT * FROM dependencias_generales WHERE anio = $anio";
    return FetchAll($con, $sentencia);
}



if(isset($_POST)){
    if(isset($_POST['guardar'])){
        session_start();
        $id_area = $_POST['id_area'];
        $usuario = $_SESSION['id_usuario'];

        $nombre_actividad = $_POST['nombre_actividad'];
        $id_unidad = $_POST['id_unidad'];
        
        // Verificamos si hay anteriores
        $ultimo = Fetch($con, "SELECT * FROM actividades WHERE id_area = $id_area ORDER BY codigo_actividad DESC LIMIT 1;");
        if($ultimo){
            $numero = $ultimo + 1;
        }else{
            $numero = 1;
        }

        $sql = "INSERT INTO actividades (codigo_actividad,nombre_actividad,id_unidad,id_area,id_creacion) VALUES (?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($numero, $nombre_actividad, $id_unidad. $id_area, $usuario));
        header("Location: ../actividades.php");
    }

    if(isset($_POST['nueva_dependencia'])){
        $nombre = $_POST['nombre'];
        $id_dep_gen = $_POST['id_dep_gen'];
        $anio = $_POST['anio'];
        
        $sql = "INSERT INTO dependencias (nombre_dependencia, id_dependencia_gen, anio) VALUES (?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($nombre, $id_dep_gen, $anio));
        header("Location: ../actividades.php");
    }

    if(isset($_POST['new_area'])){
        $nombre_area = $_POST['nombre_area'];
        $id_dependencia = $_POST['id_dependencia'];
        $id_dep_gen = $_POST['id_dep_gen'];
        $anio = $_POST['anio'];
        $auxiliar = $_POST['auxiliar'];
        $proyecto = $_POST['proyecto'];
        
        $sql = "INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, anio) VALUES (?,?,?,?,?,?)";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($nombre_area, $id_dependencia, $id_dep_gen, $auxiliar, $proyecto, $anio));
        header("Location: ../actividades.php");
    }
}

?>