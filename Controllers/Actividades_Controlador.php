<?php
require_once 'models/modelo_actividades.php';
require_once 'models/inicio_modelo.php';
$id_usuario = $_SESSION['id_usuario'];
$user = get_usuario($id_usuario,$con);
$dep = $user['id_dependencia'];

function areas($con, $dep){
    $all = '';
    $areas = areas_con($con, $dep);
    foreach ($areas as $area){
        $all .= '
                <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">'.$area['nombre_area'].'</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Metas mensuales.</p>
                    <form action="reportes.php" method="post">
                        <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="' . $area['id_area'] .'">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Reportar
                        </button>
                    </form>
                    <form action="programacion_actividades.php" method="post">
                        <button class="inline-flex items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="' . $area['id_area'] .'">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path></svg> Ver Programacion
                        </button>
                    </form>
                    <div class="px-3 pt-4 pb-2 text-center">


                    <a href="#">
                        <span class="inline-block bg-red-600 text-white rounded-full px-3 py-1 text-sm font-semibold text-white-700 mr-2 mb-2">¡Importante!</span>
                    </a>
                </div>
                </div>';
    } 
    return $all;
}

?>

