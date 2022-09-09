<?php
require_once 'models/reportes_actividades_Model.php';


function Botones($con, $id_area){
    $data = "";
    if(CuentaAvances($con, $id_area, 1, 3) == CuentaActividades($con, $id_area)){
        $data .= '
        <input name="trimestre" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="1er">';
    }
    if(CuentaAvances($con, $id_area, 4, 6) == CuentaActividades($con, $id_area)){
        $data .= '
        <input name="trimestre" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="2do">';
    }
    if(CuentaAvances($con, $id_area, 7, 9) == CuentaActividades($con, $id_area)){
        $data .= '
        <input name="trimestre" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="3er">';
    }
    if(CuentaAvances($con, $id_area, 10, 12) == CuentaActividades($con, $id_area)){
        $data .= '
        <input name="trimestre" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="4to">';
    }
return $data;
    
}




?>

