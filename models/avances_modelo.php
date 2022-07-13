<?php
require_once 'models/conection.php';

function ConsultaAvancesActividades($con){

    $stm = $con->query("SELECT a.id_avance, a.mes, a.avance, a.justificacion, a.path_evidenia_evidencia, a.descripcion_evidencia, a.fecha_avance,
    u.nombre, u.apellidos, u.id_permiso, u.correo_electronico, u.tel,
    ac.nombre_actividad, ac.unidad,
    ar.nombre_area,
    dp.nombre_dependencia,
    dpg.clave_dependencia,
    dpa.clave_dependencia_auxiliar,
    py.codigo_proyecto,
    pr.*
    FROM avances a
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_avance
    LEFT JOIN actividades ac ON ac.id_actividad = a.id_actividad
    LEFT JOIN areas ar ON ar.id_area = ac.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
    LEFT JOIN dependencias_generales dpg ON dpg.id_dependencia = ar.id_dependencia_general
    LEFT JOIN dependencias_auxiliares dpa ON dpa.id_dependencia_auxiliar = ar.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
    LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
    WHERE a.validado != 1");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data_avances_actividades);
    return $data_avances_actividades;
}


?>