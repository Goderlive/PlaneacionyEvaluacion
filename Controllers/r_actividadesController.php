<?php
require_once 'models/r_actividades_modelo.php';
$id_usuario = $_SESSION['id_usuario'];


function MuestraProgramacion($con, $dataActual, $dataReconduccion, $id_actividad){

    $dataActividad = datosdeActividad($con, $id_actividad);
    $encabezadoActividad = '
        <th scope="col" colspan = "12" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">'.
            $dataActividad['codigo_actividad'] . " - " . $dataActividad['nombre_actividad'] . " - " . $dataActividad['unidad'] 
        .'</th>';   

    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Sept.", "Octubre", "Nov.", "Diciembre");
    $encabezado = '';
    foreach ($meses as $mes) {
        $encabezado .= '
            <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">'.
                $mes
            .'</th>';
    }

    $data = '';
    $dataActual = substr($dataActual, 1,-1);
    $dataActual = explode('", "', $dataActual);

    foreach ($dataActual as $actual) {
        $data .= '
            <td class="py-4 px-6"> '.
                $actual
            .' </td>
        ';
    }
    

    $dataReconduccion = substr($dataReconduccion, 1,-1);
    $dataReconduccion = explode('", "', $dataReconduccion);
    $data2 = '';
    foreach ($dataReconduccion as $new) {
        $data2 .= '
            <td class="py-4 px-6"> '.
                $new
            .' </td>';
    }

    $tabla = '
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>'.
                    $encabezadoActividad
                .'</tr>
                <tr>'.
                    $encabezado
                .'</tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200 dark:border-gray-700">'.
                    $data
                .'</tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">'.
                    $data2  
                .'</tr>
            </tbody>
        </table>
        </div>
    ';

    return $tabla;

}



?>