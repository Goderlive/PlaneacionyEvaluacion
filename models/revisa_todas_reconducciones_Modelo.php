<?php 
require_once 'conection.php';


function Traelasreconducciones($con){
    $stm = $con->query("SELECT * FROM reconducciones_atividades ra
    LEFT JOIN areas ar ON ar.id_area = ra.id_area
    LEFT JOIN proyectos pr ON pr. id_proyecto = ar.id_proyecto
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    WHERE ra.validado = 1  AND ra.id_reconduccion_actividades > 325
    ");
    $reconducciones = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $reconducciones;
}

function CalendarizacionesdeReconduccionAct($con, $id_reconduccion){
    $sql = "SELECT * FROM programacion_reconducciones WHERE id_reconduccion = $id_reconduccion";
    $stm = $con->query($sql);
    $programacion_nueva = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $programacion_nueva;
}

function datosdeActividad($con, $id_actividad){
    $stm = $con->query("SELECT * FROM actividades WHERE id_actividad = $id_actividad");
    $dataActividad = $stm->fetch(PDO::FETCH_ASSOC);
    return $dataActividad;
}


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




function EncabezadoMeses(){
    $data = "";
    $meses = array("enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    foreach ($meses as $mes):
        $data .= '<th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
            '. $mes .'
        </th>';
    endforeach;
    return $data;

}


function Programacion($dataIN){
    $dataINa = LimpiaProgramaciones($dataIN);

    return '
    <td class="py-2 px-2"> '. $dataINa[0] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[1] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[2] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[3] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[4] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[5] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[6] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[7] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[8] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[9] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[10] . ' </td>
    <td class="py-2 px-2"> '. $dataINa[11] . ' </td>';
}


?>