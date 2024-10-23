<?php
require_once '../models/conection.php';



// Ejecutar una consulta SQL
$sql = "SELECT * FROM avances av
    LEFT JOIN actividades ac ON ac.id_actividad = av.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    WHERE dp.anio = 2024
    GROUP BY av.id_avance
    ORDER BY ac.id_actividad ASC
    ";

$stmt = $con->query($sql);
$result = $stmt->fetchAll();


foreach($result as $r){
    $text = $r['mes'] . "|" . $r['codigo_programa'] . "|" . $r['codigo_proyecto'] . "|" . $r['id_area'] . "|" . $r['id_actividad'] . "|" . $r['id_avance'] . "|";
    
    if(!empty($r['localidades'])){
        $localidades = json_decode($r['localidades'], true);
        $beneficiarios = json_decode($r['beneficiarios'], true);
        
        // Check if json_decode was successful
        if($localidades === null) {
            // Handle invalid JSON in localidades
            echo $text . "Error: Invalid JSON in localidades<br>\n";
            continue;  // Skip to the next iteration of the foreach loop
        }
        
        // Ensure $localidades is always an array
        $localidades = is_array($localidades) ? $localidades : [$localidades];
        
        // Ensure $beneficiarios is always an array
        $beneficiarios = is_array($beneficiarios) ? $beneficiarios : [$beneficiarios];
        
        // If there's only one beneficiary, use it for all localidades
        if(count($beneficiarios) == 1) {
            $beneficiarios = array_fill(0, count($localidades), $beneficiarios[0]);
        }
        
        foreach($localidades as $i => $localidad){
            $beneficiario = isset($beneficiarios[$i]) ? $beneficiarios[$i] : '';
            echo $text . $localidad . "|" . $beneficiario . "<br>\n";
        }
    } else {
        echo $text . "<br>\n";
    }
}