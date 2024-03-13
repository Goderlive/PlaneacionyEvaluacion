<?php 
session_start();
require_once '../models/conection.php';

if(!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")){    
    header("Location: ../index.php");
}

$stm = $con->query("SELECT * FROM ante_actividades ac
LEFT JOIN ante_areas ar ON ar.id_area = ac.id_area
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
LEFT JOIN unidades_medida um ON um.id_unidad = ac.id_unidad
LEFT JOIN ante_dependencias dp ON dp.id_antedependencia = ar.id_dependencia
WHERE dp.tipo = 1
ORDER BY dg.clave_dependencia ASC, da.clave_dependencia_auxiliar ASC, py.codigo_proyecto ASC
");
$dosa = $stm->fetchAll(PDO::FETCH_ASSOC);


function traeProgramacionOld($con, $id_actividad){
    $sentencia = "
    SELECT SUM(COALESCE(enero, 0) + COALESCE(febrero, 0) + COALESCE(marzo, 0) + COALESCE(abril, 0) + COALESCE(mayo, 0) + COALESCE(junio, 0) + COALESCE(julio, 0) + COALESCE(agosto, 0) + COALESCE(septiembre, 0) + COALESCE(octubre, 0) + COALESCE(noviembre, 0) + COALESCE(diciembre, 0)) as suma
    FROM programaciones
    WHERE id_actividad = $id_actividad;
    ";
    $stm = $con->query($sentencia);
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if($result['suma']){
        return $result['suma']; 
    }else{
        return 0;
    }
}

function traeProgramacionNew($con, $id_actividad){
    $sentencia = "
    SELECT *
    FROM ante_programaciones
    WHERE id_actividad = $id_actividad;
    ";
    $stm = $con->query($sentencia);
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function traeAvances($con, $id_actividad){
    $sentencia = "SELECT * FROM avances WHERE id_actividad = $id_actividad";
    $stm = $con->query($sentencia);
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $suma = 0;
    foreach($result as $i){
        $suma += $i['avance'];
    }
    return $suma; 
}


foreach($dosa as $a){
    $programadoOld = traeProgramacionOld($con, $a['id_actividad']);
    $alcanzado = traeAvances($con, $a['id_actividad']);
    $programadoNew = traeProgramacionNew($con, $a['id_actividad']);
    $programadoNews = $programadoNew['enero'] + $programadoNew['febrero'] + $programadoNew['marzo'] + $programadoNew['abril'] + $programadoNew['mayo'] + $programadoNew['junio'] + $programadoNew['julio'] + $programadoNew['agosto'] + $programadoNew['septiembre'] + $programadoNew['octubre'] + $programadoNew['noviembre'] + $programadoNew['diciembre'];

    print("2024|" . "|" .$a['codigo_proyecto'] . "|" .$a['clave_dependencia'] . $a['clave_dependencia_auxiliar'] . "|" . 
    $a['codigo_actividad'] . "|" . $a['nombre_actividad'] . '|' . $a['nombre_unidad'] . '|' . $alcanzado . '|' . $programadoOld  . "|" . $programadoNews . '|' . "1|" . "Mensual|".
    $programadoNew['enero'] . '|' . '|' . $programadoNew['febrero'] . '|' . '|' . $programadoNew['marzo'] . '|' . '|' . $programadoNew['abril'] . '|' . '|' . $programadoNew['mayo'] . '|' . '|' . $programadoNew['junio'] . '|' . '|' . $programadoNew['julio'] . '|' . '|' . $programadoNew['agosto'] . '|' . '|' . $programadoNew['septiembre'] . '|' . '|' . $programadoNew['octubre'] . '|' . '|' . $programadoNew['noviembre'] . '|' . '|' . $programadoNew['diciembre'] . '|' . '|' . '|' . '|' .
    $a['descripcion'] .
    '<br>');
    
}

?>