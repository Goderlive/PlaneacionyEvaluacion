<?php 
require_once 'models/indicadores_avances_model.php';


function MenuTrimestre($id_dependencia, $this_mes){
    $item = '';
    $trimestre = array("Sin Trimestre", "1er Trimestre", "2do Trimestre", "3er Trimestre", "4to Trimestre");
        for ($i=1; $i < 5; $i++) { 
            $l= $i;
            if($i == $this_mes){
                $item .= '<li>
                <form action="" method="POST">
                    <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
                    <input type="hidden" name="trimestre" value="'.$this_mes.'">
                    <button name="trimestre" value="'.$l.'" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">'.$trimestre[$i].'</button>
                </form>
            </li>';
            }else{
                $item .='<li>
                <form action="" method="POST">
                    <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
                    <input type="hidden" name="trimestre" value="'.$this_mes.'">
                    <button name="trimestre" value="'.$l.'" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">'.$trimestre[$i].'</button>
                </form>
            </li>';
            }
        }
    return $item;
}



function TraeDependenciasController($con, $permisos){
    if($permisos['nivel'] == 1 ){
        $dependencias = TraeTodasDependencias($con);
    }
    if($permisos['nivel'] == 2){
        $dependencias = TraeDependencias($con, $permisos['id_usuario']);
    }
    return $dependencias;
}


function TextoTrimestre($trimestre){
    $data = array();
    $str = "at" . strval($trimestre);
    array_push($data, $str);
    $str = "bt" . strval($trimestre);
    array_push($data, $str);
    $str = "ct" . strval($trimestre);
    array_push($data, $str);
    return $data;
}

function botonavances($con, $id_indicador, $trimestre){
    if($avance = traeavance($con, $id_indicador, $trimestre)){
        return '
        <button data-modal-toggle="reportamodal'.$avance['id_avance'].'" class="block text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"" type="button" >
            '. $avance['avance_a'] .' <br>
            '. $avance['avance_b'] .' <br>
            '. $avance['avance_c'] .'
        </button>

        ';
    }
}



function CreaBotones($id_indicador, $trimestre, $con){
    $mes = ceil(date('m')/3)+1;
    if($mes <= $trimestre){
        $boton = '<button data-modal-toggle="mymodal'.$id_indicador.'" disabled class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" >Reportar</button>';
        return $boton;
    }
    $tieneAvance = tieneavances($con, $id_indicador, $trimestre);
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




?>