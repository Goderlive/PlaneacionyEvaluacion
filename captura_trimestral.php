<?php
session_start();
$anio = $_SESSION['anio'];
$trimestre = 1;
$id_usuario = $_SESSION['id_usuario'];
$post_trimestre = 1;

if (isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm") {
    require_once 'Controllers/Inicio_Controlador.php';
    include 'header.php';
    include 'head.php';
?>
    <!DOCTYPE html>
    <html lang="es">

    <body>



        NOS DICE LAS LINEAS DE ACCION QUE NO TIENEN ACTIVIDAD VINCULADA
        <?php
        $sqlpdm = "SELECT * FROM pdm_lineas 
WHERE id_linea NOT IN (SELECT id_linea FROM lineasactividades WHERE anio = $anio)
";
        $stm = $con->query($sqlpdm);
        $verificavinculacion = $stm->fetchAll(PDO::FETCH_ASSOC); ?>


        <?php foreach ($verificavinculacion as $uno) : ?>
            <?= $uno['clave_linea'] . ' ' . $uno['nombre_linea'] ?>
            <br>
        <?php endforeach ?>








        <?php
        $sql = " SELECT * FROM indicadores_uso iu
LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
LEFT JOIN avances_indicadores ai ON iu.id = ai.id_indicador
LEFT JOIN dependencias dp ON iu.id_dependencia = dp.id_dependencia 
LEFT JOIN dependencias_generales dg ON iu.id_dep_general = dg.id_dependencia
LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = iu.id_dep_aux
LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
WHERE ai.trimestre = 1 AND dp.anio = '2024' AND (i.frecuencia = 'Trimestral' OR i.frecuencia = 'Mensual')
ORDER BY dg.clave_dependencia, da.clave_dependencia_auxiliar, py.codigo_proyecto
";

        $stm = $con->query($sql);
        $indicadores_avances = $stm->fetchAll(PDO::FETCH_ASSOC); ?>


        Nos muestras las areas que faltan por capurar indicadores: <br>
        <?php foreach ($indicadores_avances as $ind) : ?>
            <?php if (!$ind['id_avance']) : ?>
                <?= $ind['nombre_dependencia'] . " - " . $ind['id'] . "<br>" ?>
            <?php endif ?>

        <?php endforeach ?>
        <br>
        Muestra los avances de indicadores <br>
        <table>

            <?php foreach ($indicadores_avances as $indica) : ?>
                <?php if ($indica['id_avance']) : ?>
                    <?= "<tr>" . "<td>" . $indica['clave_dependencia'] . " | " .
                        $indica['clave_dependencia_auxiliar'] . " | " .
                        $indica['codigo_proyecto'] . " | " .
                        $indica['nombre'] . " | " .
                        $indica['at1'] . " | " .
                        $indica['avance_a'] . "</td>" . "</tr>" ?>
                    <?= "<tr>" . "<td>" . $indica['clave_dependencia'] . " | " .
                        $indica['clave_dependencia_auxiliar'] . " | " .
                        $indica['codigo_proyecto'] . " | " .
                        $indica['nombre'] . " | " .
                        $indica['bt1'] . " | " .
                        $indica['avance_b'] . "</td>" . "</tr>" ?>
                    <tr>
                        <td>-</td>
                    </tr>
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
            WHERE dp.tipo = 1 AND dp.anio = '2024'
            ORDER BY dg.clave_dependencia, da.clave_dependencia_auxiliar, py.codigo_proyecto, ac.codigo_actividad
            ";
            $stm = $con->query($sql);
            $actividadesyavances = $stm->fetchAll(PDO::FETCH_ASSOC); ?>


            <?php
            $sqlpdm = " SELECT * FROM lineasactividades la
            LEFT JOIN actividades ac ON ac.id_actividad = la.id_actividad
            LEFT JOIN pdm_lineas pl ON pl.id_linea = la.id_linea
            LEFT JOIN pdm_estrategias es ON es.id_estrategia = pl.id_estrategia
            LEFT JOIN pdm_objetivos ob ON ob.id_objetivo = es.id_objetivo
            LEFT JOIN temas_pdm tm ON tm.id_tema = ob.id_tema
            LEFT JOIN pilaresyejes pe ON pe.id_pilaroeje = tm.id_pilar
            LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad 
            LEFT JOIN areas ar ON ar.id_area = ac.id_area
            LEFT JOIN dependencias dp ON dp.id_dependencia = ar.id_dependencia
            LEFT JOIN avances av ON av.id_actividad = ac.id_actividad
            WHERE dp.anio = '2024'
            ORDER BY dp.nombre_dependencia ASC
            ";
            $stm = $con->query($sqlpdm);
            $actividadesyavancespdm = $stm->fetchAll(PDO::FETCH_ASSOC); ?>


            <h1> nos dice las actividades faltantes de reportar PDM</h1>

            <?php foreach ($actividadesyavancespdm as $faltamagi) : ?>
                <?php if (isset($faltamagi['id_linea'])) : ?>
                    <?php if (!$faltamagi['id_avance']) : ?>
                        <?= $faltamagi['nombre_dependencia'] . " /// " .  $faltamagi['nombre_actividad'] ?> <br>
                    <?php endif ?>
                <?php endif ?>
            <?php endforeach ?>


            <br><br><br>
            <h2>Nos imprime las actividades listas para capturar</h2>

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
            foreach ($actividadesyavances as $a) :
                if ($trimestre == $post_trimestre) {
                    $avance = revisaavances($con, $a['id_actividad'], 1, 3);
                    $metatrimav = 0;
                    foreach ($avance as $v) {
                        $metatrimav += $v['avance'];
                    }
                    $metatrimpro = $a['enero'] + $a['febrero'] + $a['marzo'];
                    $metaanual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
                    print '"' . $a['clave_dependencia'] . '"|"' . $a['clave_dependencia_auxiliar'] . '"|"' . $a['codigo_proyecto'] . '"|"' . $a['codigo_actividad'] . '"|"' . $a['nombre_actividad'] . '"|"' . $metaanual . '"|"' . $a['enero'] . '"|"' . $a['febrero'] . '"|"' . $a['marzo'] . '"|"' . $avance[0]['avance'] . '"|"' . $avance[1]['avance'] . '"|"' . $avance[2]['avance'] . '"';
                    print "<br>";
                    $contador += 1;
                }
            ?>

            <?php endforeach ?>
            </table>

            Nos dice las dependencias que faltan de capturar actividades <br>
            <?php
            $sql = " SELECT * FROM actividades ac
            LEFT JOIN programaciones pr ON pr.id_actividad = ac.id_actividad
            LEFT JOIN areas ar ON ar.id_area = ac.id_area 
            LEFT JOIN dependencias dp ON ar.id_dependencia = dp.id_dependencia 
            LEFT JOIN dependencias_generales dg ON ar.id_dependencia_general = dg.id_dependencia
            LEFT JOIN dependencias_auxiliares da ON da.id_dependencia_auxiliar = ar.id_dependencia_aux
            LEFT JOIN proyectos py ON py.id_proyecto = ar.id_proyecto
            WHERE dp.tipo = 1
            ";
            $stm = $con->query($sql);
            $actividadesyavances = $stm->fetchAll(PDO::FETCH_ASSOC); ?>

            <?php
            $contador = 0;


            foreach ($actividadesyavances as $a) :
                if ($trimestre == 4) {
                    $avance = revisaavances($con, $a['id_actividad'], 10, 12);
                    if (count($avance) != 3) {
                        print $a['nombre_dependencia'] . " esta incompleta " . $a['nombre_actividad'] . " <br>";
                        $contador += 1;
                    }
                }

            ?>


            <?php endforeach ?>
        </div>

        <?php include 'footer.php'; ?>
    </body>

    </html>
<?php
} else { ?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}
?>