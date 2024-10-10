<?php
session_start();
if ($_SESSION['sistema'] != "pbrm" || $_SESSION['nivel'] != 1 || !$_POST) {
    header("Location: ../index.php");
}
require_once '../models/conection.php';
$anio = $_SESSION['anio'];
$aniod = $_SESSION['anio'] + 1;
$etapa = $_POST['etapa'];




// Funciones
function traeNuevaDependencia($con, $aniod, $id_dependencia)
{
    $stm = $con->query("SELECT id_antedependencia FROM ante_dependencias WHERE id_seguimiento_dependencia = $id_dependencia AND anio = $aniod"); // Traemos las dependencias que ya existen del año actual
    $dependencia = $stm->fetch(PDO::FETCH_ASSOC);
    return $dependencia['id_antedependencia'];
}

function traeAvances($con, $id_actividad)
{
    $stm = $con->query("SELECT SUM(avance) AS total_avance
    FROM avances
    WHERE id_actividad = $id_actividad"); // Traemos las dependencias que ya existen del año actual
    $avance = $stm->fetch(PDO::FETCH_ASSOC);
    $avance = $avance['total_avance'];
}

function traeArea($con, $id_area)
{
    $stm = $con->query("SELECT id_area FROM ante_areas WHERE id_seguimiento_area = $id_area"); // Traemos las dependencias que ya existen del año actual
    $area = $stm->fetch(PDO::FETCH_ASSOC);
    return $area['id_area'];
}
// Fin Funciones

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
    // Primero vamos a traer las dependencias Generales y la vamos a colocar en las ante_dependencias con el uno /////////////////////////////////

    // Verificamos que no exista, si existe, eliminamos, si no existe solo creamos.
    $stm = $con->query("SELECT 1 FROM ante_dependencias WHERE anio = $aniod AND etapa = 1");
    $anteproyecto_dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);
    if ($anteproyecto_dependencias) {
        echo "Existe, hay que borrarla<br>";
        $nrows = $con->exec("DELETE FROM ante_dependencias WHERE anio = $aniod AND etapa = 1");
        $nrows = $con->exec("DELETE FROM ante_areas WHERE anio = $aniod AND etapa = 1");
        $nrows = $con->exec("DELETE pr FROM ante_programaciones pr JOIN ante_actividades ac ON pr.id_actividad = ac.id_actividad WHERE ac.anio = $aniod AND ac.etapa = 1");
        $nrows = $con->exec("DELETE FROM ante_actividades WHERE anio = $aniod AND etapa = 1");
        $nrows = $con->exec("DELETE FROM ante_indicadores_uso WHERE anio = $aniod AND etapa = 1");
        $nrows = $con->exec("DELETE FROM ante_lineasactividades WHERE anio = $aniod AND etapa = 1");
        $nrows = $con->exec("DELETE FROM ante_unob WHERE anio = $aniod AND etapa = 1");
        echo "Eliminadas exitosamente<br>";
    }

    // Una vez limpio, las creamos
    // Comenzamos con las dependencias
    $stm = $con->query("SELECT * FROM dependencias WHERE anio = $anio"); // Traemos las dependencias que ya existen del año actual
    $dependencias = $stm->fetchAll(PDO::FETCH_ASSOC);


    // Las recorremos y las insertamos en el nuevo a;o y con la etapa 1, ademas le ponemos el id de seguimiento.
    if ($dependencias) {
        foreach ($dependencias as $d) {
            $nombre_dependencia = $d['nombre_dependencia'];
            $id_dependencia_gen = $d['id_dependencia_gen'];
            $active = 1;
            $tipo = $d['tipo'];
            $id_seguimiento_dependencia = $d['id_dependencia'];
            $id_administrador = $d['id_administrador'];
            $sql = "INSERT INTO ante_dependencias (nombre_dependencia, id_dependencia_gen, active, anio, tipo, id_seguimiento_dependencia, id_administrador, etapa) VALUES (?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            try {
                $sqlr->execute(array($nombre_dependencia, $id_dependencia_gen, $active, $aniod, $tipo, $id_seguimiento_dependencia, $id_administrador, 1));
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    } else {
        echo "Algo no salio bien, contactar al administrador Error: DP001R";
        die();
    }
    echo "Las dependencias se exportaron correctamente<br>";


    // Luego vamos con las Areas /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Traemos las areas del a;o actual 
    $stm = $con->query("SELECT * FROM areas WHERE anio = $anio");
    $areas = $stm->fetchAll(PDO::FETCH_ASSOC);

    // Las recorreremos en las AREAS y las metemos en ante_areas.
    if ($areas) {
        foreach ($areas as $a) {
            $nombre_area = $a['nombre_area'];
            $id_dependencia = traeNuevaDependencia($con, $aniod, $a['id_dependencia']);
            $id_dependencia_general = $a['id_dependencia_general'];
            $id_dependencia_aux = $a['id_dependencia_aux'];
            $id_proyecto = $a['id_proyecto'];
            $active = 1;
            $id_seguimiento_area = $a['id_area'];
            $sql = "INSERT INTO ante_areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, anio, id_seguimiento_area, etapa, active) VALUES (?,?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            try {
                $sqlr->execute(array($nombre_area, $id_dependencia, $id_dependencia_general, $id_dependencia_aux, $id_proyecto, $aniod, $id_seguimiento_area, 1, $active));
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    } else {
        echo "Algo no salio bien, contactar al administrador Error: AR001R";
        die();
    }
    echo "Las Areas se exportaron correctamente<br>";

    // Luego vamos con el formato 01b /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Traemos la programacion de la tabla  del anteproyecto del a;o anterior
    $sentencia = "SELECT *, aar.id_area
        FROM ante_unob ab 
        JOIN areas ar ON ar.id_seguimiento_area = ab.id_area
        JOIN ante_areas aar ON aar.id_seguimiento_area = ar.id_area
        WHERE ab.anio = $anio 
        AND ab.etapa = 3
    ";
    $stm = $con->query($sentencia);
    $fodas = $stm->fetchAll(PDO::FETCH_ASSOC);

    if (!$fodas) {
        $sentencia = "SELECT *, aar.id_area
        FROM ante_unob ab 
        JOIN areas ar ON ar.id_seguimiento_area = ab.id_area
        JOIN ante_areas aar ON aar.id_seguimiento_area = ar.id_area
        LEFT JOIN ante_dependencias dp ON dp.id_antedependencia = aar.id_dependencia 
        WHERE ab.anio = $anio 
        AND ab.etapa = 1
        AND dp.tipo = 1
        ";
        $stm = $con->query($sentencia);
        $fodas = $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // Las recorreremos en las AREAS y las metemos en ante_areas.
    if ($fodas) {
        foreach ($fodas as $a) {
            $id_ante_unob_seguimiento = $a['id_ante_unob'];
            $diagnostico_fortaleza = $a['diagnostico_fortaleza'];
            $diagnostico_oportunidad = $a['diagnostico_oportunidad'];
            $diagnostico_debilidad = $a['diagnostico_debilidad'];
            $diagnostico_amenaza = $a['diagnostico_amenaza'];
            $estrategia = $a['estrategia'];
            $id_ods = $a['id_ods'];
            $linea_accion = $a['linea_accion'];
            $id_area = $a['id_area'];
            $etapa = $etapa;

            $sql = "INSERT INTO ante_unob (diagnostico_fortaleza, diagnostico_oportunidad, diagnostico_debilidad, diagnostico_amenaza, estrategia, id_ods, linea_accion, id_area, etapa, anio, id_ante_unob_seguimiento) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            try {
                $sqlr->execute(array($diagnostico_fortaleza, $diagnostico_oportunidad, $diagnostico_debilidad, $diagnostico_amenaza, $estrategia, $id_ods, $linea_accion, $id_area, $etapa, $aniod, $id_ante_unob_seguimiento));
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    } else {
        echo "No habia fodas: A01B001R";
    }
    echo "El formato 01b se exporto correctamente<br>";



    // Actividades /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $sentenciaAc = "SELECT *, a.id_actividad as id_actividad 
    FROM actividades a 
    JOIN programaciones p ON p.id_actividad = a.id_actividad 
    LEFT JOIN lineasactividades la ON la.id_actividad = a.id_actividad 
    WHERE a.anio = $anio
    GROUP BY a.id_actividad
    ";
    $stm = $con->query($sentenciaAc);
    $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);

    // Las recorreremos en las Areas y las metemos en ante_areas.
    if ($actividades) {
        foreach ($actividades as $a) {
            $id_actividad_seguimiento = $a['id_actividad'];
            $codigo_actividad = $a['codigo_actividad'];
            $nombre_actividad = $a['nombre_actividad'];
            $unidad = $a['unidad'];
            $id_unidad = $a['id_unidad'];
            $programado_anual_anterior = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
            $alcanzado_anual_anterior = traeAvances($con, $a['id_actividad']);
            $id_area = traeArea($con, $a['id_area']);
            $id_validacion = $_SESSION['id_usuario'];
            $validado = 1;
            $etapa = 1;

            $sql = "INSERT INTO ante_actividades (codigo_actividad, nombre_actividad, unidad, id_unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado, anio, etapa, id_actividad_seguimiento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            try {
                $sqlr->execute(array($codigo_actividad, $nombre_actividad, $unidad, $id_unidad, $programado_anual_anterior, $alcanzado_anual_anterior, $id_area, $id_validacion, $validado, $aniod, $etapa, $id_actividad_seguimiento));
            } catch (Throwable $th) {
                throw $th;
            }


            $enero = $a['enero'];
            $febrero = $a['febrero'];
            $marzo = $a['marzo'];
            $abril = $a['abril'];
            $mayo = $a['mayo'];
            $junio = $a['junio'];
            $julio = $a['julio'];
            $agosto = $a['agosto'];
            $septiembre = $a['septiembre'];
            $octubre = $a['octubre'];
            $noviembre = $a['noviembre'];
            $diciembre = $a['diciembre'];
            $etapa = 1;
            $n_id_actividad = $con->lastInsertId();
            $sql = "INSERT INTO ante_programaciones (enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, etapa, id_actividad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            try {
                $sqlr->execute(array($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $septiembre, $octubre, $noviembre, $diciembre, $etapa, $n_id_actividad));
            } catch (Throwable $th) {
                throw $th;
            }

            if ($a['lineaactividad']) {
                $id_linea = $a['id_linea'];
                $udmed = $a['udmed'];
                $sqllin = "INSERT INTO ante_lineasactividades (id_actividad, id_linea, udmed, anio, etapa) VALUES (?,?,?,?,?)";
                $sqllinr = $con->prepare($sqllin);
                try {
                    $sqllinr->execute(array($n_id_actividad, $id_linea, $udmed, $aniod, $etapa));
                } catch (Throwable $th) {
                    throw $th;
                }
            }
        }
    } else {
        echo "Algo no salio bien, contactar al administrador Error: AC001TS";
        die();
    }
    echo "Las Actividades se exportaron correctamente<br>";




    // Indicadores Uso /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Luego los Indicadores
    $stm = $con->query("SELECT * FROM indicadores_uso WHERE anio = $anio");
    $indicadores_uso = $stm->fetchAll(PDO::FETCH_ASSOC);

    // Las recorreremos en las Areas y las metemos en ante_areas.
    if ($indicadores_uso) {
        foreach ($indicadores_uso as $i) {
            $id_indicador_gaceta = $i['id_indicador_gaceta'];
            $id_dep_general = $i['id_dep_general'];
            $id_dep_aux = $i['id_dep_aux'];
            $id_proyecto = $i['id_proyecto'];
            $tipo_op_a = $i['tipo_op_a'];
            $tipo_op_b = $i['tipo_op_b'];
            $tipo_op_c = $i['tipo_op_c'];
            $umedida_a = $i['umedida_a'];
            $umedida_b = $i['umedida_b'];
            $umedida_c = $i['umedida_c'];
            $interpretacion = $i['interpretacion'];
            $dimension = $i['dimension'];
            $factor_de_comparacion = $i['factor_de_comparacion'];
            $desc_factor_de_comparacion = $i['desc_factor_de_comparacion'];
            $linea_base = $i['linea_base'];
            $medios_de_verificacion = $i['medios_de_verificacion'];
            $desc_meta_anual = $i['desc_meta_anual'];
            $at1 = $i['at1'];
            $at2 = $i['at2'];
            $at3 = $i['at3'];
            $at4 = $i['at4'];
            $bt1 = $i['bt1'];
            $bt2 = $i['bt2'];
            $bt3 = $i['bt3'];
            $bt4 = $i['bt4'];
            $ct1 = $i['ct1'];
            $ct2 = $i['ct2'];
            $ct3 = $i['ct3'];
            $ct4 = $i['ct4'];
            $validado = 1;
            $id_dependencia = $i['id_dependencia'];
            $id_area = traeArea($con, $i['id_area']);

            $sql = "INSERT INTO ante_indicadores_uso (id_indicador_gaceta, anio, id_dep_general, id_dep_aux, id_proyecto, tipo_op_a, tipo_op_b, tipo_op_c, umedida_a, umedida_b, umedida_c, interpretacion, dimension, factor_de_comparacion, desc_factor_de_comparacion, linea_base, medios_de_verificacion, desc_meta_anual, at1, at2, at3, at4, bt1, bt2, bt3, bt4, ct1, ct2, ct3, ct4, validado, id_dependencia, id_area) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $sqlr = $con->prepare($sql);
            try {
                $sqlr->execute(array($id_indicador_gaceta, $aniod, $id_dep_general, $id_dep_aux, $id_proyecto, $tipo_op_a, $tipo_op_b, $tipo_op_c, $umedida_a, $umedida_b, $umedida_c, $interpretacion, $dimension, $factor_de_comparacion, $desc_factor_de_comparacion, $linea_base, $medios_de_verificacion, $desc_meta_anual, $at1, $at2, $at3, $at4, $bt1, $bt2, $bt3, $bt4, $ct1, $ct2, $ct3, $ct4, $validado, $id_dependencia, $id_area));
            } catch (Throwable $th) {
                throw $th;
            }
        }
    } else {
        echo "Algo no salio bien, contactar al administrador Error: IDU0348JA";
        die();
    }
    echo "Los indicadores se exportaron correctamente<br>";
    ?>
    <a href="../index.php" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Finalizar</a>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>