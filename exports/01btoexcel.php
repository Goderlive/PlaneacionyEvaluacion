<?php 
session_start();
require_once '../models/conection.php';

if(!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")){    
    header("Location: ../index.php");
}

try {
    $stm = $con->query("SELECT * FROM ante_unob ub
    LEFT JOIN ante_areas aa ON aa.id_area = ub.id_area
    LEFT JOIN pdm_lineas pl ON pl.id_linea = ub.linea_accion
    LEFT JOIN pdm_estrategias pe ON pe.id_estrategia = pl.id_estrategia
    LEFT JOIN pdm_objetivos po ON po.id_objetivo = pe.id_objetivo
    LEFT JOIN estrategias_ods ed ON ed.id_estrategia = ub.id_ods
    LEFT JOIN objetivos_ods od ON od.id_objetivo = ed.id_objetivo
    LEFT JOIN dependencias_generales dg ON dg.id_dependencia = aa.id_dependencia_general
    LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = aa.id_dependencia_aux
    LEFT JOIN proyectos py ON py.id_proyecto = aa.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    LEFT JOIN ante_dependencias dp ON dp.id_antedependencia = aa.id_dependencia
    WHERE dp.tipo = 1
    ORDER BY dg.clave_dependencia ASC, da.clave_dependencia_auxiliar ASC, py.codigo_proyecto ASC
    ");
    $unob = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

foreach($unob as $a){
    print("2024||" . $a['clave_dependencia'] . $a['clave_dependencia_auxiliar'] . "|" . $a['codigo_proyecto'] . "|1|
    Fortaleza: ". $a['diagnostico_fortaleza'] . " Oportunuidad: " .$a['diagnostico_oportunidad'] . "Debilidad: " .$a['diagnostico_debilidad'] . "Amenaza: " .$a['diagnostico_amenaza'] . "|" . 
    $a['objetivo_pp'] . "|" . $a['estrategia'] . "|" . $a['clave_objetivo'] . ": " . $a['nombre_objetivo'] . "|" . 
    $a['clave_estrategia'] . ": " .$a['nombre_estrategia'] . "|" . $a['clave_linea'] . ": " . $a['nombre_linea'] . "|" . $a['clv_objetivo'] . "|" . $a['clv_estrategia'] . '<br>');
}






?>