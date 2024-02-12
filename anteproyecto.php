<?php
session_start();
if (!$_SESSION) { ?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}
if ($_SESSION['sistema'] == 'pbrm') {
    require_once 'Controllers/Actividades_Controlador.php';
    require_once 'Controllers/anteproyectoController.php';
    $real_anio = date('Y');
    $user_anio = $_SESSION['anio'];
?>
    <!DOCTYPE html>
    <html lang="es">
    <?php include 'head.php';  // Esto solo carga el html de un head
    ?>
    <?php include 'header.php'; // Carga el menu de arriba y la programacion de los permisos
    ?>
    <?php include 'Controllers/breadcrumbs.php'; ?>
    <?php $dependenciasAuxiliares = AreasAntep($con, $user_anio) ?>
    <?php $proyectos = Proyectos($con, $user_anio);
    ?>


    <body>
        <div class="container mx-auto">
            <br>
            <?= breadcrumbs(array("Inicio" => "index.php", "Proyecto 2024" => "anteproyecto.php")) ?>
            <br>
            <?php if ($_GET) : ?>
                <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'b') : ?>
                    <?php $foda = traeFoda($con, $_GET['id_area']) ?>
                    <div class="bg-blue-50 rounded-lg py-2 my-2 px-2">
                        <form action="" method="POST">
                            <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                            <h4 class="text-2xl font-bold dark:text-white">Diagnóstico de Programa Presupuestario elaborado usando Analisis FODA:</h4>
                            <?php $programa = traePrograma($con, $_GET['id_area']) ?>
                            <label for="fortalezas" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fortalezas (Internas)</label>
                            <textarea id="fortalezas" name="fortalezas" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= ($foda) ? $foda['diagnostico_fortaleza'] : '' ?></textarea>

                            <label for="oportunidades" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oportunidades (Externas)</label>
                            <textarea id="oportunidades" name="oportunidades" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= ($foda) ? $foda['diagnostico_oportunidad'] : '' ?></textarea>

                            <label for="debilidades" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Debilidades (Internas)</label>
                            <textarea id="debilidades" name="debilidades" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= ($foda) ? $foda['diagnostico_debilidad'] : '' ?></textarea>

                            <label for="amenazas" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amenazas (Externas)</label>
                            <textarea id="amenazas" name="amenazas" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= ($foda) ? $foda['diagnostico_amenaza'] : '' ?></textarea>
                            <br>
                            <button type="submit" name="update_foda" value="update_foda" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar FODA</button>
                        </form>
                    </div>
                    <br>
                    <div class="bg-green-50 rounded-lg my-2 py-2 px-2">
                        <form action="" method="POST">
                            <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                            <h4 class="text-2xl font-bold dark:text-white">Estrategia para alcanzar el objetivo del Programa presupuestario:</h4>
                            <label for="objetivo_programa" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Objetivo del Programa Presupuestario</label>
                            <?= $programa['objetivo_pp'] ?>
                            <label for="estrategia" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estrategias para alcanzar el objetivo del Programa Presupuestario</label>
                            <textarea id="estrategia" name="estrategia" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= (isset($foda['estrategia'])) ? $foda['estrategia'] : '' ?></textarea>
                            <br>
                            <button type="submit" name="update_estrategia" value="update_estrategia" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar Estrategia</button>
                        </form>
                    </div>
                    <br>
                    <div class="bg-yellow-50 rounded-lg my-2 py-2 px-2">
                        <h4 class="text-2xl font-bold dark:text-white">Objetivos, Estrategias y Lineas de Acción del PDM atendidas:</h4>
                        <br>
                        <?php if (isset($foda['linea_accion'])) : ?>
                            <?php $oel = traeOEL($con, $foda['linea_accion']) ?>
                            Objetivo: <?= $oel['clave_objetivo'] . "-" . $oel['nombre_objetivo'] ?> <br>
                            Estrategia: <?= $oel['clave_estrategia'] . "-" . $oel['nombre_estrategia'] ?> <br>
                            Línea de Acción: <?= $oel['clave_linea'] . "-" . $oel['nombre_linea'] ?>
                            <br>
                            <form action="" method="post">
                                <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                <input type="hidden" name="linea_accion" value="<?= $foda['linea_accion'] ?>">
                                <br>
                                <button type="submit" name="delete_pdm" value="delete_pdm" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                            </form>
                        <?php endif ?>
                        <?php if (!(isset($_GET['objetivo']) || isset($_GET['estrategia']) || isset($foda['linea_accion']))) : ?>
                            Paso 1
                            <?php $objetivos = traeObjetivos_todos($con) ?>
                            <form action="" method="GET">
                                <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                <input type="hidden" name="tipo" value="b">
                                <select name="objetivo" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Elige un Objetivo PDM</option>
                                    <?php foreach ($objetivos as $o) : ?>
                                        <option value="<?= $o['id_objetivo'] ?>"><?= $o['clave_objetivo'] . '-' . $o['nombre_objetivo'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una opción</label>
                                <button type="submit" name="update_objetivo" value="update_objetivo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Elegir Objetivo</button>
                            </form>
                        <?php endif ?>

                        <?php if (isset($_GET['objetivo'])) : ?>
                            <b>Paso 2</b> <br>
                            Objetivo PDM: <?= traeobjetivoPDM($con, $_GET['objetivo']) ?>
                            <?php $id_objetivo = $_GET['objetivo'] ?>
                            <?php $estrategias = traeEstrategias($con, $id_objetivo) ?>
                            <form action="" method="GET">
                                <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                <input type="hidden" name="tipo" value="b">
                                <select name="estrategia" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Elige una Estrategia</option>
                                    <?php foreach ($estrategias as $e) : ?>
                                        <option value="<?= $e['id_estrategia'] ?>"><?= $e['clave_estrategia'] . '-' . $e['nombre_estrategia'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una opción</label>
                                <button type="submit" name="update_estrategia" value="update_estrategia" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Elegir Estrategia</button>
                            </form>
                        <?php endif ?>

                        <?php if (isset($_GET['estrategia'])) : ?>
                            <b>Paso Ultimo</b> <br>
                            <?= traeoestrategia_pdm($con, $_GET['estrategia']) ?>
                            <?php $id_estrategia = $_GET['estrategia'] ?>
                            <?php $lineas = traeLineas($con, $id_estrategia) ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                <select multiple name="id_linea" id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Elige una Linea de Acción</option>
                                    <?php foreach ($lineas as $l) : ?>
                                        <option value="<?= $l['id_linea'] ?>"><?= $l['clave_linea'] . '-' . $l['nombre_linea'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="update_linea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una Linea</label>
                                <button type="submit" name="update_linea" value="update_linea" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Elegir Linea de Acción</button>
                            </form>
                        <?php endif ?>

                    </div>
                    <br>
                    <div class="bg-blue-50 rounded-lg my-2 py-2 px-2">
                        <h4 class="text-2xl font-bold dark:text-white">Objetivos y Metas para el Desarrollo Sostenible (ODS), atendidas por el Programa Presupuestario:</h4>
                        <br>
                        <?php if (isset($foda['id_ods'])) : ?>
                            <?php $ods = traeODSyE($con, $foda['id_ods']) ?>
                            Objetivo: <?= $ods['clv_objetivo'] . "-" . $ods['objetivo'] ?> <br>
                            Línea de Acción: <?= $ods['clv_estrategia'] . "-" . $ods['estrategia'] ?>
                            <form action="" method="post">
                                <input type="hidden" name="id_ods" value="<?= $foda['id_ods'] ?>">
                                <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                <br>
                                <button type="submit" name="delete_ods" value="delete_ods" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                            </form>
                        <?php else : ?>
                            <?php if (!isset($_GET['objetivo_ods'])) : ?>
                                Paso 1
                                <?php $objetivos = traeODSO($con) ?>
                                <form action="" method="GET">
                                    <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                    <input type="hidden" name="tipo" value="b">
                                    <select name="objetivo_ods" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Elige un Objetivo ODS</option>
                                        <?php foreach ($objetivos as $o) : ?>
                                            <option value="<?= $o['id_objetivo'] ?>"><?= $o['clv_objetivo'] . '-' . $o['objetivo'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una opción</label>
                                    <button type="submit" name="update_objetivo_ods" value="update_objetivo_ods" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Elegir Objetivo</button>
                                </form>
                            <?php endif ?>

                            <?php if (isset($_GET['objetivo_ods'])) : ?>
                                <b>Paso Ultimo</b> <br>
                                <?= traeObjetivoODS($con, $_GET['objetivo_ods']) ?>
                                <?php $objetivo_ods = $_GET['objetivo_ods'] ?>
                                <?php $estrategias = traeEstrategiasODS($con, $objetivo_ods) ?>
                                <form action="" method="POST">
                                    <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                    <select multiple name="id_estrategia_ods" id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Elige una Estrategia</option>
                                        <?php foreach ($estrategias as $e) : ?>
                                            <option value="<?= $e['id_estrategia'] ?>"><?= $e['clv_estrategia'] . '-' . $e['estrategia'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una opción</label>
                                    <button type="submit" name="update_ODS" value="update_linea" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Elegir Estrategia ODS</button>
                                </form>
                            <?php endif ?>
                        <?php endif ?>

                    </div>
                    <br><br>
                <?php endif ?>


                <?php if (isset($_GET['programar_indicador']) && $_GET['programar_indicador'] == 'programar_indicador') : ?>
                    <?php $indicador = traeIndicador($con, $_GET['id_indicador']);
                    $actividadest = traeActividadesDependencia($con, $permisos['id_dependencia']) ?>

                    <div class="p-6 space-y-6">
                        Nombre del Indicador: <b><?= $indicador['nombre_indicador'] ?></b><br>
                        Dimensión que atiende: <?= $indicador['dimension'] ?> <br>
                        Tipo: <?= $indicador['tipo'] ?><br>
                        Formula: <?= $indicador['formula'] ?> <br>
                        Tipo de Indicador: <?= $indicador['tipo'] ?><br>
                        Periodicidad: <b><?= $indicador['periodicidad'] ?></b><br>
                        id: <?= $indicador['id'] ?>
                        <form action="" method="post">
                            <input type="hidden" name="id_indicador" value="<?= $indicador['id'] ?>">
                            <div>
                                <label for="interpretacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interpretación (maximo 250 caracteres)</label>
                                <input type="text" maxlength="250" name="interpretacion" id="interpretacion" value="<?= (isset($indicador['interpretacion'])) ? $indicador['interpretacion'] : "" ?>" placeholder="Se registrará en forma numérica la descripción del factor de comparación." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div><br>
                            <div>
                                <label for="factor_de_comparacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Factor de Comparación</label>
                                <input type="text" maxlength="250" name="factor_de_comparacion" id="factor_de_comparacion" value="<?= (isset($indicador['factor_de_comparacion'])) ? $indicador['factor_de_comparacion'] : "" ?>" placeholder="Se registrará en forma numérica la descripción del factor de comparación." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div><br>
                            <div>
                                <label for="desc_factor_de_comparacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción del Factor de Comparación</label>
                                <input type="text" maxlength="250" name="desc_factor_de_comparacion" id="desc_factor_de_comparacion" value="<?= (isset($indicador['desc_factor_de_comparacion'])) ? $indicador['desc_factor_de_comparacion'] : "" ?>" placeholder="Descripción del dato oficial, el que se compara el resultado obtenido." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div><br>
                            <div>
                                <label for="linea_base" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Línea Base</label>
                                <input type="text" maxlength="250" name="linea_base" id="linea_base" value="<?= (isset($indicador['linea_base'])) ? $indicador['linea_base'] : "" ?>" placeholder="Punto de partida al momento de iniciarse las acciones planificadas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div><br>
                            <div>
                                <label for="desc_meta_anual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción de la Meta Anual</label>
                                <input type="text" maxlength="250" name="desc_meta_anual" id="desc_meta_anual" value="<?= (isset($indicador['desc_meta_anual'])) ? $indicador['desc_meta_anual'] : "" ?>" placeholder="Se menciona cualitativamente el logro de la meta que se espera alcanzar en el año." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div><br>
                            <div>
                                <label for="medios_de_verificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medios de Verificación</label>
                                <input type="text" maxlength="250" name="medios_de_verificacion" id="medios_de_verificacion" value="<?= (isset($indicador['medios_de_verificacion'])) ? $indicador['medios_de_verificacion'] : "" ?>" placeholder="Fuentes de información que se utilizarán." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div><br>
                            <div>
                                <label for="actividades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione todas las Actividades Relacionadas</label>
                                <select multiple name="id_actividades[]" id="actividades" size="7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Seleccione las Actividades</option>
                                    <?php
                                    usort($actividadest, function ($a, $b) {
                                        return $a['id_area'] - $b['id_area'];
                                    });

                                    $contadorArea = null;
                                    foreach ($actividadest as $value) :
                                        if ($value['id_area'] != $contadorArea) :
                                            // Cerrar el grupo anterior si existe
                                            if ($contadorArea !== null) {
                                                echo '</optgroup>';
                                            }
                                            // Abrir un nuevo grupo
                                            echo '<optgroup label="' . $value['nombre_area'] . '">';
                                            $contadorArea = $value['id_area'];
                                        endif;
                                    ?>
                                        <option value="<?= $value['id_actividad'] ?>"><?= $value['nombre_actividad'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>

                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Variable
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tipo de Operación
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                U. de Med.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                1er T
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                2do T
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                3er T
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                4to T
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th class="px-6 py-4">
                                                <?= $indicador['variable_a'] ?>
                                            </th>
                                            <th class="px-6 py-4">
                                                <select id="tipo_op_a" name="tipo_op_a" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="Sumable">Sumable</option>
                                                    <option value="Constante">Constante</option>
                                                    <option value="No Sumable">No Sumable</option>
                                                    <option value="Promedio">Promedio</option>
                                                    <option value="Valor Actual">Valor Actual</option>
                                                </select>
                                            </th>
                                            <th class="px-6 py-4">
                                                <input type="text" name="umedida_a" value="<?= (isset($indicador['umedida_a'])) ? $indicador['umedida_a'] : "" ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </th>
                                            <th class="px-6 py-4">
                                                <input type="number" name="at1" value="<?= (isset($indicador['at1'])) ? $indicador['at1'] : "" ?>" <?= ($indicador['periodicidad'] == "Anual" || $indicador['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </th>
                                            <td class="px-6 py-4">
                                                <input type="number" name="at2" value="<?= (isset($indicador['at2'])) ? $indicador['at2'] : "" ?>" <?= ($indicador['periodicidad'] == "Anual") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </td>
                                            <td class="px-6 py-4">
                                                <input type="number" name="at3" value="<?= (isset($indicador['at3'])) ? $indicador['at3'] : "" ?>" <?= ($indicador['periodicidad'] == "Anual" || $indicador['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </td>
                                            <td class="px-6 py-4">
                                                <input type="number" name="at4" value="<?= (isset($indicador['at4'])) ? $indicador['at4'] : "" ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </td>
                                        </tr>

                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th class="px-6 py-4">
                                                <?= $indicador['variable_b'] ?>
                                            </th>
                                            <th class="px-6 py-4">
                                                <select id="tipo_op_b" name="tipo_op_b" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option value="Sumable">Sumable</option>
                                                    <option value="Constante">Constante</option>
                                                    <option value="No Sumable">No Sumable</option>
                                                    <option value="Promedio">Promedio</option>
                                                    <option value="Valor Actual">Valor Actual</option>
                                                </select>
                                            </th>
                                            <th class="px-6 py-4">
                                                <input type="text" name="umedida_b" value="<?= (isset($indicador['umedida_b'])) ? $indicador['umedida_b'] : "" ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </th>
                                            <th class="px-6 py-4">
                                                <input type="number" name="bt1" value="<?= (isset($indicador['bt1'])) ? $indicador['bt1'] : "" ?>" <?= ($indicador['periodicidad'] == "Anual" || $indicador['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </th>
                                            <td class="px-6 py-4">
                                                <input type="number" name="bt2" value="<?= (isset($indicador['bt2'])) ? $indicador['bt2'] : "" ?>" <?= ($indicador['periodicidad'] == "Anual") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </td>
                                            <td class="px-6 py-4">
                                                <input type="number" name="bt3" value="<?= (isset($indicador['bt3'])) ? $indicador['bt3'] : "" ?>" <?= ($indicador['periodicidad'] == "Anual" || $indicador['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </td>
                                            <td class="px-6 py-4">
                                                <input type="number" name="bt4" value="<?= (isset($indicador['bt4'])) ? $indicador['bt4'] : "" ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="submit" name="program_indicador" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Programar</button>
                                <a href="anteproyecto.php?id_area=<?= $indicador['id_area'] ?>&tipo=d" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Regresar</a>
                            </div>
                        </form>
                    </div>


                <?php endif ?>
                <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'd') : ?>
                    <?php $id_dependencia = $permisos['id_dependencia'] ?>
                    <?php $indicadores = traeIndicadores($con, $id_dependencia); ?>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Periodicidad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Variables
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Programar/Eliminar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($indicadores as $i) : ?>
                                    <form action="" method="GET">
                                        <input type="hidden" name="id_alta" value="<?= $permisos['id_usuario'] ?>">
                                        <input type="hidden" name="id_indicador" value="<?= $i['id'] ?>">
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                <?= $i['nombre_indicador'] ?>
                                                </th>
                                            <td class="px-6 py-4">
                                                <?= $i['periodicidad'] ?>
                                                </th>
                                            <td class="px-6 py-4">
                                                A: <?= $i['variable_a'] ?>
                                                <br>
                                                B: <?= $i['variable_b'] ?>
                                                </th>
                                            <td>
                                                <?php if ($i['validado'] == 1) : ?>
                                                    <button type="submit" name="programar_indicador" value="programar_indicador" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Modificar</button>
                                                <?php else : ?>
                                                    <button type="submit" name="programar_indicador" value="programar_indicador" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Programar</button>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>


                <?php if (isset($_GET['id_actividad'])) : ?>
                    <?php $actividad = traeActividad($con, $_GET['id_actividad']) ?>
                    <?php $unidades = traeUnidades($con) ?>

                    <div class="relative overflow-x-auto">
                        <form action="" method="post">
                            <input type="hidden" name="id_actividad" value="<?= $actividad['id_actividad'] ?>">
                            <input type="hidden" name="id_area" value="<?= $actividad['id_area'] ?>">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <th scope="col" class="px-2 py-2">
                                        Actividad
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Unidad de Medida
                                    </th>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4">
                                            <input type="text" maxlength="250" id="nombre_actividad" name="nombre_actividad" value="<?= $actividad['nombre_actividad'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php if ($actividad['id_unidad'] === null) {
                                                $idGuardado = 0;
                                            } else {
                                                $idGuardado = $actividad['id_unidad'];
                                            } ?>

                                            <select name="id_unidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Selecciona</option>
                                                <?php foreach ($unidades as $u) : ?>
                                                    <option value="<?= $u['id_unidad']; ?>" <?php if ($u['id_unidad'] == $idGuardado) echo 'selected'; ?>>
                                                        <?php echo $u['nombre_unidad']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <th scope="col" class="px-2 py-2">
                                        Ene
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Feb
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Mar
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Abr
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        May
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Jun
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Jul
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Ago
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Sep
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Oct
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Nov
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Dic
                                    </th>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            <input type="number" id="enero" name="enero" value="<?= $actividad['enero'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="febrero" name="febrero" value="<?= $actividad['febrero'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="marzo" name="marzo" value="<?= $actividad['marzo'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="abril" name="abril" value="<?= $actividad['abril'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="mayo" name="mayo" value="<?= $actividad['mayo'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="junio" name="junio" value="<?= $actividad['junio'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="julio" name="julio" value="<?= $actividad['julio'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="agosto" name="agosto" value="<?= $actividad['agosto'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="septiembre" name="septiembre" value="<?= $actividad['septiembre'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="octubre" name="octubre" value="<?= $actividad['octubre'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="noviembre" name="noviembre" value="<?= $actividad['noviembre'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="diciembre" name="diciembre" value="<?= $actividad['diciembre'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php if ($actividad['validado'] == 1) : ?>
                                            <td>
                                                <button type="submit" name="actividad_update" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Modificar</button>
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <br>
                                                <button type="submit" name="actividad_update" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Programar</button>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                </tbody>
                            </table><br>

                            <?php if ($actividad['lineaactividad']) : ?>
                                Obetivo: <?= $actividad['nombre_objetivo'] ?> <br>
                                Estrategia: <?= $actividad['nombre_estrategia'] ?> <br>
                                Línea de Acción: <?= $actividad['nombre_linea'] ?> <br>
                            <?php endif ?>


                            <?php if ($risk = traeRisks($con, $actividad['id_actividad'])) : ?>
                                el riesgo es: <?= $risk['probabilidad'] . ' y ' . $risk['impacto'] ?>
                            <?php else : ?>

                                <div class="relative overflow-x-auto">
                                    Riesgos:
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Probabilidad
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Impacto
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4">
                                                    <?php $probabilidad =  traeProbabilidad($con)  ?>
                                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Seleccione un Nivel de Probabilidad</option>
                                                        <?php foreach ($probabilidad as $i) : ?>
                                                            <option value="<?= $i['valor_probabilidad'] ?>"><?= $i['valor_probabilidad'] . "-" . $i['nombre_probabilidad'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <?php $impacto =  traeImpacto($con)  ?>
                                                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Seleccione un Nivel de Impacto</option>
                                                        <?php foreach ($impacto as $i) : ?>
                                                            <option value="<?= $i['valor_impacto'] ?>"><?= $i['valor_impacto'] . "-" . $i['nombre_impacto'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <?php endif ?>
                        </form>
                    </div>


                <?php endif ?>


                <?php if (isset($_GET['nueva_actividad'])) : // NUEVA ACTIVIDAD DESDE CERO 
                ?>
                    <?php $id_area = $_GET['id_area'] ?>
                    <?php $unidades = traeUnidades($con) ?>
                    <div class="relative overflow-x-auto">
                        <form action="" method="post">
                            <input type="hidden" name="id_area" value="<?= $id_area ?>">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <th scope="col" class="px-2 py-2">
                                        Actividad
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Unidad de Medida
                                    </th>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4">
                                            <input type="text" maxlength="250" id="nombre_actividad" name="nombre_actividad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </th>
                                        <td class="px-6 py-4">
                                            <select name="id_unidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option value="">Selecciona</option>
                                                <?php foreach ($unidades as $u) : ?>
                                                    <option value="<?= $u['id_unidad']; ?>">
                                                        <?php echo $u['nombre_unidad']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <th scope="col" class="px-2 py-2">
                                        Ene
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Feb
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Mar
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Abr
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        May
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Jun
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Jul
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Ago
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Sep
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Oct
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Nov
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Dic
                                    </th>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            <input type="number" id="enero" name="enero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="febrero" name="febrero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="marzo" name="marzo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="abril" name="abril" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="mayo" name="mayo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="junio" name="junio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="julio" name="julio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="agosto" name="agosto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="septiembre" name="septiembre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="octubre" name="octubre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="noviembre" name="noviembre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input type="number" id="diciembre" name="diciembre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br>
                                            <button type="submit" name="nueva_actividad" value="nueva_actividad" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Registrar</button>
                                        </td>

                                    </tr>
                                </tbody>
                            </table><br>

                        </form>
                    </div>


                <?php endif ?>

                <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'a') : ?>
                    <?php $id_area = $_GET['id_area'] ?>
                    <?php $actividadesAreas = actividadesArea($con, $id_area) ?>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-2 py-2">
                                        Actividad
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Unidad de Medida
                                    </th>
                                    <th scope="col" class="px-2 py-2 bg-gray-50">
                                        Anual
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Ene
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Feb
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Mar
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Abr
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        May
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Jun
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Jul
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Ago
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Sep
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Oct
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Nov
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Dic
                                    </th>
                                    <th scope="col" class="px-2 py-2">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($actividadesAreas as $aca) : ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-2 py-2">
                                            <?= $aca['nombre_actividad'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['nombre_unidad'] ?>
                                        </td>
                                        <td class="px-2 py-2 bg-gray-50">
                                            <?= $aca['enero'] + $aca['febrero'] + $aca['marzo'] + $aca['abril'] + $aca['mayo'] + $aca['junio'] + $aca['julio'] + $aca['agosto'] + $aca['septiembre'] + $aca['octubre'] + $aca['noviembre'] + $aca['diciembre'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['enero'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['febrero'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['marzo'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['abril'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['mayo'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['junio'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['julio'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['agosto'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['septiembre'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['octubre'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['noviembre'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <?= $aca['diciembre'] ?>
                                        </td>
                                        <td class="px-2 py-2">
                                            <form action="" method="get">
                                                <?php if ($aca['validado'] == 1) : ?>
                                                    <button type="submit" name="id_actividad" value="<?= $aca['id_actividad'] ?>" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Modificar</button>
                                                <?php else : ?>
                                                    <button type="submit" name="id_actividad" value="<?= $aca['id_actividad'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Programar</button>
                                                <?php endif ?>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td>
                                        <br>
                                        <form action="" method="get">
                                            <input type="hidden" name="id_area" value="<?= $id_area ?>">
                                            <button type="submit" name="nueva_actividad" value="<?= $actividadesAreas[0]['id_area'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nueva Actividad</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                <?php endif ?>
            <?php endif ?>


            <?php if (!$_GET) : ?>
                <?php if ($permisos['nivel'] == 4) :  // Primero veridicamos el permiso... EN CASO DE ENLACE 
                ?>
                    <h2 class="text-4xl font-bold dark:text-white">Formatos para Imprimir</h2>

                    <br>
                    <div class="flex items-center w-full space-x-2">
                        <br>
                        <form action="sources/TCPDF-main/examples/ante_01a.php" method="post">
                            <input type="hidden" name="id_dependencia" value="<?= $permisos['id_dependencia'] ?>">
                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">01a</button>
                        </form>

                        <?= boton1b($con, $permisos['id_dependencia']) ?>
                        <?= boton01c($con, $permisos['id_dependencia']) ?>
                        <?= boton01d($con, $permisos['id_dependencia']) ?>
                        <form action="sources/TCPDF-main/examples/ante_01e.php" method="post">
                            <input type="hidden" name="id_dependencia" value="<?= $permisos['id_dependencia'] ?>">
                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">01e</button>
                        </form>
                        <?= boton02a($con, $permisos['id_dependencia']) ?>
                    </div>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                    <h2 class="text-4xl font-bold dark:text-white">Captura de Información</h2>
                    <br>
                    <div class="mt-5">
                        <a href="?id_dependencia=<?= $permisos['id_dependencia'] ?>&tipo=d" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Indicadores</a>
                    </div>
                    <br><br>
                    <div class="grid grid-cols-4">
                        <?php
                        $all = '';
                        //Tenemos 2 opciones, que sea un enlace de varias areas, o que sea de una sola area
                        //En caso de que sea un enlace general. le asignamos la chave de la dependencia, y asi lo buscaremos con un metodo especial
                        if ($permisos['id_dependencia'] != '') {
                            $dep = $permisos['id_dependencia'];
                            $areas = anteAreas_con($con, $dep);
                        } else { // En caso de que el permiso se encuentre en
                            $dep = $permisos['id_area'];
                            $areas = unArea($con, $dep, $real_anio);
                        }
                        foreach ($areas as $area) : ?>
                            <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $area['nombre_area'] ?> </h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $area['clave_dependencia'] . '-' . $area['clave_dependencia_auxiliar'] . '-' . $area['codigo_proyecto'] ?></p>
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <form action="" method="get">
                                        <input type="hidden" name="id_area" value="<?= $area['id_area'] ?>">
                                        <?php if ($area['diagnostico_fortaleza'] && $area['diagnostico_oportunidad'] && $area['diagnostico_debilidad'] && $area['diagnostico_amenaza'] && $area['estrategia'] && $area['id_ods'] && $area['linea_accion']) : ?>
                                            <button type="submit" name="tipo" value="b" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                01b
                                            </button>
                                        <?php else : ?>
                                            <button type="submit" name="tipo" value="b" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                01b
                                            </button>
                                        <?php endif ?>
                                        <?php if (controller_ante_actividadesValidadas($con, $area['id_area'])) : ?>
                                            <button type="submit" name="tipo" value="a" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                02a
                                            </button>
                                        <?php else : ?>
                                            <button type="submit" name="tipo" value="a" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                02a
                                            </button>
                                        <?php endif ?>
                                    </form>
                                </div>
                                <div class="px-3 pt-4 pb-2 text-center">
                                    <?php $lineas = buscalineas($con, $area['id_area']) ?>
                                    <?php if ($lineas) : ?>
                                        <img src="img/pdm.png" class="h-auto max-w-lg mx-auto" alt="Esta área tiene Actividades vinculadas al PDM.">
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endif ?>

            <?php if ($permisos['nivel'] == 1) : // Area de Administradores 
            ?>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"> Formatos PDF</h5>
                <div class="grid grid-cols-6">
                    <form action="sources\TCPDF-main\examples\ante_01a_todos.php" method="post">
                        <button type="submit" name="01a" value="01a" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01a</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01b_todos.php" method="post">
                        <button type="submit" name="01b" value="01b" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01b</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01c_todos.php" method="post">
                        <button type="submit" name="01c" value="01c" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01c</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01d_todos.php" method="post">
                        <button type="submit" name="01d" value="01d" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01d</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01e_todos.php" method="post">
                        <button type="submit" name="01e" value="01e" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01e</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_02a_todos.php" method="post">
                        <button type="submit" name="02a" value="02a" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">02a</button>
                    </form>
                </div>
                <br>
                <h5 class="mt-4 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"> Formatos TXT</h5>
                <div class="grid grid-cols-6">
                    <form action="sources\TCPDF-main\examples\ante_01a_todos.php" method="post">
                        <button type="submit" name="01a" value="01a" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01a</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01b_todos.php" method="post">
                        <button type="submit" name="01b" value="01b" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01b</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01c_todos.php" method="post">
                        <button type="submit" name="01c" value="01c" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01c</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01d_todos.php" method="post">
                        <button type="submit" name="01d" value="01d" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01d</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_01e_todos.php" method="post">
                        <button type="submit" name="01e" value="01e" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">01e</button>
                    </form>
                    <form action="sources\TCPDF-main\examples\ante_02a_todos.php" method="post">
                        <button type="submit" name="02a" value="02a" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">02a</button>
                    </form>
                </div>
                <br>
                Enlistaremos todas las actividades por area y las
            <?php endif ?>
        </div>
    </body>










    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    </html>
<?php
} else {
?>
    <script>
        alert("ya te hubiera sacado");
        window.location.href = 'login.php';
    </script>
<?php
}



?>