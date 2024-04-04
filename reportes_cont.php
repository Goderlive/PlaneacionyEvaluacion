<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<?php require_once 'Controllers/ReporteController.php'; ?>
<?php include 'Controllers/breadcrumbs.php'; ?>
<?php if ($_SESSION['nivel'] == 4 || $_SESSION['nivel'] == 5) { ?>

    <body>
        <br>
        <div class="container mx-auto">
            <?php $area =  NombreArea($con, $actividadesDB[0]['id_area']) ?>
            <?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => "actividades.php", "Reportar" => "actividades.php", $area => "actividades.php")) ?>
            <br>

            <?php $actividad = Actividad_DB($con, $_POST['id_actividad']); ?>
            <?php $programado = $actividad[strtolower($meses[$_POST['mes']])] ?>


            <p class="mb-3 text-lg text-gray-500 md:text-xl dark:text-gray-400"><?= $actividad['nombre_actividad'] ?></p>
            <p class="mb-3 text-lg text-gray-500 md:text-xl dark:text-gray-400">Programado: <?= $programado ?></p>
            <p class="mb-3 text-lg text-gray-500 md:text-xl dark:text-gray-400">Alcanzado: <?= $_POST['avance'] ?></p>
            <br>
            <?php if ($_POST['avance'] == 0) : ?>
                <?php if ($programado == 0) : ?>
                    <form id="myForm" action="" method="post">
                        <input type="hidden" name="id_dependencia" value="<?= $_POST['id_dependencia'] ?>">
                        <input type="hidden" name="justificacion" value="">
                        <input type="hidden" name="descripcion_evidencia" value="">
                        <input type="hidden" name="id_usuario" value="<?= $_POST['id_usuario'] ?>">
                        <input type="hidden" name="id_area" value="<?= $_POST['id_area'] ?>">
                        <input type="hidden" name="avance" value="0">
                        <input type="hidden" name="jfnkasjnkasdf34q345" value="Enviar">
                        <input type="hidden" name="id_actividad" value="<?= $_POST['id_actividad'] ?>">
                        <input type="hidden" name="mes" value="<?= $_POST['mes'] ?>">
                    </form>
                    <script type="text/javascript">
                        document.getElementById('myForm').submit();
                    </script>
                <?php else : ?>
                    <br>
                    <form id="myForm" action="" method="post">
                        <input type="hidden" name="id_dependencia" value="<?= $_POST['id_dependencia'] ?>">
                        <input type="hidden" name="descripcion_evidencia" value="">
                        <input type="hidden" name="id_usuario" value="<?= $_POST['id_usuario'] ?>">
                        <input type="hidden" name="id_area" value="<?= $_POST['id_area'] ?>">
                        <input type="hidden" name="avance" value="0">
                        <input type="hidden" name="jfnkasjnkasdf34q345" value="Enviar">
                        <input type="hidden" name="id_actividad" value="<?= $_POST['id_actividad'] ?>">
                        <input type="hidden" name="mes" value="<?= $_POST['mes'] ?>">
                        <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación caso de variación: (Necesario)</label>
                        <textarea id="justificacion" name="justificacion" require rows="1" placeholder="Se require una justificación por la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        <br>
                        <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    </form>

                <?php endif ?>
            <?php endif ?>


            <?php if ($_POST['avance'] != 0) : ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_dependencia" value="<?= $_POST['id_dependencia'] ?>">
                    <input type="hidden" name="descripcion_evidencia" value="">
                    <input type="hidden" name="id_usuario" value="<?= $_POST['id_usuario'] ?>">
                    <input type="hidden" name="id_area" value="<?= $_POST['id_area'] ?>">
                    <input type="hidden" name="avance" value="<?= $_POST['avance'] ?>">
                    <input type="hidden" name="jfnkasjnkasdf34q345" value="Enviar">
                    <input type="hidden" name="id_actividad" value="<?= $_POST['id_actividad'] ?>">
                    <input type="hidden" name="mes" value="<?= $_POST['mes'] ?>">

                    <br>
                    <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Evidencia de la Evidencia: (Solo Imagen .jpg, png, jpeg)</label>
                    <input type="file" required name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />

                    <label for="descripcion_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la <b>Actividad</b>:</label>
                    <textarea id="descripcion_evidencia" required name="descripcion_evidencia" rows="1" placeholder="Descripción breve de la actividad realizada duante el mes " class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    <br>

                    <?php if ($programado == 0 || ($_POST['avance'] / $programado * 100  > 110) || ($_POST['avance'] / $programado * 100  < 90)) : ?>
                        <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Justificación por variación:</label>
                        <textarea id="justificacion" required name="justificacion" rows="1" placeholder="Escribir la justificación de la variación" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    <?php endif ?>


                    <?php if ($actividad['lineaactividad']) : ?>
                        <br><br>
                        <table style="width: 100%" ;>
                            <tr>
                                <th style="width: 20%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 23%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th colspan="5" style="width: 64%; text-align: center;" ;>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Origen de los recursos Públicos Aplicados</label>
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 23%" ;>
                                    <?= lista_localidades($con) ?>
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 8%" ;>
                                    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                                    <input type="number" id="beneficiarios" required name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <?php if ($actividad['udmed']) : ?>
                                    <th style="width: 2%" ;>
                                    </th>
                                    <th style="width: 15%" ;>
                                        <label for="udmed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidad de Medida</label>
                                        <input type="text" id="udmed" value="<?= $actividad['udmed'] ?>" disabled required name="udmed" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </th>
                                <?php endif ?>
                                <?php if (!$actividad['udmed']) : ?>
                                    <th style="width: 2%" ;>
                                    </th>
                                    <th style="width: 15%" ;>
                                        <label for="udmed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidad de Medida</label>
                                        <select id="udmed" name="udmed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            <option disabled>Seleccione su unidad</option>
                                            <?php $udmed = traeudmed($con) ?>
                                            <?php foreach($udmed as $u): ?>
                                                <option value="<?= $u['nombre'] ?>"><?= $u['nombre'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </th>
                                <?php endif ?>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Federal</label>
                                    <input type="number" id="recursos_federales" required placeholder="                %" name="recursos_federales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Estatal</label>
                                    <input type="number" id="recursos_estatales" required placeholder="                %" name="recursos_estatales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                                <th style="width: 2%" ;>
                                </th>
                                <th style="width: 10%" ;>
                                    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recurso Propio</label>
                                    <input type="number" id="recursos_propios" required placeholder="                %" name="recursos_propios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th>
                            </tr>
                        </table>
                    <?php endif ?>
<br><br>
                    <input type="submit" value="Enviar" name="jfnkasjnkasdf34q345" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                </form>

                <form id="myForm" action="reportes.php" method="post">
                    <input type="hidden" name="id_area" value="<?= $id_area ?>">
                    <input type="hidden" name="mes" value="<?= $_POST['mes'] ?>">
                    <button type="submit" class="my-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button>
                </form>
            <?php endif ?>



            <!-- Modal footer -->



            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        </div>

    </body>

</html>
<?php
} else {
?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}
?>