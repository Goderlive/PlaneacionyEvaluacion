<?php 
session_start();
require_once '../models/conection.php';

if(!(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm")){    
    header("Location: ../index.php");
}

$stm = $con->query("SELECT * FROM ante_indicadores_uso iu
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = iu.id_dep_general
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
ORDER BY dg.clave_dependencia ASC, da.clave_dependencia_auxiliar ASC, py.codigo_proyecto ASC
");
$unob = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach($unob as $a){
    print(
    $a['clave_dependencia'] . "|" . $a['clave_dependencia_auxiliar'] . "|" . $a['codigo_proyecto'] . "|" . $a['nombre_indicador'] . "|" . $a['interpretacion'] . "|" . $a['tipo'] . "|" . $a['formula'] . "|" . $a['periodicidad'] . "|" .
    $a['variable_a'] . "|" . $a['tipo_op_a'] . "|" . $a['umedida_a'] .  "|" . $a['at1'] . "|" . $a['at2'] . "|" . $a['at3'] . "|" . $a['at4'] . "<br>" . 
    $a['clave_dependencia'] . "|" . $a['clave_dependencia_auxiliar'] . "|" . $a['codigo_proyecto'] . "|" . $a['nombre_indicador'] . "|" . $a['interpretacion'] . "|" . $a['tipo'] . "|" . $a['formula'] . "|" . $a['periodicidad'] . "|" .
    $a['variable_b'] . "|" . $a['tipo_op_b'] . "|" . $a['umedida_b'] .  "|" . $a['bt1'] . "|" . $a['bt2'] . "|" . $a['bt3'] . "|" . $a['bt4'] . "<br>");
}

?>