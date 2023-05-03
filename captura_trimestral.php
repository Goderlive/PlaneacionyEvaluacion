<?php
session_start();
$trimestre = 1;
$id_usuario = $_SESSION['id_usuario'];

if(isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm"){    
    require_once 'Controllers/Inicio_Controlador.php';
    include 'header.php';
    include 'head.php';
?>
<!DOCTYPE html>
<html lang="es">
<body>


<?php 
$sql = " SELECT * FROM indicadores_uso iu
LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador
LEFT JOIN dependencias dp ON iu.id_dependencia = dp.id_dependencia 
LEFT JOIN dependencias_generales dg ON iu.id_dep_general = dg.id_dependencia
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
ORDER BY dg.clave_dependencia, da.clave_dependencia_auxiliar, py.codigo_proyecto
";
$stm = $con->query($sql);
$indicadores_avances = $stm->fetchAll(PDO::FETCH_ASSOC);?>


Nos muestras las areas que faltan por capurar indicadores: <br>
<?php foreach ($indicadores_avances as $ind): ?>

    <?php if($ind['periodicidad'] == "Mensual" || $ind['periodicidad'] == "Trimestral"): ?>

        <?php if(!$ind['id_avance']):?>
            <?= $ind['nombre_dependencia'] . " - " . $ind['id'] . "<br>" ?>
        <?php endif ?>
    <?php endif ?>

<?php endforeach ?>

Muestra los avances de indicadores <br>
<table>
    
    <?php foreach($indicadores_avances as $indica): ?>
        <?php if($indica['id_avance'] ): ?>
            <?= "<tr>" ."<td>" . $indica['clave_dependencia'] . " | " . $indica['clave_dependencia_auxiliar'] . " | " . $indica['codigo_proyecto'] . " | " . $indica['nombre_indicador'] . " | " . $indica['at1'] . " | " . $indica['avance_a'] . "</td>". "</tr>" ?>
            <?= "<tr>" ."<td>" . $indica['clave_dependencia'] . " | " . $indica['clave_dependencia_auxiliar'] . " | " . $indica['codigo_proyecto'] . " | " . $indica['nombre_indicador'] . " | " . $indica['bt1'] . " | " . $indica['avance_b'] . "</td>". "</tr>" ?>
            <tr><td>-</td></tr>
        <?php endif ?>
    <?php endforeach ?>
            <br>
            <br>
</table>

<div class="container text-center mx-auto">

<?php 
$sql = " SELECT * FROM actividades ac
LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
LEFT JOIN areas ar ON ar.id_area = ac.id_area 
LEFT JOIN dependencias dp ON ar.id_dependencia = dp.id_dependencia 
LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
WHERE ac.id_actividad < 941
";
$stm = $con->query($sql);
$actividadesyavances = $stm->fetchAll(PDO::FETCH_ASSOC);?>

Nos imprime las actividades listas para capturar

<?php 
function revisaavances($con, $id_actividad, $mes1, $mes3){
    $sql = " SELECT * FROM avances 
    WHERE id_actividad = $id_actividad AND mes BETWEEN $mes1 AND $mes3
    ";
    $stm = $con->query($sql);
    $avances = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $avances;
}
$contador = 0;
print "<table>";
foreach($actividadesyavances as $a):
    if($trimestre == 1){
        $avance = revisaavances($con, $a['id_actividad'], 1,3);
        $metatrimav = 0;
        foreach($avance as $v){
            $metatrimav += $v['avance'];            
        }
        $metatrimpro = $a['enero'] + $a['febrero'] + $a['marzo'];
        if($metatrimav != $metatrimpro){
        print '<tr style="background-color: #FFFF00;">';
            print "<td>" . $a['clave_dependencia'] ." </td>";
            print "<td>" . $a['clave_dependencia_auxiliar'] ." </td>";
            print "<td>" . $a['codigo_proyecto'] ." </td>";
            print "<td>" . $a['codigo_actividad'] ." </td>";
            print "<td>" . $a['nombre_actividad'] ." </td>";
            print "<td>" . $metatrimpro ." </td>";
            print "<td>" . $metatrimav ." </td>";
        print "</tr>";
            $contador +=1;
        }else{
            print '<tr>';
            print "<td>" . $a['clave_dependencia'] ." </td>";
            print "<td>" . $a['clave_dependencia_auxiliar'] ." </td>";
            print "<td>" . $a['codigo_proyecto'] ." </td>";
            print "<td>" . $a['codigo_actividad'] ." </td>";
            print "<td>" . $a['nombre_actividad'] ." </td>";
            print "<td>" . $metatrimpro ." </td>";
            print "<td>" . $metatrimav ." </td>";
        print "</tr>";
        }
    
    }
?>

<?php endforeach ?>
</table>

Nos dice las dependencias que faltan de capturar actividades
<?php 
$sql = " SELECT * FROM actividades ac
LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
LEFT JOIN areas ar ON ar.id_area = ac.id_area 
LEFT JOIN dependencias dp ON ar.id_dependencia = dp.id_dependencia 
LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
";
$stm = $con->query($sql);
$actividadesyavances = $stm->fetchAll(PDO::FETCH_ASSOC);?>
    
<?php 
$contador = 0;


foreach($actividadesyavances as $a):
    if($trimestre == 1){
        $avance = revisaavances($con, $a['id_actividad'], 1,3);
        if(count($avance) != 3){
            print $a['nombre_dependencia'] . " esta incompleta ".$a['nombre_actividad']." <br>";
            $contador +=1;
        }
    }

?>


<?php endforeach ?>
</div>

<?php include 'footer.php';?>
</body>
</html>
<?php 
}else{?>
    <script>
    window.location.href = 'login.php';
    </script>
<?php
}
?>