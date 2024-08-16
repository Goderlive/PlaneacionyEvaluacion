<?php session_start();
require_once 'models/inicio_modelo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exporta Programa Anual</title>
</head>


<?php


$anioobjetivo = $_SESSION['anio'] + 1;

function Verificador($con, $anioobjetivo)
{
    $stm = $con->query("
    SELECT 
        CASE 
            WHEN 
                EXISTS (SELECT 1 FROM dependencias WHERE anio = $anioobjetivo) AND 
                EXISTS (SELECT 1 FROM areas WHERE anio = $anioobjetivo) AND
                EXISTS (SELECT 1 FROM areas WHERE anio = $anioobjetivo)
            THEN true
            ELSE false
        END AS registros_existentes
");
    $existenDependencias = $stm->fetchColumn();
    if ($existenDependencias) {
        return true;
    } else {
        return false;
    }
    
}

function CreaDependencias($con, $anioobjetivo)
{
    $sql_dependencias = "INSERT INTO dependencias (nombre_dependencia, id_dependencia_gen, anio, tipo, id_administrador, id_seguimiento_dependencia) 
    SELECT nombre_dependencia, id_dependencia_gen, anio, tipo, id_administrador, id_seguimiento_dependencia 
    FROM ante_dependencias
    WHERE anio = $anioobjetivo";
    $agrega_dependencias = $con->prepare($sql_dependencias);
    if ($agrega_dependencias->execute()) {
        return true;
    } else {
        return false;
    }
}

function CreaAreas($con, $anioobjetivo)
{
    $sentencia = "SELECT * FROM ante_areas a 
    LEFT JOIN dependencias d ON  d.id_seguimiento_dependencia = a.id_dependencia
    WHERE a.anio = $anioobjetivo";
    $stm = $con->query($sentencia);
    $ante_areas = $stm->fetchAll(PDO::FETCH_ASSOC);

    $errores = 0;
    foreach ($ante_areas as $a) {
        $narea = $a['nombre_area'];
        $id_dependencia = $a['id_dependencia'];
        $id_dependencia_g = $a['id_dependencia_general'];
        $id_dependencia_a = $a['id_dependencia_aux'];
        $id_proyecto = $a['id_proyecto'];
        $anio = $a['anio'];
        $id_seguimiento_area = $a['id_seguimiento_area'];
        $active = 1;

        $sql_areas = "INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, anio, id_seguimiento_area, active)
        VALUES (?,?,?,?,?,?,?,?)";
        $agrega_areas = $con->prepare($sql_areas);
        if (!$agrega_areas->execute(array($narea, $id_dependencia, $id_dependencia_g, $id_dependencia_a, $id_proyecto, $anio, $id_seguimiento_area, $active))) {
            $errores += 1;
        }
    }
    if ($errores > 0) {
        return $errores;
    } else {
        return false;
    }
}

function transfiereActividades($con, $anioobjetivo)
{
    $sentencia = "SELECT * FROM ante_actividades ac 
    LEFT JOIN areas ar ON ar.id_seguimiento_area = ac.id_area
    LEFT JOIN ante_programaciones p ON p.id_actividad = ac.id_actividad 
    WHERE ac.anio = $anioobjetivo";
    $stm = $con->query($sentencia);
    $ante_actividades = $stm->fetchAll(PDO::FETCH_ASSOC);

    $errores = 0;

    foreach ($ante_actividades as $a) {
        $codigo_actividad = $a['codigo_actividad'];
        $nombre_actividad = $a['nombre_actividad'];
        $id_unidad = $a['id_unidad'];
        $programado_anual_anterior = $a['programado_anual_anterior'];
        $alcanzado_anual_anterior = $a['alcanzado_anual_anterior'];
        $id_area = $a['id_area'];
        $id_validacion = $a['id_validacion'];
        $validado = $a['validado'];
        $creacion = $a['creacion'];
        $id_creacion = $a['id_creacion'];
        $anio = $a['anio'];
        $id_actividad_seguimiento = $a['id_actividad_seguimiento'];


        $sql_areas = "INSERT INTO actividades (codigo_actividad, nombre_actividad, id_unidad, programado_anual_anterior, alcanzado_anual_anterior, id_area, id_validacion, validado, creacion, id_creacion, anio, id_actividad_seguimiento)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $agrega_areas = $con->prepare($sql_areas);
        if (!$agrega_areas->execute(array($codigo_actividad, $nombre_actividad, $id_unidad, $programado_anual_anterior, $alcanzado_anual_anterior, $id_area, $id_validacion, $validado, $creacion, $id_creacion, $anio, $id_actividad_seguimiento))) {
            $errores += 1;
        }

        $id = $con->lastInsertId();

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

        $sql_areas = "INSERT INTO programaciones (enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, id_actividad)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $agrega_areas = $con->prepare($sql_areas);
        try {
            $agrega_areas->execute(array($enero, $febrero, $marzo, $abril, $mayo, $junio, $julio, $agosto, $septiembre, $octubre, $noviembre, $diciembre, $id));
        } catch (Throwable $th) {
            print $th;
        }
    }
    if ($errores > 0) {
        return $errores;
    } else {
        return false;
    }
}

function transfiereLineas($con, $anioobjetivo)
{
    $sentencia = "SELECT a.id_actividad, la.id_linea, la.udmed, la.anio FROM ante_lineasactividades la
    LEFT JOIN actividades a ON a.id_actividad_seguimiento = la.id_actividad";
    $stm = $con->query($sentencia);
    $ante = $stm->fetchAll(PDO::FETCH_ASSOC);
    $errores = 0;

    foreach ($ante as $a) {
        if ($a['id_actividad']) {
            $id_actividad = $a['id_actividad'];
            $id_linea = $a['id_linea'];
            $udmed = $a['udmed'];
            $anio = $a['anio'];

            $sql_lineas = "INSERT INTO lineasactividades (id_actividad, id_linea, udmed, anio)
            VALUES (?,?,?,?)";
            $agregalineas = $con->prepare($sql_lineas);
            if (!$agregalineas->execute(array($id_actividad, $id_linea, $udmed, $anio))) {
                $errores += 1;
            }
        }
    }
    if ($errores > 0) {
        return $errores;
    } else {
        return false;
    }
}

function transfierePermisos($con, $anioobjetivo)
{
    $anio_actual = $_SESSION['anio'];
    try {
        $sentencia = "SELECT * FROM usuarios u
        JOIN permisos p ON p.id_usuario = u.id_usuario
        WHERE p.anio = $anio_actual";
        $stm = $con->prepare($sentencia);
        $stm->execute();
        $usuarios = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usuarios as $u) {

            $id_usuario = $u['id_usuario'];
            $id_dependencia = ($u['id_dependencia'] != NULL) ? $u['id_dependencia'] : NULL;
            $id_area = ($u['id_area'] != NULL) ? $u['id_area'] : NULL;
            $rol = ($u['rol']) ? $u['rol'] : NULL;
            $nivel = $u['nivel'];
            $anio = $anioobjetivo;

            if ($id_dependencia) {
                $sentencia = "SELECT * FROM dependencias
                WHERE id_seguimiento_dependencia = ?";
                $stm = $con->prepare($sentencia);
                $stm->execute(array($id_dependencia));
                $id_dependencia = $stm->fetch(PDO::FETCH_ASSOC);
                $id_dependencia = $id_dependencia['id_dependencia'];
            }
            if ($id_area) {
                $sentencia = "SELECT id_area FROM areas
                WHERE id_seguimiento_area = ?";
                $stm = $con->prepare($sentencia);
                $stm->execute(array($id_area));
                $id_area = $stm->fetch(PDO::FETCH_ASSOC);
                $id_area = $id_area['id_area'];
            }


            $sql_areas = "INSERT INTO permisos (id_usuario, id_dependencia, id_area, nivel, rol, anio)
            VALUES (?,?,?,?,?,?)";
            $agrega_permisos = $con->prepare($sql_areas);
            $agrega_permisos->execute(array($id_usuario, $id_dependencia, $id_area, $nivel, $rol, $anio));
        }
        return true;
    } catch (Exception $e) {
        // Aquí manejas el error, por ejemplo, registrando el error en un archivo de log o enviando un mensaje de error.
        error_log($e->getMessage()); // Ejemplo de registro de error.
        print $e;
    }
}


function transfiereIndicadores($con, $anioobjetivo)
{
    $sentencia = "SELECT * FROM ante_indicadores_uso ai
    LEFT JOIN dependencias d ON d.id_seguimiento_dependencia = ai.id_dependencia
    LEFT JOIN areas a ON a.id_seguimiento_area = ai.id_area 
    WHERE ai.anio = $anioobjetivo";
    $stm = $con->query($sentencia);
    $ante_indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm = $con->query("SELECT * FROM indicadores WHERE anio = '2024'");
    $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);


    foreach ($ante_indicadores as $a) {


        $nombre_ante = mb_strtolower($a['nombre_indicador']);
        $nombre_ante = rtrim($nombre_ante, '.');
        $find = 0;

        foreach ($indicadores as $i) {
            $nombre_indicador = mb_strtolower($i['nombre']);
            $nombre_indicador = rtrim($nombre_indicador, '.');

            similar_text($nombre_ante, $nombre_indicador, $percent_nombre);

            if ($percent_nombre > 90) {
                $find = $i;
                break; // Rompe el bucle si encuentra una coincidencia
            }
        }

        if ($find != 0) {

            $id_indicador = $find['id_indicador'];
            $anio = $a['anio'];
            $id_dep_general = $a['id_dep_general'];
            $id_dep_aux = $a['id_dep_aux'];
            $id_proyecto = $a['id_proyecto'];
            $tipo_op_a = $a['tipo_op_a'];
            $tipo_op_b = $a['tipo_op_b'];
            $tipo_op_c = $a['tipo_op_c'];
            $umedida_a = $a['umedida_a'];
            $umedida_b = $a['umedida_b'];
            $umedida_c = $a['umedida_c'];
            $interpretacion = $a['interpretacion'];
            $factor_de_comparacion = $a['factor_de_comparacion'];
            $desc_factor_de_comparacion = $a['desc_factor_de_comparacion'];
            $linea_base = $a['linea_base'];
            $medios_de_verificacion = $a['medios_de_verificacion'];
            $at1 = $a['at1'];
            $at2 = $a['at2'];
            $at3 = $a['at3'];
            $at4 = $a['at4'];
            $bt1 = $a['bt1'];
            $bt2 = $a['bt2'];
            $bt3 = $a['bt3'];
            $bt4 = $a['bt4'];
            $ct1 = $a['ct1'];
            $ct2 = $a['ct2'];
            $ct3 = $a['ct3'];
            $ct4 = $a['ct4'];
            $id_dependencia = $a['id_dependencia'];
            $id_area = $a['id_area'];
            $fecha_alta = $a['fecha_alta'];
            $id_alta = $a['id_alta'];


            $sql_indicadores = "INSERT INTO indicadores_uso (id_indicador_gaceta, anio, id_dep_general, id_dep_aux, id_proyecto, tipo_op_a, tipo_op_b, tipo_op_c, umedida_a, umedida_b, umedida_c, interpretacion, factor_de_comparacion, desc_factor_de_comparacion, linea_base, medios_de_verificacion, at1, at2, at3, at4, bt1, bt2, bt3, bt4, ct1, ct2, ct3, ct4, id_dependencia, id_area, fecha_alta, id_alta)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $agrega_indicadores = $con->prepare($sql_indicadores);
            $agrega_indicadores->execute(array($id_indicador, $anio, $id_dep_general, $id_dep_aux, $id_proyecto, $tipo_op_a, $tipo_op_b, $tipo_op_c, $umedida_a, $umedida_b, $umedida_c, $interpretacion, $factor_de_comparacion, $desc_factor_de_comparacion, $linea_base, $medios_de_verificacion, $at1, $at2, $at3, $at4, $bt1, $bt2, $bt3, $bt4, $ct1, $ct2, $ct3, $ct4, $id_dependencia, $id_area, $fecha_alta, $id_alta));
        } else {
            print "No se agrego el indicador" . $a['nombre_indicador'];
        }
    }
}



?>





<body>
    <div class="ml-5">
        <?php if (isset($_POST['export_programa_anual'])) : ?>
            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400 mt-5">

                <!-- Lo primero que todo es verificar que no exista nada previo del año anterior -->
                <?php if (Verificador($con, $anioobjetivo) == true): ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>No se cumplen con los requisitos</span>
                        <span>Por favor contacte al administrador</span>
                    </li>
                    <?php die(); ?>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Se cumplen con los requisitos</span>
                    </li>
                <?php endif ?>


                <!-- Si no murio en el anterior, continuamos con la creacion de dependencias -->
                <?php if (CreaDependencias($con, $anioobjetivo)) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Se han creado las dependencias</span>
                    </li>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>No se crearon las dependencias, contacte a su proveedor</span>
                    </li>
                    <?php die(); ?>
                <?php endif ?>

                <!-- Si no murio en el anterior, continuamos con la creacion de las Areas -->
                <?php if ($total = CreaAreas($con, $anioobjetivo) > 0) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>Error al crear las Areas, contacte al proveedor: <?= $total ?> errores</span>
                    </li>
                    <?php die(); ?>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Areas Creadas</span>
                    </li>
                <?php endif ?>

                <!-- Si no murio en el anterior, continuamos con la creacion de las Actividades -->
                <?php if ($total = transfiereActividades($con, $anioobjetivo)) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>Error al crear Actividades, contacte al proveedor: <?= $total ?> errores</span>
                    </li>
                    <?php die(); ?>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Actividades Creadas exitosamente</span>
                    </li>
                <?php endif ?>


                <!-- Si no murio en el anterior, continuamos con las Lineas de Acción -->
                <?php if ($total = transfiereLineas($con, $anioobjetivo)) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>Error al crear Lineas de Acción, contacte al proveedor: <?= $total ?> errores</span>
                    </li>
                    <?php die(); ?>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Lineas de Acción Creadas exitosamente</span>
                    </li>
                <?php endif ?>


                <!-- Si no murio en el anterior, continuamos con las Lineas de Acción -->
                <?php if ($total = transfiereIndicadores($con, $anioobjetivo)) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>Error al crear Lineas de Acción, contacte al proveedor: <?= $total ?> errores</span>
                    </li>
                    <?php die(); ?>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Lineas de Acción Creadas exitosamente</span>
                    </li>
                <?php endif ?>


                <!-- Si no murio en el anterior, continuamos con la creacion de los Permisos -->
                <?php if (transfierePermisos($con, $anioobjetivo)) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Indicadores actualizados exitosamente</span>
                    </li>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>Error al crear los Indicadores, contacte al proveedor: <?= $total ?> errores</span>
                    </li>
                    <?php die(); ?>
                <?php endif ?>




            </ul>
        <?php endif ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>