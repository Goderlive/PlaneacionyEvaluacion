<?php 

require 'conection.php';

function claves($con){
    $stm = $con->query("SELECT li.clave_linea, li.nombre_linea, pp.codigo_programa, pp.nombre_programa, py.codigo_proyecto, py.nombre_proyecto, ac.nombre_actividad FROM lineasactividades la
    JOIN pdm_lineas li ON la.id_linea = li.id_linea 
    JOIN actividades ac ON ac.id_actividad = la.id_actividad
    JOIN areas ar ON ar.id_area = ac.id_area
    JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
    JOIN dependencias_auxiliares de ON de.id_dependencia_auxiliar = ar.id_dependencia_aux
    JOIN proyectos py ON ar.id_proyecto = py.id_proyecto
    JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    GROUP BY li.clave_linea
    ORDER BY li.clave_linea;");
    $claves = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $claves;
}


$claves = claves($con);

foreach($claves as $c){
    print $c['clave_linea'] . "|".  $c['nombre_linea'] . "|".  $c['codigo_programa'] . "|".  $c['nombre_programa'] . "|".  $c['codigo_proyecto'] . "|".  $c['nombre_proyecto'] . "|".  $c['nombre_actividad'];
    print "<br>";
}

?>