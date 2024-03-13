<?php 
session_start();
require_once '../models/conection.php';

if(!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")){    
    header("Location: ../index.php");
}

$sentencia = "SELECT * FROM actividades ac
LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad  
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

function TraeProgramacion($con, $id_actividad){
    $sentencia = "SELECT * FROM programaciones
    WHERE id_actividad = $id_actividad
    ";
    $stm = $con->query($sentencia);
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function traeReconducciones($con, $id_actividad){
    $sentencia = "SELECT * FROM programacion_reconducciones
    WHERE id_actividad = $id_actividad
    ORDER BY id_programaciones_reconduccion ASC
    ";
    $stm = $con->query($sentencia);
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function traeAvances($con, $id_actividad){
    $sentencia = "SELECT avance FROM avances
    WHERE id_actividad = $id_actividad
    ORDER BY mes ASC
    ";
    $stm = $con->query($sentencia);
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result; 
}


foreach($dosa as $d){
    $id_actividad = $d['id_actividad'];
    $programacion = TraeProgramacion($con, $id_actividad);
    $total_programacion = $programacion['enero'] + $programacion['febrero'] + $programacion['marzo'] + $programacion['abril'] + $programacion['mayo'] + $programacion['junio'] + $programacion['julio'] + $programacion['agosto'] + $programacion['septiembre'] + $programacion['octubre'] + $programacion['noviembre'] + $programacion['diciembre'];

    if($reconduccion = traeReconducciones($con, $id_actividad)){
        $prog_inicial = str_replace('"', "",$reconduccion['programacion_inicial']);
        $prog_inicial = str_replace(' ', "",$prog_inicial);
        $prog_inicial = explode(",",$prog_inicial);
        $total_prog_inicial = 0;
        foreach($prog_inicial as $pi){
            $total_prog_inicial += $pi;
        }
    }else{
        $prog_inicial = array("","","","","","","","","","","","");
        $total_prog_inicial = "";
    }


    $avances = traeAvances($con, $id_actividad);

    $total_avances = 0;
    foreach($avances as $a){
        $total_avances += $a['avance'];
    }

    print(
        $d['nombre_dependencia'] . "|" .
        $d['nombre_area'] . "|" .
        $d['clave_dependencia'] . "|" .
        $d['clave_dependencia_auxiliar'] . "|" .
        $d['codigo_proyecto'] . "|" .
        $d['nombre_actividad'] . "|" .
        $d['nombre_unidad'] . "|" .
        $total_prog_inicial . "|" .
        $total_programacion . "|" .
        $total_avances . "|" .
        

        // Meses
        $prog_inicial[0] . "|" . 
        $programacion['enero'] . "|" .
        $avances[0]['avance'] . "|" .
 
        $prog_inicial[1] . "|" . 
        $programacion['febrero'] . "|" .
        $avances[1]['avance'] . "|" .
 
        $prog_inicial[2] . "|" . 
        $programacion['marzo'] . "|" .
        $avances[2]['avance'] . "|" .
 
        $prog_inicial[3] . "|" . 
        $programacion['abril'] . "|" .
        $avances[3]['avance'] . "|" .
 
        $prog_inicial[4] . "|" . 
        $programacion['mayo'] . "|" .
        $avances[4]['avance'] . "|" .
 
        $prog_inicial[5] . "|" . 
        $programacion['junio'] . "|" .
        $avances[5]['avance'] . "|" .
 
        $prog_inicial[6] . "|" . 
        $programacion['julio'] . "|" .
        $avances[6]['avance'] . "|" .
 
        $prog_inicial[7] . "|" . 
        $programacion['agosto'] . "|" .
        $avances[7]['avance'] . "|" .
 
        $prog_inicial[8] . "|" . 
        $programacion['septiembre'] . "|" .
        $avances[8]['avance'] . "|" .
 
        $prog_inicial[9] . "|" . 
        $programacion['octubre'] . "|" .
        $avances[9]['avance'] . "|" .
 
        $prog_inicial[10] . "|" . 
        $programacion['noviembre'] . "|" .
        $avances[10]['avance'] . "|" .
 
        $prog_inicial[11] . "|" . 
        $programacion['diciembre'] . "|" .
        $avances[11]['avance'] . "|" .
 
 
 
 
 
        "<br>"
    );
}