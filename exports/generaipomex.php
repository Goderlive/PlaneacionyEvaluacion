<?php
require_once '../models/conection.php';
mb_internal_encoding('UTF-8');

function limpiarDatos($lineas)
{
    $lineas = explode("\n", $lineas);
    $datosLimpios = [];
    foreach ($lineas as $linea) {
        // Verificar si la línea está vacía o si es solo espacios en blanco
        if (trim($linea) !== '') {
            // Eliminar comillas y dividir la línea en elementos
            if (strpos($linea, ">")) {
                $elementos = explode(">", $linea);
                $elementosLimpios = array_map('trim', $elementos);  // Limpia espacios antes y después
            } else {
                $elementosLimpios = [trim($linea)];  // Limpia espacios antes y después y lo convierte en array
            }
            // Agrega los elementos limpios y la línea original al mismo sub-array
            $elementosLimpios[] = trim($linea);  // Agrega la línea original al final del array de elementos limpios
            $datosLimpios[] = $elementosLimpios;  // Guarda el array limpio junto con la línea original
        }
    }
    return $datosLimpios;
}


function traeIndicador($con, $id_dependencia)
{
    $sentencia = "SELECT * FROM indicadores_uso iu 
    LEFT JOIN indicadores i ON i.id_indicador = iu.id_indicador_gaceta
    WHERE iu.anio = '2024' AND iu.id_dependencia = $id_dependencia
    ";
    $stm = $con->query($sentencia);
    $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $indicadores;
}

function fraccion4($con, $areas_ipo, $unidades_ipo, $trimestre)
{
    $sentencia = "SELECT * FROM programas_presupuestarios pp
    LEFT JOIN proyectos py ON py.id_programa = pp.id_programa
    JOIN indicadores_uso iu ON iu.id_proyecto = py.id_proyecto
    JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
    WHERE dp.anio = 2024 AND dp.tipo = 1
    GROUP BY pp.id_programa
    ";
    $stm = $con->query($sentencia);
    $programas = $stm->fetchAll(PDO::FETCH_ASSOC);


    $areasipomex = limpiarDatos($areas_ipo);
    $unidadesIPONEX = limpiarDatos($unidades_ipo);


    $contador = 1;
    foreach ($programas as $p) {
        $find = 0;
        $nombre_area = $p['nombre_dependencia'];
        $super_porcentaje_areas = 90;
        $foundar = 0;

        foreach ($areasipomex as $ar) { // Nos vincula las areas dadas de alta en el ipomex con las areas del simonts
            similar_text(mb_strtoupper($ar[1]), mb_strtoupper($nombre_area), $porcentaje);
            if ($porcentaje > $super_porcentaje_areas) {
                $super_porcentaje_areas = $porcentaje;
                $foundar = $ar;
            }
        }

        $notas = "";

        if ($foundar != 0) { // Si encontramos el area podemos continuar con lo demas 
            $id_dependencia = $p['id_dependencia'];
            $indicadores = traeIndicador($con, $id_dependencia);
            foreach ($indicadores as $i) {
                $id_ind = $i['id'];

                $stm = $con->query("SELECT * FROM indicadores_actividades WHERE id_indicador_uso = $id_ind");
                $actividades = $stm->fetchAll(PDO::FETCH_ASSOC);

                if ($actividades) {
                    foreach ($actividades as $ac) {
                        $id_actividad = $ac['id_actividad_actividades'];
                        $stm = $con->query("SELECT * FROM actividades a JOIN unidades_medida u ON a.id_unidad = u.id_unidad WHERE id_actividad = $id_actividad");
                        $actividad = $stm->fetch(PDO::FETCH_ASSOC);
                        $principal =  $contador . "|" . "2024" . "|" . "1° Anual" . "|" . $foundar[1] . "|" . $p['descripcion'] . "||" . "36555> DIRECCIÓN DE GOBIERNO POR RESULTADOS>2024>1" . "|" . $notas . "|";
                        print $principal . "|" . $contador . "|" . $i['nombre'] . "|" . $actividad['nombre_actividad'] . "|" . $actividad['nombre_unidad'] . "<br>";
                    }
                } else {
                    $notas = "Se coloca el N/A en el criterio de avance de la meta ya que el área responsable no vinculó Metas a este indicador, sin embargo contiene metas relacionadas que ayudan a su cumplimiento";
                    $principal =  $contador . "|" . "2024" . "|" . "1° Anual" . "|" . $foundar[1] . "|" . $p['descripcion'] . "||" . "36555> DIRECCIÓN DE GOBIERNO POR RESULTADOS>2024>1" . "|" . $notas . "|";
                    print $principal . "|" . $contador . '|' . $i['nombre'] . "|N/A|N/A<br>";
                }
            }
        } else {
            print $p['nombre_dependencia'] . "N////////////////<br>";
        }
        $contador += 1;
    }
}






function fraccion5($con, $areas_ipo, $indicadores_ipo, $unidades_ipo, $trimestre)
{
    $sentencia = "SELECT 
    *, 
        SUM(CASE WHEN ai.trimestre = 1 THEN ai.avance_a ELSE 0 END) + 
        SUM(CASE WHEN ai.trimestre = 2 THEN ai.avance_a ELSE 0 END) +
        SUM(CASE WHEN ai.trimestre = 3 THEN ai.avance_a ELSE 0 END) +
        SUM(CASE WHEN ai.trimestre = 4 THEN ai.avance_a ELSE 0 END) 
    AS total_avance_a,
        SUM(CASE WHEN ai.trimestre = 1 THEN ai.avance_b ELSE 0 END) + 
        SUM(CASE WHEN ai.trimestre = 2 THEN ai.avance_b ELSE 0 END) +
        SUM(CASE WHEN ai.trimestre = 3 THEN ai.avance_b ELSE 0 END) +
        SUM(CASE WHEN ai.trimestre = 4 THEN ai.avance_b ELSE 0 END) 
    AS total_avance_b
    FROM indicadores_uso iu
    LEFT JOIN avances_indicadores ai ON ai.id_indicador = iu.id AND ai.trimestre IN (1, 2, 3, 4)
    LEFT JOIN indicadores id ON id.id_indicador = iu.id_indicador_gaceta
    LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    LEFT JOIN areas ar ON ar.id_area = iu.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
    WHERE dp.anio = 2024 AND dp.tipo = 1 
    GROUP BY iu.id
    ";
    $stm = $con->query($sentencia);
    $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);

    $areasipomex = limpiarDatos($areas_ipo);
    $indicadoresIPOMEX = limpiarDatos($indicadores_ipo);
    $unidadesIPONEX = limpiarDatos($unidades_ipo);

    $contador_principal = 1;
    foreach ($indicadores as $i) {

        // encontrados para cada uno
        $foundar = 0;
        $foundin = 0;
        $founduna = 0;
        $foundunb = 0;

        // Porcentajes de busqueda cada uno
        $super_porcentaje_areas = 90;
        $super_porcentaje_indicadores = 90;
        $super_porcentaje_unidadesa = 90;
        $super_porcentaje_unidadesb = 90;


        $nombre_dependencia = $i['nombre_dependencia'];
        $nombre_indicador = $i['nombre'];
        $nombre_unidada = $i['umedida_a'];
        $nombre_unidadb = $i['umedida_b'];

        foreach ($areasipomex as $ar) { // Buscamos por AREAS
            similar_text(mb_strtoupper($ar[1]), mb_strtoupper($nombre_dependencia), $porcentaje);
            if ($porcentaje > $super_porcentaje_areas) {
                $super_porcentaje_areas = $porcentaje;
                $foundar = $ar;
            }
        }
        if ($foundar == 0) {
            $foundar = "////////////////////////";
        }

        $porcentaje = 0;
        foreach ($indicadoresIPOMEX as $inpo) { // Buscamos por NOMBRE INDICADOR
            similar_text(mb_strtoupper($inpo[0]), mb_strtoupper($nombre_indicador), $porcentaje);
            $porcentaje;
            if ($porcentaje > $super_porcentaje_indicadores) {
                $super_porcentaje_indicadores = $porcentaje;
                $foundin = $inpo;
            }
        }
        if ($foundin == 0) {
            $foundin = "No aplica";
        }

        $porcentaje = 0;
        foreach ($unidadesIPONEX as $unpoba) { // Buscamos la unidad de Medida de A
            similar_text(mb_strtoupper($unpoba[0]), mb_strtoupper($nombre_unidada), $porcentaje);
            if ($porcentaje > $super_porcentaje_unidadesa) {
                $super_porcentaje_unidadesa = $porcentaje;
                $founduna = $unpoba;
            }
        }
        if ($founduna == 0) {
            $founduna = array("No aplica");
        }

        $porcentaje = 0;
        foreach ($unidadesIPONEX as $unpob) { // Buscamos la unidad de Medida de B
            similar_text(mb_strtoupper($unpob[0]), mb_strtoupper($nombre_unidadb), $porcentaje);
            if ($porcentaje > $super_porcentaje_unidadesb) {
                $super_porcentaje_unidadesb = $porcentaje;
                $foundunb = $unpob;
            }
        }
        if ($foundunb == 0) {
            $foundunb = array("No aplica");
        }


        if ($i['frecuencia'] == "Trimestral") {
            $frecuencia = "Trimestre";
        } elseif ($i['frecuencia'] == "Semestral") {
            $frecuencia = "Semestre";
        } elseif ($i['frecuencia'] == "Mensual") {
            $frecuencia = "Mes";
        } else {
            $frecuencia = "Anual";
        }

        $nota = '';
        if ($founduna[0] == "No aplica") {
            $nota .= 'Se elige en Unidad de Medida “No aplica” derivado de las limitaciones en el catalogo preestablecido. Pero informamos que para la variable A la unidad de medida es “' . $nombre_unidada . '”. Mientras que para la variable B es “' . $nombre_unidadb . '”';
        } else {
            $nota = 'Sin información adicional';
        }

        if ($i['tipo_op_a'] == 'Constante') {
            // Encuentra el primer valor no vacío de los campos at1, at2, at3, at4
            $prog_anual_a = $i['at1'] ?: $i['at2'] ?: $i['at3'] ?: $i['at4'];
        } else {
            // Suma los valores de los cuatro campos
            $prog_anual_a = $i['at1'] + $i['at2'] + $i['at3'] + $i['at4'];
        }
        if ($i['tipo_op_b'] == 'Constante') {
            // Encuentra el primer valor no vacío de los campos at1, at2, at3, at4
            $prog_anual_a = $i['bt1'] ?: $i['bt2'] ?: $i['bt3'] ?: $i['bt4'];
        } else {
            // Suma los valores de los cuatro campos
            $prog_anual_a = $i['bt1'] + $i['bt2'] + $i['bt3'] + $i['bt4'];
        }


        $prog_anual_b = $i['bt1'] + $i['bt2'] + $i['bt3'] + $i['bt4'];

        $id_indicador = $i['id'];
        // Aqui vamos a verificar si existe una reconduccion, y la vamos a citar 
        $stm = $con->query("SELECT * FROM reconducciones_indicadores WHERE id_indicador = $id_indicador ORDER BY id_reconduccion_indicadores DESC");
        if ($reconducciones = $stm->fetch(PDO::FETCH_ASSOC)) {
            $prog_inicial_a = explode("|", $reconducciones['programacion_inicial_a']);
            $prog_inicial_b = explode("|", $reconducciones['programacion_inicial_b']);

            $prog_modificada_a = explode("|", $reconducciones['programacion_modificada_a']);
            $prog_modificada_b = explode("|", $reconducciones['programacion_modificada_b']);

            $suma_inicial_a = $prog_inicial_a[0] + $prog_inicial_a[1] + $prog_inicial_a[2] + $prog_inicial_a[3];
            $suma_inicial_b = $prog_inicial_b[0] + $prog_inicial_b[1] + $prog_inicial_b[2] + $prog_inicial_b[3];

            $anual_modificado_a = $prog_modificada_a[0] + $prog_modificada_a[1] + $prog_modificada_a[2] + $prog_modificada_a[3];
            $anual_modificado_b = $prog_modificada_b[0] + $prog_modificada_b[1] + $prog_modificada_b[2] + $prog_modificada_b[3];

            if ($prog_anual_a == $suma_inicial_a) {
                $anual_modificado_a = 0;
            } else {
                $anual_modificado_a = $anual_modificado_a;
            }

            if ($prog_anual_b == $suma_inicial_b) {
                $anual_modificado_a = 0;
            } else {
                $anual_modificado_a = $anual_modificado_b;
            }

            $prog_anual_a = $suma_inicial_a;
            $prog_anual_b = $suma_inicial_b;

        } else {
            $anual_modificado_a = 0;
            $anual_modificado_b = 0;
        }




        $general = $contador_principal . '|2024|2° Trimestre|' .
            $foundar[4] . '|' .
            $i['objetivo_pp'] . '|' .
            $foundin[1] . '|' .
            "Eficacia" . "|" .
            $i['interpretacion'] . '|' .
            $i['formula'] . '|' .
            $frecuencia . '|' .
            "Ascendente" . '|' .
            $i['medios_verificacion'] . '|' .
            "36555> DIRECCIÓN DE GOBIERNO POR RESULTADOS>2024>1" . "|" .
            $nota . "|" .
            $contador_principal;

        print $general . "|" . $founduna[0] . "|" . $i['linea_base'] . "|" . $prog_anual_a . "|" . $anual_modificado_a . "|" . $i['total_avance_a'] . "<br>";
        print $general . "|" . $foundunb[0] . "|" . $i['linea_base'] . "|" . $prog_anual_b . "|" . $anual_modificado_b . "|" . $i['total_avance_b'] . "<br>";
        $anual_modificado_a = 0;
        $anual_modificado_b = 0;
        $contador_principal += 1;
    }
}



function fraccion6($con, $areas_ipo)
{
    $sentencia = "SELECT * FROM indicadores_uso iu
    JOIN indicadores id ON id.id_indicador = iu.id_indicador_gaceta
    LEFT JOIN proyectos py ON py.id_proyecto = iu.id_proyecto
    LEFT JOIN programas_presupuestarios pp ON pp.id_programa = py.id_programa
    LEFT JOIN areas ar ON ar.id_area = iu.id_area
    LEFT JOIN dependencias dp ON dp.id_dependencia = iu.id_dependencia
    WHERE dp.anio = 2024 AND dp.tipo = 1
    ";
    $stm = $con->query($sentencia);
    $indicadores = $stm->fetchAll(PDO::FETCH_ASSOC);

    $areasipomex = limpiarDatos($areas_ipo);
    $contador = 1;
    foreach ($indicadores as $i) {
        $found = 0;
        $super_porcentaje = 10;
        $nombre_dependencia = $i['nombre_dependencia'];
        foreach ($areasipomex as $ar) {
            similar_text(mb_strtoupper($ar[1]), mb_strtoupper($nombre_dependencia), $porcentaje);
            if ($porcentaje > $super_porcentaje) {
                $super_porcentaje = $porcentaje;
                $found = $ar;
            }
        }
        print $contador . '|2024|1° Trimestre|' .
            $found[1] . '|' .
            $i['nombre_programa'] . '|' .
            $i['objetivo_pp'] . '|' .
            $i['nombre'] . '|' .
            "Eficacia" . "|" .
            $i['interpretacion'] . '|' .
            $i['formula'] . '|' .
            "Ascendente" . '|' .
            $i['frecuencia'] . '|' .
            $i['medios_verificacion'] . '|' .
            "36555> DIRECCIÓN DE GOBIERNO POR RESULTADOS>2024>1"
            . '<br>';
    }
    $contador += 1;
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Generar Archivos IPOMEX</title>
</head>

<body>


    <?php if (!$_GET) : ?>
        <div class="mx-4 my-4 max-w-sm">
            <form action="" method="get">
                <label for="fraccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la Fracción</label>
                <select id="fraccion" name="fraccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="4">IV </option>
                    <option value="5a">VA</option>
                    <option value="6a">VIA</option>
                </select>
                <br>
                <input type="submit" value="Continuar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            </form>
        </div>
    <?php endif ?>




    <?php if (isset($_GET['fraccion']) && $_GET['fraccion'] == "4") : ?>
        <p>Copia el contenido de las hojas del documento de Excel</p>
        <p>Esto se logra dando click derecho en una hoja y presionando "MOSTRAR", seleccionas todas las hojas y aceptar</p>
        <form action="" method="post">
            <div class="mx-4 my-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="max-w">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoja IdArt92FIIA (Areas)</label>
                    <textarea id="message" name="areas" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pega el contenido de la primer columna SIN el titulo"></textarea>
                </div>
                <div class="max-w">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoja IdUnidadMedida (Unidades de Medida)</label>
                    <textarea id="message" name="unidades" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pega el contenido de la primer columna SIN el titulo"></textarea>
                </div>
            </div>
            <label for="trimestre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la Fracción</label>
            <select id="trimestre" name="trimestre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">1er Trimestre</option>
                <option value="2">2do Trimestre</option>
                <option value="3">3er Trimestre</option>
                <option value="4">4to Trimestre</option>
            </select>
            <br>
            <input type="submit" value="Continuar" name="4" class="mx-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
    <?php endif ?>




    <?php if (isset($_GET['fraccion']) && $_GET['fraccion'] == "5a") : ?>
        <p>Copia el contenido de las hojas del documento de Excel</p>
        <p>Esto se logra dando click derecho en una hoja y presionando "MOSTRAR", seleccionas todas las hojas y aceptar</p>
        <form action="" method="post">
            <div class="mx-4 my-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="max-w">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoja IdArt92FIIA (Areas)</label>
                    <textarea id="message" name="areas" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pega el contenido de la primer columna SIN el titulo"></textarea>
                </div>
                <div class="max-w">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoja IdTipoIndicador (Indicadores)</label>
                    <textarea id="message" name="indicadores" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pega el contenido de la primer columna SIN el titulo"></textarea>
                </div>
                <div class="max-w">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoja IdUnidadMedida (Unidades de Medida)</label>
                    <textarea id="message" name="unidades" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pega el contenido de la primer columna SIN el titulo"></textarea>
                </div>
            </div>
            <label for="trimestre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la Fracción</label>
            <select id="trimestre" name="trimestre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">1er Trimestre</option>
                <option value="2">2do Trimestre</option>
                <option value="3">3er Trimestre</option>
                <option value="4">4to Trimestre</option>
            </select>
            <br>
            <input type="submit" value="Continuar" name="5a" class="mx-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
    <?php endif ?>



    <?php if (isset($_GET['fraccion']) && $_GET['fraccion'] == "6a") : ?>
        <p>Copia el contenido de las hojas del documento de Excel</p>
        <p>Esto se logra dando click derecho en una hoja y presionando "MOSTRAR", seleccionas todas las hojas y aceptar</p>
        <form action="" method="post">
            <div class="mx-4 my-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="max-w">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoja IdArt92FIIA (Areas)</label>
                    <textarea id="message" name="areas" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pega el contenido de la primer columna SIN el titulo"></textarea>
                </div>
            </div>
            <label for="trimestre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la Fracción</label>
            <select id="trimestre" name="trimestre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="1">1er Trimestre</option>
                <option value="2">2do Trimestre</option>
                <option value="3">3er Trimestre</option>
                <option value="4">4to Trimestre</option>
            </select>
            <br>
            <input type="submit" value="Continuar" name="6a" class="mx-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
    <?php endif ?>


    <?php if (isset($_POST) && $_POST) : ?>
        <?php if ($_GET['fraccion'] == "5a") : ?>
            <br><br>
            <?php fraccion5($con, $_POST['areas'], $_POST['indicadores'], $_POST['unidades'], $_POST['trimestre']) ?>
        <?php endif ?>
        <?php if ($_GET['fraccion'] == "4") : ?>
            <br><br>
            <?php fraccion4($con, $_POST['areas'], $_POST['unidades'], $_POST['trimestre']) ?>
        <?php endif ?>
        <?php if ($_GET['fraccion'] == "6a") : ?>
            <br><br>
            <?php fraccion6($con, $_POST['areas']) ?>
        <?php endif ?>


    <?php endif ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>




<?php
