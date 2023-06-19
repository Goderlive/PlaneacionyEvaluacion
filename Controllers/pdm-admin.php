<?php 

$sentencia = "SELECT * FROM actividades ac
JOIN lineasactividades la ON la.id_actividad = ac.id_actividad
JOIN pdm_lineas li ON li.id_linea = la.id_linea
LEFT JOIN pdm_estrategias es ON es.id_estrategia = li.id_estrategia
LEFT JOIN pdm_objetivos ob ON ob.id_objetivo = es.id_objetivos
LEFT JOIN temas_pdm te ON te.id_tema = ob.id_tema
LEFT JOIN pilaresyejes pi ON pi.id_pilaroeje = te.id_pilar
WHERE pi.id_pilaroeje = 1
";