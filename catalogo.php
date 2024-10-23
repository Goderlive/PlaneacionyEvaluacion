<?php 
require_once 'models/conection.php';

$sentencia = "SELECT 
    ar.*, 
    dp.*, 
    dg.*, 
    da.*, 
    py.*, 
    pp.*, 
    COUNT(ac.id_actividad) AS total_actividades
FROM 
    areas ar
LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
LEFT JOIN actividades ac ON ac.id_area = ar.id_area
WHERE 
    dp.anio = '2024' 
    AND dp.tipo = 1
GROUP BY 
    ar.id_area;
";
$stm = $con->query($sentencia);
$areas = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <?php foreach ($areas as $a): ?>
        <tr>
            <td><?= $a['clave_dependencia'] . " " . $a['nombre_dependencia_general'] ?></td>
            <td><?= $a['clave_dependencia_auxiliar'] . " " . $a['nombre_dependencia_auxiliar'] ?></td>
            <td><?= $a['nombre_proyecto'] ?></td>
            <td><?= $a['total_actividades'] ?></td>
        </tr>
    <?php endforeach ?>
</table>