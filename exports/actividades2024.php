<?php 
session_start();
require_once '../models/conection.php';

if(!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")){    
    header("Location: ../index.php");
}

$sentencia = "SELECT * FROM ante_actividades ac
LEFT JOIN ante_programaciones pr ON pr.id_actividad = ac.id_actividad  
LEFT JOIN ante_areas ar ON ar.id_area = ac.id_area
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
LEFT JOIN unidades_medida um ON um.id_unidad = ac.id_unidad
LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
WHERE dp.tipo = 1
ORDER BY dg.clave_dependencia ASC, da.clave_dependencia_auxiliar ASC, py.codigo_proyecto ASC
";
$stm = $con->query($sentencia);
$dosa = $stm->fetchAll(PDO::FETCH_ASSOC);







foreach($dosa as $d){
    $id_actividad = $d['id_actividad'];
    $total_programacion = $d['enero'] + $d['febrero'] + $d['marzo'] + $d['abril'] + $d['mayo'] + $d['junio'] + $d['julio'] + $d['agosto'] + $d['septiembre'] + $d['octubre'] + $d['noviembre'] + $d['diciembre'];

    $unidad = ($d['nombre_unidad']) ? $d['nombre_unidad'] : $d['unidad'];
    print(
        $d['nombre_dependencia'] . "|" .
        $d['nombre_area'] . "|" .
        $d['clave_dependencia'] . "|" .
        $d['clave_dependencia_auxiliar'] . "|" .
        $d['codigo_proyecto'] . "|" .
        $d['nombre_actividad'] . "|" .
        $unidad . "|" .
        $total_programacion . "|" .
        

        // Meses
        $d['enero'] . "|" .
 
        $d['febrero'] . "|" .
 
        $d['marzo'] . "|" .
 
        $d['abril'] . "|" .
 
        $d['mayo'] . "|" .
 
        $d['junio'] . "|" .
 
        $d['julio'] . "|" .
 
        $d['agosto'] . "|" .
 
        $d['septiembre'] . "|" .
 
        $d['octubre'] . "|" .
 
        $d['noviembre'] . "|" .
 
        $d['diciembre'] . "|" .
 
 
 
 
 
        "<br>"
    );
}