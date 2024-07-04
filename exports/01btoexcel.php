<?php 
session_start();
require_once '../models/conection.php';

if(!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")){    
    header("Location: ../index.php");
}

$stm = $con->query("SELECT * FROM ante_unob ub
LEFT JOIN ante_areas aa ON aa.id_area = ub.id_area
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = aa.id_dependencia_general
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = aa.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = aa.id_proyecto
ORDER BY dg.clave_dependencia ASC, da.clave_dependencia_auxiliar ASC, py.codigo_proyecto ASC
");
$unob = $stm->fetchAll(PDO::FETCH_ASSOC);



foreach($unob as $a){
    print($a['clave_dependencia'] . "|" . $a['clave_dependencia_auxiliar'] . "|" . $a['codigo_proyecto'] . "|" . $a['diagnostico_fortaleza'] . "|" . $a['diagnostico_oportunidad'] . "|" . $a['diagnostico_debilidad'] . "|" . $a['diagnostico_amenaza'] .'<br>');
}

?>