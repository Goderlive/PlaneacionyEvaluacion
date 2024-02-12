<?php
date_default_timezone_set('America/Mexico_City');
require_once 'models/Reporte_Model.php';
if (!isset($_POST['id_area'])){
    ?>
    <script>
        window.location.href = 'actividades.php';
    </script>
    <?php
}else{
    $id_area = $_POST['id_area'];

    if(isset($_POST['mes'])){
        $el_mes = $_POST['mes'];
    }else{
        if($_SESSION['anio'] == date('Y')){
            if(date('d') > 24){
                $el_mes = intval(date('m'));
            }else{
                $el_mes = intval(date('m')-1);
            }
        }else{
            $el_mes = 12;
        }
    }
}
$meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$unidades = traeUnidades($con);
$actividadesDB = Actividades_DB($con, $id_area);

function MenuMes($el_mes, $id_area){
    $item = '';
    $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        for ($i=1; $i < 13; $i++) { 
            if($i == $el_mes){
                $item .= '<li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="'.$id_area.'">
                    <button name="mes" value="'.$i.'" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">'.$meses[$i].'</button>
                </form>
            </li>';
            }else{
                $item .='<li>
                <form action="reportes.php" method="POST">
                    <input type="hidden" name="id_area" value="'.$id_area.'">
                    <button name="mes" value="'.$i.'" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">'.$meses[$i].'</button>
                </form>
            </li>';
            }
        }
    return $item;
}


function ValidaBotones($con, $mes, $actividad, $codigo_actividad, $id_actividad){
    $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $editable = editable($con, $actividad);
    
    if($editable){
        if($editable['atendida'] != 1){     
            return '
                <form action="editar_avance_actividad.php" method="post">
                    <input type="hidden" name="id_modificacion" value="'.$editable['id_modificacion'].'">
                    <button type="submit" name="editable" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        Editar 
                    </button>
                </form>';
        }
    }

    $reconduccion = tieneReconduccion($con, $id_actividad);
    if($reconduccion){
        return '<button disabled class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm py-1 text-center" type="button" data-modal-toggle="mymodal'. $codigo_actividad .'">
            Reconducción Pendiente
        </button> ';
        }

    $boton = 'class = "bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
    $text = 'Reportar <br>' . $meses[$mes];

    if(isset($actividad['avance'])){
        $text = "Revisión";
        $boton = 'disabled class = "bg-yellow-300 cursor-not-allowed text-white hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
    }
    if(!$mes){ // ($mes >  intval(date('m')))
        $boton = 'disabled class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center';
    }

    
    if((isset($actividad['validado']) && $actividad['validado'] == 1) && (isset($actividad['validado_2']) && $actividad['validado_2'] == 1)){
        $boton = 'disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center';
        $text = "Reportado";
    }
    return '<button ' . $boton . '" type="button" data-modal-toggle="mymodal'. $codigo_actividad .'"> '.
            $text
        .'</button> ';
}


function barraAvance($con, $id_actividad, $mes){
    $text ='';
    $programado = ProgramaActividad($con, $id_actividad); //Aqui traemos la programacion y la sumamos hasta el mes actual 
    $contador = 0;
    $sumaProgramacion = 0;
    foreach ($programado as $av) {
        if($contador < $mes){
            $sumaProgramacion += $av;
        }
        $contador += 1;
    }
    
    $avance = AvancesActividad($con, $id_actividad, $mes); //Aqui traemos los avances y la sumamos hasta el mes actual
    if(!$avance){
        $total = 100;
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-ray-600 text-xs font-medium text-blue-200 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> 0%</div>
                </div>
                Avance: '.$avance;
    }
    elseif($avance == 0 && $sumaProgramacion == 0){
        $total = 100;
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> 100%</div>
                </div>
                Avance: '.$avance;
    }elseif($avance == 0 && $sumaProgramacion != 0){
        $total = 100;
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-red-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> 0%</div>
                </div>
                Avance: '.$avance;
    }elseif($avance < $sumaProgramacion){
        $total = ($avance / $sumaProgramacion) * 100;
        $total = intval($total);
        $total = ($total == 0) ? 100 : $total;

        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-yellow-300 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> '.$total.'%</div>
                </div>
                Avance: '.$avance;
    }elseif($avance == $sumaProgramacion){
        $total = 100;
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> '.$total.'%</div>
                </div>
                Avance: '.$avance;
    }elseif($avance > $sumaProgramacion && $sumaProgramacion == 0){
        $text = '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                <div class="bg-pink-400 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%">100%</div>
            </div>
            Avance: '.$avance;
    }elseif($avance > $sumaProgramacion  && $sumaProgramacion != 0){
        $total = ($avance / $sumaProgramacion) * 100;
        $total = intval($total);
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-pink-400 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> '.$total.'%</div>
                </div>
                Avance: '.$avance;
    }

    return $text;
}


function BotonAvance($avanceThisMes, $numero){
    if($avanceThisMes == ""){
        return "";
    }
    return '<button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button" data-modal-toggle="evidenciasModal'.$numero.'">'.
                $avanceThisMes
            .'</button>';
}



function localidades($locasa, $localidades){
    $nlocas = '';
    $locas = explode(",", $locasa);
        foreach ($locas as $loca){
            $nlocas .= $localidades[$loca-1]['nombre_localidad'] . "<br>";
        }
    return $nlocas;
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



function nombremes($mes){
    $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    return $meses[$mes];
}

function Imagenes($a){
    if(file_exists($a)){
        return $a;
    }else{
        return substr($a, 3);
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



function ModalesEvidencias($con, $actividades, $mes){
    $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $mesi = strtolower($meses[$mes]);
    $localidades = traelocalidades($con);
    $data = "";
    foreach($actividades as $a){
        $modificacionestxt = '';

        $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];

        $avance = AvanceFullThisMes($con, $a['id_actividad'], $mes);
        if($avance){
            if (isset($avance['id_linea'])){
                if($avance['localidades']){
                    $locatxt = localidades($avance['localidades'], $localidades);
                }else{
                    $locatxt = '<b>No Seleccionaron localidades</b>';
                }

                if($avance['beneficiarios']){
                    $benetxt = $avance['beneficiarios'] . " " . $avance['udmed'];
                }else{
                    $benetxt = '<b>No Seleccionaron Beneficiarios</b>';
                }

                if ($avance['recursos']){
                    $recursostxt = $avance['recursos'];
                }else{
                    $recursostxt = "<b>No selecciono recursos </b>";
                }

                if (GetModificaciones($con, $avance['id_avance'])){
                    $modificacionestxt = '<button type="submit" disabled name="valida_actividad" value="1" class="cursor-not-allowed focus:outline-none text-white bg-purple-300 hover:bg-purple-350 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edición Pendiente</button>';
                }
                $tablepdm ='<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800">
                            <td scope="row" class="py-2 px-6" align="center" valign="top"> '. 
                              $locatxt  
                            .'</td>
                            <td scope="row" class="py-2 px-6" align="center" valign="top">'.
                                $benetxt 
                            .' </td>
                            <td scope="row" class="py-2 px-6" align="center" valign="top">'.
                                $recursostxt
                            .'</td>
                        </tr>
                    </tbody>
                </table>';
            }
            else{
                $tablepdm = '';
            }
            if (isset($avance['path_evidenia_evidencia'])){
                $imgd = imgmd($avance['path_evidenia_evidencia']);
                $evidencia = '
                <a target="_blank" href="'.Imagenes($avance['path_evidenia_evidencia']).'">
                '.$imgd .'
                </a>
                ';
            }else{ 
                $evidencia = 'Sin Evidencia';
            }
            $tiempotxt = tiempos($avance['fecha_avance']);
            if ($avance['validado'] != 1 & $avance['validado_2'] != 1){
                $botonEliminar = '<form action="models/avances_modelo.php" method="post">
                    <input type="hidden" name="id_avance" value="'. $avance['id_avance'].'">
                    <input type="hidden" name="usuario" value="'. $_SESSION['id_usuario'].'">
                    <input type="hidden" name="id_area" value="'. $a['id_area'].'">
                    <input type="hidden" name="mes" value="'. $mes.'">
                    <button type="submit" name="cancela_actividad" value="1" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar Avance</button>
                </form>';
            }else{
                $botonEliminar = '';
            }

            $numero = $a['id_actividad'];
            $img = $avance['path_evidenia_evidencia'];
            $nombres2 = nombremes($avance['mes']);

            if ($avance['actividad_trimestral']) {
                $textotrimestral = $avance['actividad_trimestral'];
                $textotrimestral = '<div class="scrollable-content">
                <textarea style="width: 100%;" readonly>'.$textotrimestral.'</textarea>
              </div>';
            }else{
                $textotrimestral = '';
            }
            
            $data .= ' 
                <!-- Extra Large Modal -->
                <div id="evidenciasModal'.$numero.'" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-7xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">'.
                                    $a['nombre_actividad']
                                .'</h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="evidenciasModal'.$numero.'">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        Nombre de la Meta de Actividad
                                    </th>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        U d M
                                    </th>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        Prog. Anual
                                    </th>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        Mes
                                    </th>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        Prog Mes
                                    </th>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        Alcanzada
                                    </th>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        Variacion
                                    </th>
                                    <th scope="col" class="py-3 px-6" align="center">
                                        Evidencia
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row" class="py-2 px-6" align="center" valign="top">'.
                                        $a['nombre_actividad'] 
                                    .'</th>
                                    <td class="py-2 px-6" align="center" valign="top">'.
                                        $a['unidad']
                                    .'</td>
                                    <td class="py-2 px-6" align="center" valign="top">'.
                                            $anual
                                    .'</td>
                                    <td class="py-2 px-6" align="center" valign="top">'.
                                        $nombres2
                                    .'</td>
                                    <td class="py-2 px-6" align="center" valign="top">'.
                                        $a[$mesi]
                                    .'</td>
                                    <td class="py-2 px-6" align="center" valign="top">
                                        <b>'. $avance['avance'].' <b>
                                    </td>
                                    <td class="py-2 px-6" align="center" valign="top">'. 
                                        intval($avance['avance']) - $a[$mesi]
                                    .'</td>
                                    <td class="py-2 px-6" align="center">'.
                                        $evidencia
                                    .'</td>
                                </tr>
                            </table>'.
                            $tablepdm
                            .'<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <tr>
                                    <td>
                                        Descripcion de la Evidencia: <b>'. $avance['descripcion_evidencia'] .' </b><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Justificación por variación: <b>'. $avance['justificacion'] .' </b><br>
                                    </td>
                                <tr>
                                    <td>
                                        Reportado por: <b> '.$avance['nombre'] . ' ' . $avance['apellidos'] . '</b><br><br> 
                                    </td>
                                </tr>

                                <tr>
                                    <td>'.
                                    $textotrimestral  
                                    .'</td>
                                </tr>
                                <tr>
                                    <td>'.
                                        $tiempotxt
                                    .'</td>
                                </tr>
                            </table>'.
                                $modificacionestxt
                            . " " . $botonEliminar 
                        .'</div>
                        </div>
                    </div>
                </div>';
        }
    }
    return $data;
}



function Actividades($con, $mes, $id_area, $meses, $actividadesDB, $unidades){
    $resp = '';
    foreach ($actividadesDB as $a){
        $avance = AvanceMes($con, $a['id_actividad'], $mes);


        $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
        $mesi = strtolower($meses[$mes]);

        $botones = ValidaBotones($con, $mes, $avance, $a['codigo_actividad'], $a['id_actividad']);
        $avance = barraAvance($con, $a['id_actividad'], $mes);

        $avanceThisMes = AvanceThisMes($con, $a['id_actividad'], $mes);
        $avanceThisMes = ($avanceThisMes) ? $avanceThisMes['avance'] : "";
        
        $botonAvance = BotonAvance($avanceThisMes, $a['id_actividad']);

        if($a['id_unidad']){
            $unidad = $unidades[$a['id_unidad'] -1]['nombre_unidad'];
        }else{
            $unidad = $a['unidad'];
        }

        $resp .= 
        '<tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">'.
                $a['codigo_actividad']
            .'</th>
            <td class="px-6 py-4">'.
                $a['nombre_actividad']
            .'</td>
            <td class="px-6 py-4">'.
                $unidad
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
            <td class="px-6 py-4 text-right">'.
            $botones
            .'</td>
        </tr>';
    }
    return $resp;
}

function lista_localidades($con){
    $localidades = traelocalidades($con);
    $options = '<option selected disabled>Seleccione las Localidades</option>';
    foreach($localidades as $l){
        $options .= '<option value="'.$l['id_localidad'].'" data-valor="'.$l['valor'].'">'.$l['nombre_localidad'].'</option>';
    }

    $script = '
    <script>
    function calcularSumatoria() {
        var select = document.getElementById("localidades");
        var options = select.selectedOptions;
        var sumatoria = 0;
        for (var i = 0; i < options.length; i++) {
            var valor = parseFloat(options[i].getAttribute("data-valor"));
            sumatoria += valor;
        }
        document.getElementById("sumatoria").textContent = sumatoria;
    }
    </script>';

    return '
    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione múltiples opciones <b title="Usa el botón Ctrl en tu teclado más Click del mouse">Ayuda </b></label> 
    <select multiple id="localidades" required name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="calcularSumatoria()">
        '.$options.'
    </select>
    <p>Beneficiarios Indirectos: <span id="sumatoria"></span></p>
    '.$script;
}

function buscalineas($con, $id_actividad){
    if ($lineadeaccion = buscaactilistas($con, $id_actividad)){
            $localidades = lista_localidades($con);
        return '
            <br>

            <table style="width: 100%";>
                <tr>
                    <th style="width: 23%";>
                    </th>
                    <th style="width: 2%";>
                    </th>
                    <th style="width: 23%";>
                    </th>
                    <th style="width: 2%";>
                    </th>
                    <th colspan="5" style="width: 64%; text-align: center;";>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                    </th>
                </tr>
                <tr>
                    <th style="width: 23%";>
                        '.$localidades.'                        
                    </th>
                    <th style="width: 2%";>
                    </th>
                    <th style="width: 23%";>
                        <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                        <input type="text" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th style="width: 2%";>
                    </th>
                    <th style="width: 10%";>
                        <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                        <input type="number" id="recursos_federales" placeholder="                %"  name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th style="width: 2%";>
                    </th>
                    <th style="width: 10%";>
                        <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                        <input type="number" id="recursos_estatales" placeholder="                %"  name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th style="width: 2%";>
                    </th>
                    <th style="width: 10%";>
                        <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                        <input type="number" id="recursos_propios" placeholder="                %"  name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                </tr>
            </table>  
        ';
    }else{
        return "";
    }
}




function Modales($con, $actividadesDB, $el_mes, $permisos){
    if($permisos['id_dependencia']){
        $id_dependencia = $permisos['id_dependencia'];
    }else{
        $id_dependencia = traeladependencia($con,$permisos['id_area'])['id_dependencia'];
    }
    $meses = array("1" => "enero", "2" => "febrero", "3" => "marzo", "4" => "abril", "5" => "mayo", "6" => "junio", "7" => "julio", "8" => "agosto", "9" => "septiembre", "10" => "octubre","11" => "noviembre","12" => "diciembre");
    $var = '';
    $year = date('o');
    foreach ($actividadesDB as $a) {
        $var .= '<!-- Main modal -->
        <div id="mymodal'. $a['codigo_actividad'] .'" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">'.
                        $a['nombre_actividad']  
                        .'</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal'. $a['codigo_actividad'] .'">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="p-4 space-y-4">
                        <form action="reportes_cont.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="mes" value="'.$el_mes.'">
                            <input type="hidden" name="year" value="'.$year.'">
                            <input type="hidden" name="id_actividad" value="'.$a['id_actividad'].'">
                            <input type="hidden" name="id_dependencia" value="'.$id_dependencia.'">
                            <input type="hidden" name="id_usuario" value="'.$_SESSION['id_usuario'].'">
                            <input type="hidden" name="id_area" value="'.$a['id_area'].'">
                            <input type="hidden" name="id_actividad" value="'.$a['id_actividad'].'">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" placeholder="Programado: '.$a[$meses[$el_mes]].'" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                            </div>

                            </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="siguiente" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <button data-modal-toggle="mymodal'. $a['codigo_actividad'] .'" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>';
    }
    return $var;
}




function BotonImprimir($con, $id_area, $mes){
//sleep(1);
if ($mes == 1 || $mes == 2 || $mes == 4 || $mes == 5|| $mes == 7 || $mes == 8 || $mes == 10 || $mes == 11){
    return NULL;
}

$div = '<div id="toast-interactive" class="flex absolute my-10 top-5 right-5 items-center p-4 space-x-4 w-full max-w-xs text-gray-500 bg-white rounded-lg divide-x divide-gray-200 shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
<div class="flex">
    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg> <span class="sr-only">Refresh icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">
        <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Imprimir Trimestrales</span>
        <div class="mb-2 text-sm font-normal">Ya puedes descargar tus formatos trimestrales</div> 
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <form action="formatos_actividades.php" method="POST">
                        <input type="hidden" name="id_area" value="'.$id_area.'">
                        <input type="submit" value="Descargar" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">

                    </form>
                </div>
            </div>    
        </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-interactive" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
    </div>
</div>';

if ((CuentaActividades($con, $id_area, $mes) * $mes)  ==  CuentaAvances($con, $id_area, $mes)){
    return $div;
}

}
?>
