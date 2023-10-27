<?php 
require_once 'models/conection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php 
$sentencia = "
SELECT ac.id_actividad, dg.clave_dependencia, da.clave_dependencia_auxiliar, py.codigo_proyecto, dp.nombre_dependencia, ar.nombre_area, ac.codigo_actividad, ac.nombre_actividad, ac.unidad, pg.*
FROM actividades ac
LEFT JOIN programaciones pg ON pg.id_actividad = ac.id_actividad
LEFT JOIN areas ar ON ar.id_area = ac.id_area 
LEFT JOIN dependencias_generales dg ON dg.id_dependencia = ar.id_dependencia_general
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia;
";
$stm = $con->query($sentencia);
$actividades = $stm->fetchAll(PDO::FETCH_ASSOC);


function avanceActividad($con, $id_actividad, $mes){
    switch ($mes) {
        case 'enero':
            $mes = 1;
            break;
        case 'febrero':
            $mes = 2;
            break;
        case 'marzo':
            $mes = 3;
            break;
        case 'abril':
            $mes = 4;
            break;
        case 'mayo':
            $mes = 5;
            break;
        case 'junio':
            $mes = 6;
            break;
        case 'julio':
            $mes = 7;
            break;
        case 'agosto':
            $mes = 8;
            break;
        case 'septiembre':
            $mes = 9;
            break;
        case 'octubre':
            $mes = 10;
            break;
        case 'noviembre':
            $mes = 11;
            break;
        case 'diciembre':
            $mes = 12;
            break;
        default:
            return 0;
            break;
    }
    $sentencia = "
    SELECT avance FROM avances
    WHERE id_actividad = $id_actividad AND
    mes = $mes
    ";
    $stm = $con->query($sentencia);
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    if($avance){
        return $avance['avance']; 
    }else{
        return "";
    }
}


?>




<table>

    <?php foreach($actividades as $a): ?>
        <?php $id_actividad = $a['id_actividad'] ?>
        <tr>
            <?php $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'] ?>
            <td><?= $a['clave_dependencia'] ?></td>
            <td><?= $a['clave_dependencia_auxiliar'] ?></td>
            <td><?= $a['codigo_proyecto'] ?></td>
            <td><?= $a['nombre_dependencia'] ?></td>
            <td><?= $a['nombre_area'] ?></td>
            <td><?= $a['codigo_actividad'] ?></td>
            <td><?= $a['nombre_actividad'] ?></td>
            <td><?= $a['unidad'] ?></td>
            <td><?= $anual ?></td>
            <td><?= $a['enero'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "enero") ?></td>
            <td><?= $a['febrero'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "febrero") ?></td>
            <td><?= $a['marzo'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "marzo") ?></td>
            <td><?= $a['abril'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "abril") ?></td>
            <td><?= $a['mayo'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "mayo") ?></td>
            <td><?= $a['junio'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "junio") ?></td>
            <td><?= $a['julio'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "julio") ?></td>
            <td><?= $a['agosto'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "agosto") ?></td>
            <td><?= $a['septiembre'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "septiembre") ?></td>
            <td><?= $a['octubre'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "octubre") ?></td>
            <td><?= $a['noviembre'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "noviembre") ?></td>
            <td><?= $a['diciembre'] ?></td>
            <td><?= avanceActividad($con, $id_actividad, "diciembre") ?></td>

        </tr>            
    <?php endforeach ?>
        
</table>

</body>
</html>