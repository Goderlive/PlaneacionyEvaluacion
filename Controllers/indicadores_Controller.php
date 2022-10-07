<?php

require_once 'models/indicadores_Model.php';

function MenuTrimestre($id_dependencia, $this_mes){
    $item = '';
    $trimestre = array("Sin Trimestre", "1er Trimestre", "2do Trimestre", "3er Trimestre", "4to Trimestre");
        for ($i=1; $i < 5; $i++) { 
            $l= $i;
            if($i == $this_mes){
                $item .= '<li>
                <form action="indicadores.php" method="POST">
                    <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
                    <button name="trimestre" value="'.$l.'" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">'.$trimestre[$i].'</button>
                </form>
            </li>';
            }else{
                $item .='<li>
                <form action="indicadores.php" method="POST">
                    <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
                    <button name="trimestre" value="'.$l.'" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">'.$trimestre[$i].'</button>
                </form>
            </li>';
            }
        }
    return $item;
}


function CreaBotones($id_indicador, $trimestre_actual, $con){
    $mes = ceil(date('m')/3);
    if($mes <= $trimestre_actual){
        $boton = '<button data-modal-toggle="mymodal'.$id_indicador.'" disabled class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" >Reportar</button>';
        return $boton;
    }
    $tieneAvance = Fetch($con, "SELECT id_avance, validado FROM avances_indicadores WHERE id_indicador = $id_indicador AND trimestre = $trimestre_actual");
    if($tieneAvance){
        if($tieneAvance['validado']){
            $boton = '<button data-modal-toggle="mymodal'.$id_indicador.'" disabled class="text-white bg-green-400 dark:bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" >Reportado</button>';
            return $boton;
        }
        $boton = '<button data-modal-toggle="mymodal'.$id_indicador.'" disabled class="text-white bg-yellow-300 dark:bg-yellow-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" >Revisión</button>';
        return $boton;
    }
    $boton = '<button data-modal-toggle="mymodal'.$id_indicador.'" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"" type="button" >Reportar</button>';
    return $boton;
}


function TextoTrimestre($trimestre_actual){
    $data = array();
    $str = "at" . strval($trimestre_actual);
    array_push($data, $str);
    $str = "bt" . strval($trimestre_actual);
    array_push($data, $str);
    $str = "ct" . strval($trimestre_actual);
    array_push($data, $str);
    return $data;
}

?>