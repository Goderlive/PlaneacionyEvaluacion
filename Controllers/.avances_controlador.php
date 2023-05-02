<?php
require_once 'models/avances_modelo.php';


function dia($date){
    $duno = $date[8];
    $ddos = $date[9];
    $muno = $date[5];
    $mdos = $date[6];
    $auno = $date[2];
    $ados = $date[3];
    $texto = " el " . $duno . $ddos . "/" . $muno . $mdos. "/" . $auno. $ados;
    return $texto;
}


function MetaAnual($a){
    $meta_anual = intval($a['enero'])+intval($a['febrero'])+intval($a['marzo'])+intval($a['abril'])+intval($a['mayo'])+intval($a['junio'])+intval($a['julio'])+intval($a['agosto'])+intval($a['septiembre'])+intval($a['octubre'])+intval($a['noviembre'])+intval($a['diciembre']);
    return $meta_anual;
}


function ThisMes($a){
    $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    return $meses[$a['mes']];
}

function Imagenes($a){
    $img = substr($a, 3);
    if($img){
        return $img;
    }
}

function imgsmall($data){
    $img = Imagenes($data);
    if($img){
        return '<img src="' . $img . '" alt="evidencia" width="150" height="150">';
    }else{
        return "Sin Evidencia";
    }
}

function imgmd($data){
    $img = Imagenes($data);
    if($img){
        return '<img src="' . $img . '" alt="evidencia" style="max-width: 500px; max-height: 500px;">';
    }
}

?>
