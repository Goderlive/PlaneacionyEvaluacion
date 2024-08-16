<?php
require_once 'models/actividades_avances_modelo.php';


function NombreArea($con, $id_area){
    $nombre_dependencia = DependenciafromArea($con, $id_area);
    $nombre_area = TraeNombreArea($con, $id_area);
    return array($nombre_dependencia['nombre_dependencia'], $nombre_area, $nombre_dependencia['id_dependencia'], $nombre_dependencia['id_area']);
}


function PendientesSegunPermisos($con, $id_area, $permisos, $mes){
    if($permisos['rol'] == 1){
        $sentencia = "SELECT COUNT(*) as result FROM avances av
        JOIN actividades ac ON ac.id_actividad = av.id_actividad
        WHERE ac.id_area = $id_area AND av.mes = $mes AND av.validado = 1 AND av.validado_2 = 0";
    }
    if($permisos['rol'] == 2){
        $sentencia = "SELECT COUNT(*) as result FROM avances av
        JOIN actividades ac ON ac.id_actividad = av.id_actividad
        WHERE ac.id_area = $id_area AND av.mes = $mes AND av.validado_2 = 1 AND av.validado = 0";
    }

    return Fetch($con, $sentencia)['result'];
}


function SinValidar($con, $id_area, $mes, $permisos){
    if($permisos['rol'] == 1){
        $sentencia = "SELECT COUNT(*) AS total FROM avances av
        JOIN actividades ac ON ac.id_actividad = av.id_actividad
        LEFT JOIN areas ar ON ar.id_area = ac.id_area
        WHERE ar.id_area = $id_area AND av.mes = $mes AND av.validado = 0
        ";
    }
    if($permisos['rol'] == 2){
        $sentencia = "SELECT COUNT(*) AS total FROM avances av
        JOIN actividades ac ON ac.id_actividad = av.id_actividad
        LEFT JOIN areas ar ON ar.id_area = ac.id_area
        WHERE ar.id_area = $id_area AND av.mes = $mes AND av.validado_2 = 0
        ";
    }

    return Fetch($con, $sentencia)['total'];
}


function TraeDependenciasController($con, $permisos){
    if($permisos['nivel'] == 1 ){
        $dependencias = TraeTodasDependencias($con, $_SESSION['anio']);
    }
    if($permisos['nivel'] == 2){
        $dependencias = TraeDependencias($con, $permisos['id_usuario'], $permisos['anio']);
    }
    if($permisos['rol'] == 2){
        $dependencias = TraeDependenciasPDM($con, $permisos, $permisos['anio']);
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

        $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
        $mesi = strtolower($meses[$mes]);

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
    }else{ // fin de validacion de linea de accion 
        if($avanceMensual['validado'] == 1) : //Si YA esta VADIDADO     
            $clase = 'focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
        endif; 

        if($avanceMensual['validado'] != 1) : //Si FALTA validarlo     
            $clase =  'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900';   
        endif; 
    } 
    return '<button data-modal-target="evidenciasModal'.$avanceMensual['id_actividad'].'" data-modal-toggle="evidenciasModal'.$avanceMensual['id_actividad'].'" class="'.$clase.'" type="button">'.
    $avanceMensual['avance']
    .'</button>';
}


function BotonPBRM($avanceMensual, $permisos, $id_area, $el_mes){
    $clase = '';

    $botonValidarPbRM = '<form action="models/avances_modelo.php" method="post">
        <input type="hidden" name="id_avance" value="'.$avanceMensual['id_avance'].'">
        <input type="hidden" name="usuario" value="'.$_SESSION['id_usuario'].'">
        <input type="hidden" name="id_area" value="'.$id_area.'">
        <input type="hidden" name="mes" value="'.$el_mes.'">
        <button type="submit" name="valida_actividad" value="1" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validar</button>
        <button type="submit" name="cancela_actividad" value="1" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Rechazar</button>
    </form>'; 
    $botonValidartodoPbRM = '<form action="models/avances_modelo.php" method="post">
        <input type="hidden" name="id_avance" value="'.$avanceMensual['id_avance'].'">
        <input type="hidden" name="id_area" value="'.$id_area.'">
        <input type="hidden" name="mes" value="'.$el_mes.'">
        <input type="hidden" name="usuario" value="'.$_SESSION['id_usuario'].'">
        <button type="submit" name="valida_actividad" value="3" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validar</button>
        <button type="submit" name="cancela_actividad" value="1" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Rechazar</button>
    </form>'; 

    $botonValidarPDM = '<form action="models/avances_modelo.php" method="post">
        <input type="hidden" name="id_avance" value="'. $avanceMensual['id_avance'] .'">
        <input type="hidden" name="mes" value="'.$el_mes.'">
        <input type="hidden" name="id_area" value="'.$id_area.'">
        <input type="hidden" name="usuario" value="'. $_SESSION['id_usuario'] .'">
        <button type="submit" name="valida_actividad" value="2" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validar</button>
        <button type="submit" name="cancela_actividad" value="2" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Rechazar</button>
    </form>';
    if(isset($avanceMensual['id_linea'])){ // validamos si tiene linea de accion

        if($avanceMensual['validado'] == 1 && $avanceMensual['validado_2'] == 1): //Si todo esta SUPER VALIDADO 
            return '<tr>
                <td>Validado por: ' . $avanceMensual['nombrepbrm'].'</td>
                <td>Validado por: ' . $avanceMensual['nombrepdm'].'</td>
            </tr>';
        endif; 

        if(($avanceMensual['validado'] == 1 && $avanceMensual['validado_2'] != 1) || ($avanceMensual['validado'] != 1 && $avanceMensual['validado_2'] == 1)) : //Si FALTA validar PBRM o  PDM    
            if($permisos['rol'] == 1 && $avanceMensual['validado'] == 1){
                return '<tr>
                    <td>Validado por: '.$avanceMensual['nombrepbrm'].'</td>
                    <td>Pendiente de validacion por el area de PDM</td>
                </tr>';            
            }
            if($permisos['rol'] == 1 && $avanceMensual['validado'] != 1){
                return '<tr>
                    <td>'.$botonValidarPbRM.'</td>
                    <td>Validado por: '.$avanceMensual['nombrepdm'].'</td>
                </tr>';            
            }
            if($permisos['rol'] == 2 && $avanceMensual['validado_2'] == 1){
                return '<tr>
                    <td>Pendiente de validacion por el area de PbRM</td>
                    <td>Validado por: ' . $avanceMensual['nombrepdm'].'</td>
                </tr>';              
            }
            if($permisos['rol'] == 2 && $avanceMensual['validado_2'] != 1){
                return '<tr>
                <td>Validado por: ' . $avanceMensual['nombrepbrm'].'</td>
                <td>'.$botonValidarPDM.'</td>
                </tr>';             
            }
        endif; 

        if($avanceMensual['validado'] != 1 && $avanceMensual['validado_2'] != 1) : //Si FALTA ambos  
            if($permisos['rol'] == 1){
                return '<tr>
                    <td>'.$botonValidarPbRM.'</td>
                    <td>Pendiente de Validación</td>
                </tr>';            
            }
            if($permisos['rol'] == 2){
                return '<tr>
                    <td>Pendiente de validacion por el area de PbRM</td>
                    <td>'.$botonValidarPDM.'</td>
                </tr>';              
            }

        endif; 
    }else{ // fin de validacion de linea de accion 
    
        if($avanceMensual['validado'] == 1) : //Si YA esta VADIDADO     
            return '<tr>
                <td>Validado Por: '.$avanceMensual['nombrepdm'].'</td>
                <td>No requiere validaciones adicionales</td>
            </tr>';   
        endif; 
        if($avanceMensual['validado'] != 1) : //Si FALTA validarlo     
            return '<tr>
                <td>'.$botonValidartodoPbRM.'</td>
                <td>No requiere validaciones adicionales</td>
            </tr>';   
        endif; 
    } 
    return '<button data-modal-target="evidenciasModal'.$avanceMensual['id_actividad'].'" data-modal-toggle="evidenciasModal'.$avanceMensual['id_actividad'].'" class="'.$clase.'" type="button">'.
    $avanceMensual['avance']
    .'</button>';
}


function localidades($locasa, $localidades){
    $retu = '';
    $locas = json_decode($locasa);
    foreach ($locas as $loca){
            $retu .= $localidades[$loca-1]['nombre_localidad'] . "<br>";
        }
    return $retu;
}


function nombremes($mes){
        $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        return $meses[$mes];
}


function ProcSumaProgramadosmesymes($con, $mes, $id_actividad){
    $programacion = SumaProgramadosmesymes($con, $id_actividad);
    $meses = array("","enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    $suma = 0;
    $a = 1;
    do {
        $suma += $programacion[$meses[$a]];
        $a +=1;
    } while ($a <= $mes);
    return $suma;
}



function tiempos($dato_timestamp){
    $hora_actual = date('Y-m-d H:i:s');
    $timestamp_bd = strtotime($dato_timestamp);
    $diferencia = time() - $timestamp_bd;
    $dias_diferencia = floor($diferencia / (60 * 60 * 24));
    $horas_diferencia = floor(($diferencia % (60 * 60 * 24)) / 3600);
    $minutos_diferencia = floor(($diferencia % 3600) / 60);

    // Imprime el resultado
    $txtr = "Reportado hace:\n";
    if($dias_diferencia != 0){
        if($dias_diferencia > 1){
            $txtr .= $dias_diferencia . ' días, ';
        }else{
            $txtr .= $dias_diferencia . ' día, ';
        }
    }
    if($horas_diferencia != 0){
        if($horas_diferencia > 1){
            $txtr .= $horas_diferencia . ' horas, ';
        }else{
            $txtr .= $horas_diferencia . ' hora, ';
        }
    }
    $txtr .= $minutos_diferencia . " minutos";

    if($dias_diferencia > 5){
        return "Reportado el " . $dato_timestamp;
    }else{
        return $txtr;
    }
}



function Imagenes($a){
    if(file_exists($a)){
        return $a;
    }else{
        return substr($a,3);
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