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
    <?php $proyectos = Proyectos($con, $user_anio) ?>


    <body>
        <div class="container mx-auto">
            <br>
            <?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => "")) ?>
            <br>


            <?php if ($_POST) : ?>
                <?php if (isset($_POST['b'])) : ?>

                    <?php $programa = traePrograma($con, $_POST['id_area']) ?>
                    <form action="" method="post">
                        <label for="fortalezas"  class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fortalezas (Internas)</label>
                        <textarea id="fortalezas" name="fortalezas" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    
                        <label for="oportunidades"  class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oportunidades (Externas)</label>
                        <textarea id="oportunidades" name="oportunidades" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    
                        <label for="debilidades"  class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Debilidades (Internas)</label>
                        <textarea id="debilidades" name="debilidades" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    
                        <label for="amenazas"  class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amenazas (Externas)</label>
                        <textarea id="amenazas" name="amenazas" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        
                        
                        <label for="objetivo_programa"  class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Objetivo del Programa Presupuestario</label>
                        <textarea id="objetivo_programa" readonly name="objetivo_programa" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $programa['objetivo_pp'] ?></textarea>
                        
                        
                        <label for="estrategias"  class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estrategias para alcanzar el objetivo del Programa Presupuestario</label>
                        <textarea id="estrategias" name="estrategias" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>

                    </form>
                <?php endif ?>

                <?php if (isset($_POST['d'])) : ?>
                    entraste al d
                <?php endif ?>

                <?php if (isset($_POST['a'])) : ?>
                    entraste al a
                <?php endif ?>
            <?php endif ?>


            <?php if (!$_POST) : ?>
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
                                        <form action="" method="post">
                                            <input type="hidden" name="id_area" value="<?= $area['id_area'] ?>">
                                            <button type="submit" name="b" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-l-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                01b
                                            </button>
                                            <button type="submit" name="d" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                                                01d
                                            </button>
                                            <button type="submit" name="a" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-r-md hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
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


                    <?php if ($real_anio != $user_anio) : //  verificamos si es un anio de anteproyecto 
                    ?>
                        <div class="grid grid-cols-4">
                            <?php $areas = areas_con($con, $dep, $user_anio);
                            foreach ($areas as $area) : ?>
                                <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
                                    <h5 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $area['nombre_area'] ?> </h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Metas mensuales.</p>
                                    <form action="actividades_anteproyecto.php" method="post">
                                        <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="<?= $area['id_area'] ?>">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Programar
                                        </button>
                                    </form>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            <?php endif ?>
        </div>
    </body>

    <?php include 'footer.php'; ?>

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