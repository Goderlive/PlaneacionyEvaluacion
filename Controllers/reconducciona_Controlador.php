<?php
require_once 'models/reconducciones_modelo.php';


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


function Sumador($data){
    $sum = 0;
    foreach ($data as $value) {
        $sum += $value;
    }
    return $sum;
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
    $Tini = SumaAnual($ini);
    $Tfin = SumaAnual($fin);
    
    $ini = arregladata($ini);
    $fin = arregladata($fin);
    if ($Tini == $Tfin){ // Estamos hablando de Disminucion de programacion
        if (Sumador(array_slice($ini, 0, 3)) == Sumador(array_slice($fin, 0, 3)) && Sumador(array_slice($ini, 3, 3)) == Sumador(array_slice($fin, 3, 3)) && Sumador(array_slice($ini, 6, 3)) == Sumador(array_slice($fin, 6, 3)) && Sumador(array_slice($ini, 9, 3)) == Sumador(array_slice($fin, 9, 3))){ 
            return "Interna";
        }else{
            return 'Recalendirización';
        }
    }
    if ($Tini < $Tfin){ // Estamos hablando de aumento de programacion
        return "Ampliación";
    }
    if ($Tini > $Tfin){ // Estamos hablando de Disminucion de programacion
        return "Reducción";        
    }
    return "Hola";
}



?>