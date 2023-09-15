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
    <?php $dependenciasAuxiliares = DependenciasAuxiliares($con, $user_anio) ?>
    <?php $proyectos = Proyectos($con, $user_anio);
    ?>


    <body>
        <div class="container mx-auto">
            <br>
            <?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => "")) ?>
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
                            <button type="submit" name="update_objetivo" value="update_objetivo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar Estrategia</button>
                        </form>
                    </div>
                    <br>
                    <div class="bg-yellow-50 rounded-lg my-2 py-2 px-2">
                        <h4 class="text-2xl font-bold dark:text-white">Objetivos, Estrategias y Lineas de Acción del PDM antendidas:</h4>
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
                        <?php else : ?>
                            <?php if (!(isset($_GET['objetivo']) || isset($_GET['estrategia']))) : ?>
                                Paso 1
                                <?php $objetivos = traeObjetivos_todos($con) ?>
                                <form action="" method="GET">
                                    <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                    <input type="hidden" name="b" value="<?= $_GET['id_area'] ?>">
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
                                Paso 2 <br>
                                Objetivo: <?= traeobjetivoPDM($con, $_GET['objetivo']) ?>
                                <?php $id_objetivo = $_GET['objetivo'] ?>
                                <?php $estrategias = traeEstrategias($con, $id_objetivo) ?>
                                <form action="" method="GET">
                                    <input type="hidden" name="id_area" value="<?= $_GET['id_area'] ?>">
                                    <input type="hidden" name="b" value="<?= $_GET['id_area'] ?>">
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
                                <?= $_GET['estrategia'] ?>
                                Paso Ultimo <br>
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
                                    <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una opción</label>
                                    <button type="submit" name="update_linea" value="update_linea" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Elegir Linea de Acción</button>
                                </form>
                            <?php endif ?>
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
                                    <input type="hidden" name="b" value="<?= $_GET['id_area'] ?>">
                                    <select name="objetivo_ods" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Elige un Objetivo ODS</option>
                                        <?php foreach ($objetivos as $o) : ?>
                                            <option value="<?= $o['id_objetivo'] ?>"><?= $o['clv_objetivo'] . '-' . $o['objetivo'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una opción</label>
                                    <button type="submit" name="update_objetivo" value="update_objetivo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Elegir Objetivo</button>
                                </form>
                            <?php endif ?>

                            <?php if (isset($_GET['objetivo_ods'])) : ?>
                                Paso Ultimo <br>
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


                <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'd') : ?>
                    <?php $id_dependencia = $permisos['id_dependencia'] ?>
                    <?php $indicadores = traeIndicadores($con, $id_dependencia);
                    $actividadest = traeActividadesDependencia($con, $permisos['id_dependencia'])
                    ?>



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
                                        Unidad de Medida
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Operación
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Primer Trimestre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Segundo Trimestre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tercer Trimestre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cuarto Trimestre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Programar/Eliminar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($indicadores as $i) : ?>
                                    <form action="" method="post">
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
                                            <td class="px-6 py-4">
                                                <?php ($i['programado'] == 1 ? $i['umedida_a'] . '<br>' . $i['umedida_b'] : '') ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <br>
                                            </td>
                                            <td class="px-6 py-4">
                                                <br>
                                            </td>
                                            <td class="px-6 py-4">
                                                <br>
                                            </td>
                                            <td class="px-6 py-4">
                                                <br>
                                            </td>
                                            <td class="px-6 py-4">
                                                <br>
                                            </td>
                                            <td>
                                                <button data-modal-target="modal-<?= $i['id'] ?>" data-modal-toggle="modal-<?= $i['id'] ?>" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                                    Programar
                                                </button>
                                            </td>
                                        </tr>
                                    </form>


                                    <!-- Extra Large Modal -->
                                    <div id="modal-<?= $i['id'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-7xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                        Programar <?= $i['nombre_indicador'] ?>
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-<?= $i['id'] ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-6 space-y-6">
                                                    Dimensión que atiende: <?= $i['dimension'] ?> <br>
                                                    Tipo: <?= $i['tipo'] ?><br>
                                                    Formula: <?= $i['formula'] ?> <br>
                                                    Tipo de Indicador: <?= $i['tipo'] ?><br>
                                                    Periodicidad: <b><?= $i['periodicidad'] ?></b><br>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id_indicador" value="<?= $i['id'] ?>">
                                                        <div>
                                                            <div>
                                                                <label for="factor_de_comparacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Factor de Comparación</label>
                                                                <input type="text" name="factor_de_comparacion" id="factor_de_comparacion" value="<?= (isset($i['factor_de_comparacion'])) ? $i['factor_de_comparacion'] : "" ?>" placeholder="Se registrará en forma numérica la descripción del factor de comparación." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div><br>
                                                            <div>
                                                                <label for="desc_factor_de_comparacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción del Factor de Comparación</label>
                                                                <input type="text" name="desc_factor_de_comparacion" id="desc_factor_de_comparacion" value="<?= (isset($i['desc_factor_de_comparacion'])) ? $i['desc_factor_de_comparacion'] : "" ?>" placeholder="Descripción del dato oficial, el que se compara el resultado obtenido." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div><br>
                                                            <div>
                                                                <label for="linea_base" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Línea Base</label>
                                                                <input type="text" name="linea_base" id="linea_base" value="<?= (isset($i['linea_base'])) ? $i['linea_base'] : "" ?>" placeholder="Punto de partida al momento de iniciarse las acciones planificadas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div><br>
                                                            <div>
                                                                <label for="desc_meta_anual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción de la Meta Anual</label>
                                                                <input type="text" name="desc_meta_anual" id="desc_meta_anual" value="<?= (isset($i['desc_meta_anual'])) ? $i['desc_meta_anual'] : "" ?>" placeholder="Se menciona cualitativamente el logro de la meta que se espera alcanzar en el año." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div><br>
                                                            <div>
                                                                <label for="medios_de_verificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medios de Verificación</label>
                                                                <input type="text" name="medios_de_verificacion" id="medios_de_verificacion" value="<?= (isset($i['medios_de_verificacion'])) ? $i['medios_de_verificacion'] : "" ?>" placeholder="Fuentes de información que se utilizarán." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div><br>
                                                            <div>
                                                                <label for="actividades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sleccione todas las Actividades Relacionadas</label>
                                                                <select multiple name="id_actividades[]" id="actividades" size="7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option selected>Seleccione las Actividades</option>
                                                                    <?php foreach($actividadest as $a): ?>
                                                                        <option value="<?= $a['id_actividad'] ?>"><?= $a['nombre_actividad'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div><br>
                                                        </div>
                                                        <div class="grid gap-6 mb-6 md:grid-cols-4">
                                                            <div>
                                                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A: 1er T</label>
                                                                <input type="text" name="at1" id="first_name" value="<?= (isset($i['at1'])) ? $i['at1'] : "" ?>" <?= ($i['periodicidad'] == "Anual" || $i['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                            <div>
                                                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A: 2do T</label>
                                                                <input type="text" name="at2" id="last_name" value="<?= (isset($i['at2'])) ? $i['at2'] : "" ?>" <?= ($i['periodicidad'] == "Anual") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                            <div>
                                                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A: 3er T</label>
                                                                <input type="text" name="at3" id="last_name" value="<?= (isset($i['at3'])) ? $i['at3'] : "" ?>" <?= ($i['periodicidad'] == "Anual" || $i['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                            <div>
                                                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A: 4to T</label>
                                                                <input type="text" name="at4" id="last_name" value="<?= (isset($i['at4'])) ? $i['at4'] : "" ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                        </div>
                                                        <div class="grid gap-6 mb-6 md:grid-cols-4">

                                                            <div>
                                                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">B: 1er T</label>
                                                                <input type="text" name="bt1" id="first_name" value="<?= (isset($i['bt1'])) ? $i['bt1'] : "" ?>" <?= ($i['periodicidad'] == "Anual" || $i['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                            <div>
                                                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">B: 2do T</label>
                                                                <input type="text" name="bt2" id="last_name" value="<?= (isset($i['bt2'])) ? $i['bt2'] : "" ?>" <?= ($i['periodicidad'] == "Anual") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                            <div>
                                                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">B: 3er T</label>
                                                                <input type="text" name="bt3" id="last_name" value="<?= (isset($i['bt3'])) ? $i['bt3'] : "" ?>" <?= ($i['periodicidad'] == "Anual" || $i['periodicidad'] == "Semestral") ? "disabled readonly" : '' ?> class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                            <div>
                                                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">B: 4to T</label>
                                                                <input type="text" name="bt4" id="last_name" value="<?= (isset($i['bt4'])) ? $i['bt4'] : "" ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                                                            <button type="submit" name="program_indicador" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Programar</button>
                                                            <button data-modal-hide="modal-<?= $i['id'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Modal footer -->
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                <?php endif ?>

                <?php if (isset($_GET['tipo']) && $_GET['tipo'] == 'a') : ?>
                    entraste al a
                <?php endif ?>
            <?php endif ?>


            <?php if (!$_GET) : ?>
                <?php if ($permisos['nivel'] > 3) :  // Primero veridicamos el permiso... EN CASO DE ENLACE 
                ?>
                    <?php if ($real_anio == $user_anio) : // Luego verificamos si es un anio corriente 
                    ?>
                        <div class="grid grid-cols-4">
                            <?php
                            $all = '';
                            //Tenemos 2 opciones, que sea un enlace de varias areas, o que sea de una sola area
                            //En caso de que sea un enlace general. le asignamos la chave de la dependencia, y asi lo buscaremos con un metodo especial
                            if ($permisos['id_dependencia'] != '') {
                                $dep = $permisos['id_dependencia'];
                                $areas = areas_con($con, $dep, $real_anio);
                            } else { // En caso de que el permiso se encuentre en
                                $dep = $permisos['id_area'];
                                $areas = unArea($con, $dep, $real_anio);
                            }
                            foreach ($areas as $area) : ?>
                                <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $area['nombre_area'] ?> </h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $area['clave_dependencia'] . '-' . $area['clave_dependencia_auxiliar'] . '-' . $area['codigo_proyecto'] ?></p>
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <form action="" method="get">
                                            <input type="hidden" name="id_area" value="<?= $area['id_area'] ?>">
                                            <button type="submit" name="tipo" value="b" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                01b
                                            </button>
                                            <button type="submit" name="tipo" value="d" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                01d
                                            </button>
                                            <button type="submit" name="tipo" value="a" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                02a
                                            </button>
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
                    <?php endif ?> <!--Hasta aqui se menciona lo relacionado con los anios para reportar -->
                <?php endif ?>
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