<?php
require_once 'models/reconducciones_modelo.php';

function Existentes($con, $dep){
    $areas = TraerAreas($con, $dep);
    $existentes = array();
    foreach ($areas as $a){
        if($existe = TraeReconduccionesporvalidar($con, $a['id_area'])){
            array_push($existentes,$existe);
        }
    }
    return $existentes;
}


function Validadas($con, $dep){
    $areas = TraerAreas($con, $dep);
    $existentes = array();
    foreach ($areas as $a){
        if($existe = TraeReconduccionesValidadas($con, $a['id_area'])){
            array_push($existentes,$existe);
        }
    }
    return $existentes;
}


function arregladata($data){
    $data = str_replace('"', "", $data);
    $data = str_replace(' ', "", $data);
    $data = explode(",", $data);
    return $data;
}


function SumaAnual($data){
    $data = arregladata($data);
    $sum = 0;
    foreach ($data as $value) {
        $sum += $value;
    }
    return $sum;
}


function DefineReconduccion($ini, $fin){

    var_dump($ini);
    var_dump($fin);
    die();

    $trimActual = ceil(date('m')/3) - 1;
    $inipri = $ini[0] + $ini[1] + $ini[2]; 
    $iniseg = $ini[3] + $ini[4] + $ini[5];
    $initer = $ini[6] + $ini[7] + $ini[8];
    $inicua = $ini[9] + $ini[10] + $ini[11];

    $finpri = $fin[0] + $fin[1] + $fin[2]; 
    $finseg = $fin[3] + $fin[4] + $fin[5];
    $finter = $fin[6] + $fin[7] + $fin[8];
    $fincua = $fin[9] + $fin[10] + $fin[11];

    return "";
}



?>