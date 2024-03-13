<?php
require_once 'models/ajustes_model.php';

function ListadeTitulares($titulares){
    $lista = '<option value="">Selecciona un Titular</option>';
    foreach ($titulares as $titular) {
        $lista .= '<option value="'. $titular['id_titular'] .'">'. $titular['nombre'] . " " . $titular['apellidos'] .'</option>';
    }
    return $lista;
}


function SeparadorFechas($dato){
    if($dato){

        $endos = explode(';' , $dato);
        $endos1 = explode(',' , $endos[0]);
        $endos2 = explode(',' , $endos[1]);
        
        unset($dato);
        $dato = array_merge($endos1, $endos2);
        return $dato;
    }else{
        $dato = array("01","01","01","01");
    }
}





?>