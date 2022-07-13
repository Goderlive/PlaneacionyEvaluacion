<?php
require_once 'models/avances_modelo.php';

function MuestraAvancesActividades($con){
    $Avances = ConsultaAvancesActividades($con);
    $data = '';
    foreach($Avances as $a) {
        $img = substr($a['path_evidenia_evidencia'], 3);
        //Sumamos para meta anual
        $meta_anual = intval($a['enero'])+intval($a['febrero'])+intval($a['marzo'])+intval($a['abril'])+intval($a['mayo'])+intval($a['junio'])+intval($a['julio'])+intval($a['agosto'])+intval($a['septiembre'])+intval($a['octubre'])+intval($a['noviembre'])+intval($a['diciembre']);
        
        // Mes del que estamos hablando
        $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $thismes = $meses[$a['mes']];
        $lowthismes = strtolower($thismes);
        $prog_mes = $a[$lowthismes];
        $data .= '
        <div class="p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"></h5>
            
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Nombre de la Meta de Actividad
                            </th>
                            <th scope="col" class="py-3 px-6">
                                U d M
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Prog. Anual
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Mes
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Prog Mes
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Alcanzada
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Variacion
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Evidencia
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            '. $a['nombre_actividad'] .'
                            </th>
                            <td class="py-4 px-6">
                            '. $a['unidad'] .'
                            </td>
                            <td class="py-4 px-6">
                                '. $meta_anual .'
                            </td>
                            <td class="py-4 px-6">
                                ' . $thismes . '
                            </td>
                            <td class="py-4 px-6">
                                ' . $prog_mes . '
                            </td>
                            <td class="py-4 px-6">
                                ' . $a['avance'] . '
                            </td>
                            <td class="py-4 px-6">
                                ' . $a['avance'] - $prog_mes . '
                            </td>
                            <td class="py-4 px-6">
                            <button type="button" data-modal-toggle="modal'.$a['id_avance'].'">
                                <img src="' . $img . '" alt="evidencia" width="200" height="200">                                
                            </button>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
        </div>
                    <br>
    
        <div id="modal'.$a['id_avance'].'" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-4xl p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            '.$a['nombre_actividad'].'
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal'.$a['id_avance'].'">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <a href="'.$img.'" target="framename">
                            <img src="'.$img.'" alt="evidencia">
                        </a>
                    </div>                    
                </div>
            </div>
        </div>
';
    }

    return $data;
}


?>