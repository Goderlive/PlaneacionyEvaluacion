<?php
require_once '../models/conection.php';


$ver_e = array(
    array("F00","313","020608010103"),
    array("F00","301","020608030102"),
    array("F00","301","020608030201"),
    array("F00","301","020608030201"),
    array("F00","314","020608020201"),
    array("F00","314","020608020201"),
    array("F00","314","020608020302"),
    array("F00","314","020608020302"),
    array("F00","314","020608020302"),
    array("F00","314","020608020301"),
    array("F00","314","020608020302"),
    array("F00","313","020608010103"),
    array("F00","313","020608010104"),
    array("F00","313","020608010103"),
    array("F00","313","020608010103"),
    array("F00","301","020608030201"),
    array("F00","311","020605010105"),
    array("F00","311","020605010105"),
    array("F00","311","020605010105"),
    array("F00","311","020506030101"),
    array("F00","311","020506030101"),
    array("F00","311","020506030102"),
    array("F00","311","020506030101"),
    array("E00","310","020301010101"),
    array("E00","310","020301010201"),
    array("E00","310","020301010101"),
    array("E00","310","020301010101"),
    array("E00","310","020301010101"),
    array("E00","310","020301010101"),
    array("E00","310","020301010202"),
    array("F00","314","020608020302"),
    array("F00","309","020608050103"),
        
);

$sentencia = "SELECT * FROM areas ar
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
WHERE dp.tipo = 2 AND dp.anio = '2024'
GROUP BY ar.id_area
";
$stm = $con->query($sentencia);
$areas_dif = $stm->fetchAll(PDO::FETCH_ASSOC);


foreach($areas_dif as $d){
    $clave = $d['clave_dependencia'] . $d['clave_dependencia_auxiliar'] . $d['codigo_proyecto'];

    print $clave;
}


