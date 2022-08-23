<?php
require_once 'models/r_actividades_modelo.php';
$id_usuario = $_SESSION['id_usuario'];

function LimpiaProgramaciones($data){
    $data = substr($data, 1,-1);
    $data = explode('", "', $data);
    return $data;
}

function Sumador($data){
    $suma = 0;
    foreach ($data as $d) {
        $suma += $d;
    }
    return $suma;
}


function InternaExterna($inicial, $final){
    $t1i = $inicial[0] + $inicial[1] + $inicial[2];
    $t2i = $inicial[3] + $inicial[4] + $inicial[5];
    $t3i = $inicial[6] + $inicial[7] + $inicial[8];
    $t4i = $inicial[9] + $inicial[10] + $inicial[11];

    $t1f = $final[0] + $final[1] + $final[2];
    $t2f = $final[3] + $final[4] + $final[5];
    $t3f = $final[6] + $final[7] + $final[8];
    $t4f = $final[9] + $final[10] + $final[11];

    if($t1i == $t1f && $t2i == $t2f && $t3i == $t3f && $t4i == $t4f){
        return "Interna";
    }else{
        return "Externa";
    }

}


function DefineTipo($con, $pInicial, $pFinal){
    $result = array();

    $inicial = LimpiaProgramaciones($pInicial);
    $final = LimpiaProgramaciones($pFinal);

    // primero sumamos todo para saber si es incremento, reduccion o recalendarizacion
    if(Sumador($inicial) > Sumador($final)){//estamos ante una Reduccion de actividades
        array_push($result, "Reducción");
    }elseif(Sumador($inicial) < Sumador($final)){
        array_push($result, "Aumento");
    }else{
        array_push($result, "Recalendarización");
    }

    return InternaExterna($inicial, $final);

}


function MuestraProgramacion($con, $dataActual, $dataReconduccion, $id_actividad, $bg_table){

    $dataActividad = datosdeActividad($con, $id_actividad);
    $encabezadoActividad = '
        <th scope="col" colspan = "12" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">'.
            $dataActividad['codigo_actividad'] . " - " . $dataActividad['nombre_actividad'] . " - " . $dataActividad['unidad'] 
        .'</th>';   

    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Sept.", "Octubre", "Nov.", "Diciembre");
    $encabezado = '';
    foreach ($meses as $mes) {
        $encabezado .= '
            <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">'.
                $mes
            .'</th>';
    }


    $data = '';
    foreach (LimpiaProgramaciones($dataActual) as $actual) {
        $data .= '
            <td class="py-4 px-6"> '.
                $actual
            .' </td>
        ';
    }
    
    $data2 = '';
    foreach (LimpiaProgramaciones($dataReconduccion) as $new) {
        $data2 .= '
            <td class="py-4 px-6"> '.
                $new
            .' </td>';
    }

    $tabla = '
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 '.$bg_table.'">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 ' . $bg_table. '">
                <tr>'.
                    $encabezadoActividad
                .'</tr>
                <tr>'.
                    $encabezado
                .'</tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200 dark:border-gray-700">'.
                    $data
                .'</tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">'.
                    $data2  
                .'</tr>
            </tbody>
        </table>
        </div>
    ';

    return $tabla;

}



?>