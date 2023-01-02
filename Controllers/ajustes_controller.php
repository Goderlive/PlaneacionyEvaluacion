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


function DayPiker($data, $numero){
    if(!$data){
        $data = 01;
    }
    $texto = '<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione un Día</label> <select name="dia'.$numero.'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">';
    $str = '';
    for ($i=01; $i < 31; $i++) { 
        if($i == $data){
            $value = "selected";
        }
        else{
            $value = "";
        }
        $str .= '<option value="'.$i.'" '.$value.'>'.$i.'</option>';
    }
    $texto = $texto . $str;
    $texto .= '</select>';

    return $texto;
}


function MontPiker($data, $numero){
    if(!$data){
        $data = 01;
    }
    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    $text = '<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione un Mes</label> <select name="mes'.$numero.'" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">';
    $textmes = '';
    $contador = 1;
    foreach($meses as $mes){
        $mesM = ucwords($mes);
        if($contador == $data){
            $selected = "selected";
        }else{
            $selected = "";
        }
        $textmes .= '<option value="'.$contador.'"'.$selected.'>'.$mesM.'</option>';
        $contador +=1;
    }
    $text = $text . $textmes . '</select>';

    return $text;
}




?>