<?php
require_once 'models/prog_act_Model.php';


function SumaAnual($d){
    $suma = $d['enero'] + $d['febrero'] + $d['marzo'] + $d['abril'] + $d['mayo'] + $d['junio'] + $d['julio'] + $d['agosto'] + $d['septiembre'] + $d['octubre'] + $d['noviembre'] + $d['diciembre']; 
    return $suma;
}


?>