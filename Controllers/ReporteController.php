<?php
date_default_timezone_set('America/Mexico_City');
require_once 'models/Reporte_Model.php';
if (!isset($_POST['id_area'])){
    header("Location: actividades.php");

}else{
    $id_area = $_POST['id_area'];
    $el_mes = (isset($_POST['mes'])) ? $_POST['mes'] : intval(date('m'))-1;
}
$meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

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


function ValidaBotones($mes, $actividad){
    $boton = 'class = "bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
    $text = 'Reportar';

    if(isset($actividad['avance'])){
        $text = "Revisión";
        $boton = 'disabled class = "bg-yellow-300 cursor-not-allowed text-white hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
    }
    if($mes >  intval(date('m')-1)){
        $boton = 'disabled class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center';
    }
    if(isset($actividad['validado']) && $actividad['validado'] == 1 ){
        $boton = 'disabled class="text-white bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center';
        $text = "Reportado";
    }
    $regreso=[];
    array_push($regreso, $boton);
    array_push($regreso, $text);

    return $regreso;
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
                </div>';
    }
    elseif($avance == 0 && $sumaProgramacion == 0){
        $total = 100;
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> 100%</div>
                </div>';
    }elseif($avance == 0 && $sumaProgramacion != 0){
        $total = 100;
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-red-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> 0%</div>
                </div>';
    }elseif($avance < $sumaProgramacion){
        $total = ($avance / $sumaProgramacion) * 100;
        $total = intval($total);
        $total = ($total == 0) ? 100 : $total;

        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-yellow-300 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> '.$total.'%</div>
                </div>';
    }elseif($avance == $sumaProgramacion){
        $total = 100;
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-blue-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: '.$total.'%"> '.$total.'%</div>
                </div>';
    }elseif($avance > $sumaProgramacion && $sumaProgramacion == 0){
        $text = '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                <div class="bg-pink-400 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%">100%</div>
            </div>';
    }elseif($avance > $sumaProgramacion  && $sumaProgramacion != 0){
        $total = ($avance / $sumaProgramacion) * 100;
        $total = intval($total);
        $text .= '<div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div class="bg-pink-400 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: 100%"> '.$total.'%</div>
                </div>';
    }

    return $text;
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
            <td class="px-6 py-4">'.
                $avanceThisMes
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


function Modales($actividadesDB,$meses, $el_mes){
    $var = '';
    $year = date('o');
    foreach ($actividadesDB as $a) {
        $var .= '<!-- Main modal -->
        <div id="mymodal'. $a['codigo_actividad'] .'" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
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
                    <div class="p-6 space-y-6">
                        <form action="models/Reporte_Model.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="mes" value="'.$el_mes.'">
                        <input type="hidden" name="year" value="'.$year.'">
                        <input type="hidden" name="id_actividad" value="'.$a['id_actividad'].'">
                        <input type="hidden" name="id_dependencia" value="'.$_SESSION['id_dependencia'].'">
                        <input type="hidden" name="id_usuario" value="'.$_SESSION['id_usuario'].'">
                        <input type="hidden" name="id_area" value="'.$a['id_area'].'">
                        <input type="hidden" name="id_actividad" value="'.$a['id_actividad'].'">

                            <div class="relative"> 
                                <label for="avance" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alcanzado Mes</label>
                                <input required name ="avance" min=0 id="avance" type="number" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            </div>
                            <br>
                            <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia:</label>
                            <input type="file" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"/>
                    
                            <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la Evidencia:</label>
                            <textarea id="descripcion_evidencia" name="descripcion_evidencia" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            
                            <br>
                            <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de variación:</label>
                            <textarea id="justificacion" name="justificacion" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                    <a href="#" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Descargar</a>
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
