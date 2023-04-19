<?php
require_once 'conection.php';

function ConsultaAvancesActividades($con){

    $stm = $con->query("SELECT a.id_avance, a.mes, a.avance, a.justificacion, a.path_evidenia_evidencia, a.descripcion_evidencia, a.fecha_avance, a.validado, a.validado_2, a.id_usuario_validador, a.id_usuario_validador_2, a.localidades,
    u.nombre, u.apellidos, u.correo_electronico, u.tel,
    ac.nombre_actividad, ac.unidad,
    ar.nombre_area,
    dp.id_administrador,
    dp.nombre_dependencia,
    dpg.clave_dependencia,
    dpa.clave_dependencia_auxiliar,
    py.codigo_proyecto,
    pr.*,
    us1.nombre as nombre1, us1.apellidos as apellidos2,
    us2.nombre as nombre2, us2.apellidos as apellidos2
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
    WHERE a.validado != 1 OR a.validado_2 != 1
    GROUP BY a.id_actividad");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data_avances_actividades);
    return $data_avances_actividades;
}

function ConsultaAvancesIndicadores($con){
    $stm = $con->query("SELECT a.id_avance, a.trimestre, a.avance_a, a.avance_b, a.avance_c, a.justificacion, a.path_evidenia_evidencia, a.descripcion_evidencia, a.fecha_reporta,
    u.nombre, u.apellidos, u.correo_electronico, u.tel,
    iu.nombre_indicador, iu.variable_a, iu.variable_b, iu.variable_c, iu.tipo_op_a, iu.tipo_op_b, iu.tipo_op_c, iu.umedida_a, iu.umedida_b, iu.umedida_c, iu.at1, iu.at2, iu.at3, iu.at4, iu.bt1, iu.bt2, iu.bt3, iu.bt4, iu.ct1, iu.ct2, iu.ct3, iu.ct4,
    dp.nombre_dependencia,
    dpg.clave_dependencia,
    dpa.clave_dependencia_auxiliar,
    py.codigo_proyecto
    FROM avances_indicadores a
    LEFT JOIN usuarios u ON u.id_usuario = a.id_usuario_reporta
    LEFT JOIN indicadores_uso iu ON iu.id = a.id_indicador
    LEFT JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
    LEFT JOIN dependencias_generales dpg ON dpg.id_dependencia = iu.id_dep_general
    LEFT JOIN dependencias_auxiliares dpa ON dpa.id_dependencia_auxiliar = iu.id_dep_aux
    LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
    WHERE a.validado != 1");
    $data_avances_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data_avances_actividades);
    return $data_avances_actividades;
}

function TraeLocalidades($con){
    $stm = $con->query("SELECT * FROM localidades");
    return $localidades = $stm->fetchAll(PDO::FETCH_ASSOC);
}

function traeavance($con, $id_indicador, $trimestre){
    $stm = $con->query("SELECT * FROM avances_indicadores WHERE id_indicador = $id_indicador AND trimestre = $trimestre");
    $avance = $stm->fetchAll(PDO::FETCH_ASSOC);
}


if($_POST){
    $tipo = '';
    $data = $_POST;
    if(isset($_POST['valida_actividad'])){
        if($_POST['valida_actividad'] == 1){
            $sql = "UPDATE avances SET validado = 1, id_usuario_validador = ?, fecha_validador = NOW() WHERE id_avance = ?";
        }
        if($_POST['valida_actividad'] == 2){
            $sql = "UPDATE avances SET validado_2 = 1, id_usuario_validador = ?, fecha_validador = NOW() WHERE id_avance = ?";
        }
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($data['usuario'], $data['id_avance']));
        $tipo = "actividades";
    }

    if(isset($_POST['cancela_actividad'])){
        $id_avance = $data['id_avance'];
        $nrows = $con->exec("DELETE FROM avances WHERE id_avance = $id_avance");
        $tipo = "actividades";
    }


    if(isset($_POST['valida_indicador'])){
        $sql = "UPDATE avances_indicadores SET validado = 1, id_usuario_valida = ?, fecha_valida = NOW() WHERE id_avance = ?";
        $sqlr = $con->prepare($sql);
        $sqlr->execute(array($data['usuario'], $data['id_avance']));
        $tipo = "indicadores";
    }

    if(isset($_POST['cancela_indicador'])){
        $id_avance = $data['id_avance'];
        $nrows = $con->exec("DELETE FROM avances_indicadores WHERE id_avance = $id_avance");
        $tipo = "indicadores";
    }


    

    header("Location: ../revisa_avances.php?type=$tipo");
}

?>