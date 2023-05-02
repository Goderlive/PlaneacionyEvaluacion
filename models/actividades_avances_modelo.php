<?php 
require_once 'conection.php';

function TraeDependencias($con, $id_usuario){
    $stm = $con->query("SELECT * dependencias dp 
    LEFT JOIN usuarios u ON u.id_usuario = dp.id_administrador
    WHERE dp.id_administrador = $id_usuario");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($dependencias);
    return $dependencias;
}
function TraeTodasDependencias($con, $id_usuario){
    $stm = $con->query("SELECT * dependencias dp 
    LEFT JOIN usuarios u ON u.id_usuario = dp.id_administrador");
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($dependencias);
    return $dependencias;
}

function TraeAvances($con, $id_usuario, $nivel){ // Debemos revisar esto
    $stm = $con->query("SELECT *,
    us1.nombre as nombre1, us1.apellidos as apellidos1,
    us2.nombre as nombre2, us2.apellidos as apellidos2,
    FROM avances a
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad
    LEFT JOIN pdm_lineas pdml ON pdml.clave_linea = la.id_linea
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_avance
    LEFT JOIN actividades ac ON ac.id_actividad = a.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    LEFT JOIN dependencias_generales dpg ON dpg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares dpa ON dpa.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
    LEFT JOIN usuarios us1 ON us1.id_usuario = a.id_usuario_validador
    LEFT JOIN usuarios us2 ON us2.id_usuario = a.id_usuario_validador
    WHERE (a.validado != 1 OR a.validado_2 != 1) AND dp.id_administrador = $id_usuario
    GROUP BY a.id_actividad");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data_avances_actividades);
    return $data_avances_actividades;
}