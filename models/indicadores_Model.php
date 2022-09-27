<?php
require_once 'conection.php';


/* function TraeUsuario($con, $id_usuario){
    $stm = $con->query("SELECT * FROM indicadores_uso iu LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador WHERE iu.anio = $anio AND id_dependencia = '$id_dependencia'  AND (periodicidad = 'trimestral' OR periodicidad = 'mensual'");
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    return $usuario;
} */
function Fetch($con, $string){
    try {
        $stm = $con->query($string);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th) {
        print $th;
        print $data;
    }
}

function FetchAll($con, $string){
    try {
        $stm = $con->query($string);
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th) {
        print $th;
        print $data;
    }
}

function Indicadores($con, $trimestre, $id_dependencia){
    if($trimestre == "1" || $trimestre == "3"){
        $string = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        WHERE iu.id_dependencia = $id_dependencia AND (periodicidad = 'trimestral' OR periodicidad = 'mensual')";
    }
    if($trimestre == "2"){
        $string = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        WHERE iu.id_dependencia = $id_dependencia AND (periodicidad = 'trimestral' OR periodicidad = 'mensual' OR periodicidad = 'semestral')";
    }
    if($trimestre == "4"){
        $string = "SELECT * FROM indicadores_uso iu 
        LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador 
        WHERE iu.id_dependencia = $id_dependencia AND (periodicidad = 'trimestral' OR periodicidad = 'mensual' OR periodicidad = 'semestral' OR periodicidad = 'anual')";
    }
    return FetchAll($con, $string);
}

function TraeConfiguracion($con){
    $stm = $con->query("SELECT * FROM setings");
    $setings = $stm->fetch(PDO::FETCH_ASSOC);
    return $setings;
}