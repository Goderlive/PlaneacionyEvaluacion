<?php 
require_once 'conection.php';


function traeSettings($con, $anio){
    $stm = $con->query("SELECT * FROM setings WHERE year_report = $anio");
    $setings = $stm->fetch(PDO::FETCH_ASSOC);
    return $setings;
}


function TieneDirector($con, $id_dependencia){
    $stm = $con->query("SELECT * FROM titulares WHERE id_dependencia = $id_dependencia");
    $titularDependencia = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $titularDependencia;
}

function TraeTodasDepencias($con, $anio){
    $stm = $con->query("SELECT * FROM dependencias WHERE anio = $anio");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $dependencias;
}


function CuentaAvancesFUAT($con, $id_dependencia, $mesI, $mesF){
    $stm = $con->query("SELECT COUNT(av.id_avance) FROM avances av
    LEFT JOIN actividades ac ON ac.id_actividad = av.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    WHERE ar.id_dependencia = $id_dependencia AND av.mes > $mesI-1 AND av.mes < $mesF+1 AND av.validado = 1 AND validado_2 = 1");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(av.id_avance)']) ? $c_avance['COUNT(av.id_avance)'] : NULL;
    return $c_avance;
}


function CuentaActividadesFUAT($con, $id_dependencia){
    $stm = $con->query("SELECT COUNT(id_actividad) FROM actividades ac
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    WHERE ar.id_dependencia = $id_dependencia");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(id_actividad)']) ? $c_avance['COUNT(id_actividad)'] : NULL;
    return $c_avance*3;
}



function CuentaAvancesIndFUAT($con, $id_dependencia, $trimestre){
    $stm = $con->query("SELECT COUNT(ai.id_avance) FROM avances_indicadores ai
    LEFT JOIN indicadores_uso iu ON iu.id = ai.id_indicador
    WHERE iu.id_dependencia = $id_dependencia AND ai.trimestre = $trimestre AND validado = 1");
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(ai.id_avance)']) ? $c_avance['COUNT(ai.id_avance)'] : NULL;

    return $c_avance;
}

function CuentaActividadesIndFUAT($con, $id_dependencia, $trimestre){
    if($trimestre == 1 || $trimestre == 3){
        $stm = $con->query("SELECT COUNT(id) FROM indicadores_uso iu 
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
        WHERE id_dependencia = $id_dependencia AND (frecuencia = 'Trimestral' OR frecuencia = 'Mensual')");
    }elseif($trimestre == 2){
        $stm = $con->query("SELECT COUNT(id) FROM indicadores_uso iu 
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
        WHERE id_dependencia = $id_dependencia AND frecuencia != 'Anual'");
    }else{
        $stm = $con->query("SELECT COUNT(id) FROM indicadores_uso iu 
        LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
        WHERE id_dependencia = $id_dependencia");
    }
    $c_avance = $stm->fetch(PDO::FETCH_ASSOC);
    $c_avance = ($c_avance['COUNT(id)']) ? $c_avance['COUNT(id)'] : NULL;

    return $c_avance;
}




?>