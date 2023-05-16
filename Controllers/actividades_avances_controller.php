<?php
require_once 'models/actividades_avances_modelo.php';


function TraeDependenciasController($con, $permisos){
    if($permisos['nivel'] == 1 ){
        $dependencias = TraeTodasDependencias($con);
    }
    if($permisos['nivel'] == 2){
        $dependencias = TraeDependencias($con, $permisos['id_usuario']);
    }
    return $dependencias;
}

function MenuMes($el_mes, $id_area){
    $item = '';
    $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        for ($i=1; $i < 13; $i++) { 
            if($i == $el_mes){
                $item .= '<li>
                <form action="actividades_avances.php" method="POST">
                    <input type="hidden" name="id_area" value="'.$id_area.'">
                    <button name="mes" value="'.$i.'" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">'.$meses[$i].'</button>
                </form>
            </li>';
            }else{
                $item .='<li>
                <form action="actividades_avances.php" method="POST">
                    <input type="hidden" name="id_area" value="'.$id_area.'">
                    <button name="mes" value="'.$i.'" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">'.$meses[$i].'</button>
                </form>
            </li>';
            }
        }
    return $item;
}


function Actividades($con, $mes, $id_area, $meses, $actividadesDB){

    $resp = '';
    foreach ($actividadesDB as $a){
        $avanceMensual = AvanceMes($con, $a['id_actividad'], $mes);


        $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
        $mesi = strtolower($meses[$mes]);

        $botones = ValidaBotones($mes, $avanceMensual);
        $avance = barraAvance($con, $a['id_actividad'], $mes);

        $avanceThisMes = AvanceThisMes($con, $a['id_actividad'], $mes);
        $avanceThisMes = ($avanceThisMes) ? $avanceThisMes['avance'] : "";
        
        $botonAvance = BotonAvance($avanceThisMes, $a['id_actividad']);

        $resp .= 
        '<tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">'.
                $a['codigo_actividad']
            .'</th>
            <td class="px-6 py-4">'.
                $a['nombre_actividad']
            .'</td>
            <td class="px-6 py-4">'.
                $a['unidad']
            .'</td>
            <td class="px-6 py-4">'.
                $anual
            .'</td>
            <td class="px-6 py-4">'.
                $avance  
            .'</td>
            <td class="px-6 py-4">'.
                $a[$mesi]
            .'</td>
            <td class="px-6 py-4 text-center"> '.
                $botonAvance  
            .'</td>
            <td class="px-6 py-4 text-right">
                <button ' . $botones[0] . 'type="button" data-modal-toggle="mymodal'. $a['codigo_actividad'] .'"> '.
                    $botones[1]
                .'</button>
            </td>
        </tr>';
    }
    return $resp;
}

function Botonavance($avanceMensual, $permisos){
    $clase = '';
    if(isset($avanceMensual['id_linea'])){ // validamos si tiene linea de accion
    
        if($avanceMensual['validado'] == 1 && $avanceMensual['validado_2'] == 1) : //Si todo esta SUPER VALIDADO 
            $clase = 'focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
        endif; 

        if(($avanceMensual['validado'] == 1 && $avanceMensual['validado_2'] != 1) || ($avanceMensual['validado'] != 1 && $avanceMensual['validado_2'] == 1)) : //Si FALTA validar PBRM o  PDM    
            if($permisos['rol'] == 1 && $avanceMensual['validado'] == 1){
                $clase = "focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900";
            }
            if($permisos['rol'] == 1 && $avanceMensual['validado'] != 1){
                $clase = "focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900";
            }
            if($permisos['rol'] == 2 && $avanceMensual['validado_2'] == 1){
                $clase = "focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900";
            }
            if($permisos['rol'] == 2 && $avanceMensual['validado_2'] != 1){
                $clase = "focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900";
            }
        endif; 

        if($avanceMensual['validado'] != 1 && $avanceMensual['validado_2'] != 1) : //Si FALTA ambos  
            $clase =  'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';   
        endif; 
        
        
        return '<button data-modal-target="evidenciasModal'.$avanceMensual['id_actividad'].'" data-modal-toggle="evidenciasModal'.$avanceMensual['id_actividad'].'" class="'.$clase.'" type="button">'.
                $avanceMensual['avance']
            .'</button>';
    }else{ // fin de validacion de linea de accion 
    
        if($avanceMensual['validado'] == 1) : //Si YA esta VADIDADO     
            return 'validado no tiene linea';
        endif; 

        if($avanceMensual['validado'] != 1) : //Si FALTA validarlo     
            return 'falta validacion unica de PBRM';
        endif; 
    } 
}


function localidades($locasa, $localidades){
    $locas = explode(",", $locasa);
        foreach ($locas as $loca){
            print $localidades[$loca-1]['nombre_localidad'] . "<br>";
        }
}


function nombremes($mes){
        $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        return $meses[$mes];
}


function tiempos($dato_timestamp){
    $hora_actual = date('Y-m-d H:i:s');
    $timestamp_bd = strtotime($dato_timestamp);
    $diferencia = time() - $timestamp_bd;
    $dias_diferencia = floor($diferencia / (60 * 60 * 24));
    $horas_diferencia = floor(($diferencia % (60 * 60 * 24)) / 3600);
    $minutos_diferencia = floor(($diferencia % 3600) / 60);

    // Imprime el resultado
    echo "Reportado hace:\n";
    if($dias_diferencia != 0){
        if($dias_diferencia > 1){
            echo $dias_diferencia . ' días, ';
        }else{
            echo $dias_diferencia . ' día, ';
        }
    }
    if($horas_diferencia != 0){
        if($horas_diferencia > 1){
            echo $horas_diferencia . ' horas, ';
        }else{
            echo $horas_diferencia . ' hora, ';
        }
    }
    echo $minutos_diferencia . " minutos";
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
        return '<img src="' . $img . '" alt="evidencia" style="max-width: 150px; max-height: 150px;">';
    }
}

?>