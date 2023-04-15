<?php
require_once 'models/reportes_indicadores_Model.php';

function Botones($con, $id_dependencia){
    $data = "";
    if(CuentaAvances($con, $id_dependencia, 1) == CuentaActividades($con, $id_dependencia, "trimestral")){
        $data .= '
        <input name="trimestre" formtarget="_blank" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="1er">';
    }
    if(CuentaAvances($con, $id_dependencia, 2) == CuentaActividades($con, $id_dependencia, "semestral")){
        $data .= '
        <input name="trimestre" formtarget="_blank" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="2do">';
    }
    if(CuentaAvances($con, $id_dependencia, 3) == CuentaActividades($con, $id_dependencia, "trimestral")){
        $data .= '
        <input name="trimestre" formtarget="_blank" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="3er">';
    }
    if(CuentaAvances($con, $id_dependencia, 4) == CuentaActividades($con, $id_dependencia, "anual")){
        $data .= '
        <input name="trimestre" formtarget="_blank" type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-400 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" value="4to">';
    }
return $data;    
}