<?php
session_start();
if (!$_SESSION || $_SESSION['sistema'] != 'pbrm') {
?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';  // Esto solo carga el html de un head
?>
<?php include 'header.php'; // Carga el menu de arriba y la programacion de los permisos
?>
<?php include 'Controllers/breadcrumbs.php'; ?>
<?php include 'Controllers/actividades_avances_controller.php'; ?>

<?php $el_mes = (isset($_POST['mes'])) ? $_POST['mes'] : intval(date('m')); ?>


<body>
    <?php
    if ($permisos['nivel'] != 1 && $permisos['nivel'] != 2) : ?>
        <script>
            window.location.href = 'index.php';
        </script>
    <?php endif ?>
    <div class="container mx-auto">
        <br>



        <?php if (!$_POST) : ?>
            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Valida Actividades (Dependencias)</span>
                        </div>
                    </li>
                </ol>
            </nav>
        <?php endif ?>


        <?php if (isset($_POST['id_dependencia'])) :
            $nombre_dependencia = TraeNombredependencia($con, $_POST['id_dependencia']) ?>

            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="actividades_avances.php" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Dependencias</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"><?= $nombre_dependencia ?></span>
                        </div>
                    </li>
                </ol>
            </nav>
        <?php endif ?>

        <?php if (isset($_POST['id_area'])) :
            $nombres = NombreArea($con, $_POST['id_area']) ?>

            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="actividades_avances.php" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Dependencias</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <form action="" method="post">
                                <input type="hidden" name="id_dependencia" value="<?= $nombres[2] ?>">
                                <button type="submit" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $nombres[0] ?></button>
                            </form>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"><?= $nombres[1] ?></span>
                        </div>
                    </li>
                </ol>
            </nav>
        <?php endif ?>

        <br>



        <?php if ($permisos['nivel'] == 1 || $permisos['nivel'] == 2) : // Esta es la primer condicion para los permisos que permiten validar
        ?>
            <?php if (!$_POST) : //Si no hay un post va a elistar las dependencias que nos corresponden segun el permiso
                $dependencias = TraeDependenciasController($con, $permisos); ?>
                <div class="grid grid-cols-4">
                    <?php foreach ($dependencias as $dp) : ?>
                        <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $dp['nombre_dependencia'] ?> </h5>
                            <?php $pendientespbrm = Pendientespbrm($con, $dp['id_dependencia']) ?>
                            <?php $pendientespdm = Pendientespdm($con, $dp['id_dependencia']) ?>
                            <?php if ($pendientespbrm['total_resultados'] != 0) : ?>
                                <p class="font-normal text-gray-700 dark:text-gray-400">PbRM: <?= $pendientespbrm['total_resultados'] ?> pendientes de revisión</p>
                            <?php else : ?>

                            <?php endif ?>


                            <?php if ($pendientespdm['total_resultados'] != 0) : ?>
                                <p class="font-normal text-gray-700 dark:text-gray-400">PDM: <?= $pendientespdm['total_resultados'] ?> pendientes de revisión</p>
                            <?php else : ?>

                            <?php endif ?>
                            <br>

                            <form action="" method="post">
                                <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_dependencia" value="<?= $dp['id_dependencia'] ?>">
                                    Ver Areas
                                </button>
                            </form>
                            <br>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>


            <?php if (isset($_POST['id_dependencia'])) :  //Aqui validamos el area
            ?>
                <?php $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); ?>
                <?php $id_dependencia = $_POST['id_dependencia'] ?>
                <?php $areas = TraerAreas($con, $id_dependencia) ?>
                <div class="grid grid-cols-4">
                    <?php foreach ($areas as $a) : ?>
                        <?php $totalActividades = CuentaActividadesArea($con, $a['id_area']); ?>
                        <div class="items-start p-4 ml-2 mr-2 mb-4 bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $a['nombre_area'] ?> </h5>
                            <h5 class="mb-2 tracking-tight text-gray-900 dark:text-white"> <?= $a['clave_dependencia'] . "-" . $a['clave_dependencia_auxiliar'] . '-' . $a['codigo_proyecto'] ?> </h5>
                            <h5 class="mb-2 tracking-tight text-gray-900 dark:text-white"> <?= $totalActividades ?> Actividades </h5>
                            <div class="flex mt-1 space-x-3">
                                <?php if (date('m') >= 3) : ?>
                                    <div id="toast-interactive" class="p-1 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
                                        <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white"><?= $meses[intval(date('m')) - 2] ?></span>
                                        <br>
                                        <?php $validadas = ActividadesValidadas($con, $a['id_area'], date('m') - 2) ?>
                                        <?php if ($validadas == $totalActividades) : ?>
                                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-green-400 rounded-lg">
                                                OK!
                                            </div>
                                        <?php else : ?>

                                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-red-600 rounded-lg">
                                                <?php $sinvalidar = SinValidar($con, $a['id_area'], date('m') - 3, $permisos) ?>
                                                <?= $sinvalidar ?>
                                            </div>
                                            <br>
                                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-yellow-300 rounded-lg">
                                                <?php $pendientes = PendientesSegunPermisos($con, $a['id_area'], $permisos, date('m') - 3) ?>
                                                <?= $pendientes ?>
                                            </div>
                                            <br>
                                            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-gray-700 rounded-lg">
                                                <?php //deberia ser una resta simple de las anteriores  
                                                ?>
                                                <?= $totalActividades - $sinvalidar - $pendientes ?>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <?php if (date('m') >= 2) : ?>
                                    <div id="toast-interactive" class="p-1 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
                                        <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white"><?= $meses[intval(date('m')) - 1] ?></span>
                                        <br>
                                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-red-300 rounded-lg">
                                            3
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div id="toast-interactive" class="p-1 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
                                    <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white"><?= $meses[intval(date('m'))] ?></span>
                                    <br>
                                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-red-300 rounded-lg">
                                        3
                                    </div>
                                </div>



                            </div>

                            <?php $pendientesareaspbrm = Pendientesareaspbrm($con, $a['id_area']) ?>
                            <?php $pendientesareaspdm = Pendientesareaspdm($con, $a['id_area']) ?>

                            <?php if ($pendientesareaspbrm['total_resultados'] != 0) : ?>
                                <p class="font-normal text-gray-700 dark:text-gray-400">PbRM: <?= $pendientesareaspbrm['total_resultados'] ?> pendientes de revisión</p>
                            <?php else : ?>

                            <?php endif ?>


                            <?php if ($pendientesareaspdm['total_resultados'] != 0) : ?>
                                <p class="font-normal text-gray-700 dark:text-gray-400">PDM: <?= $pendientesareaspdm['total_resultados'] ?> pendientes de revisión</p>
                            <?php else : ?>

                            <?php endif ?>

                            <br>
                            <form action="" method="post">
                                <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="<?= $a['id_area'] ?>">
                                    Ver Avances
                                </button>
                            </form>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>


            <?php if (isset($_POST['id_area'])) : // Aqui mostramos las actividades
            ?>
                <?php $localidades = TraeLocalidades($con); ?>
                <?php $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); ?>
                <?php $id_area = $_POST['id_area'] ?>
                <?php $actividadesDB = Actividades_DB($con, $id_area); ?>
                <div class="text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex -space-x-px">
                            <?= MenuMes($el_mes, $id_area) ?>
                        </ul>
                    </nav>
                </div>

                <br>
                <div class="relative overflow-x-auto shadow-md sm:rounded-md">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre Actividad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Unidad de Medida
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Programado Anual
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Avance Programado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Avance Reportado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Programado <?= $meses[$el_mes] ?>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Reportado <?= $meses[$el_mes] ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($actividadesDB as $a) : ?>
                                <?php $avanceMensual = AvanceMes($con, $a['id_actividad'], $el_mes);
                                $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
                                $mesi = strtolower($meses[$el_mes]); ?>
                                <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <?= $a['codigo_actividad'] ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $a['nombre_actividad'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $a['unidad'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $anual ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $progsuma = ProcSumaProgramadosmesymes($con, $el_mes, $a['id_actividad']); ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $repsuma = SumaAvancesmesymes($con, $el_mes, $a['id_actividad']); ?>
                                        <br>
                                        <?= ($progsuma != 0) ?  number_format(($repsuma / $progsuma) * 100, 2, '.', '') . "%" : ''?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $a[$mesi] ?>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if ($avanceMensual) {
                                            echo Botonavance($avanceMensual, $permisos);
                                        } else {
                                            print "Sin Avance";
                                        } ?>
                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                <?php foreach ($actividadesDB as $m) : ?>
                    <?php $avanceMensual = AvanceMes($con, $m['id_actividad'], $el_mes); ?>
                    <?php $anual = $m['enero'] + $m['febrero'] + $m['marzo'] + $m['abril'] + $m['mayo'] + $m['junio'] + $m['julio'] + $m['agosto'] + $m['septiembre'] + $m['octubre'] + $m['noviembre'] + $m['diciembre'] ?>
                    <?php if ($avanceMensual) :  // Comienza el area de modales
                    ?>
                        <div id="evidenciasModal<?= $avanceMensual['id_actividad'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-7xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                            <?= $m['nombre_actividad'] ?>
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="evidenciasModal<?= $avanceMensual['id_actividad'] ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Cerrar</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    Nombre de la Meta de Actividad
                                                </th>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    U d M
                                                </th>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    Prog. Anual
                                                </th>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    Mes
                                                </th>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    Prog Mes
                                                </th>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    Alcanzada
                                                </th>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    Variacion
                                                </th>
                                                <th scope="col" class="py-3 px-6" align="center">
                                                    Evidencia
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="py-2 px-6" align="center" valign="top">
                                                    <?= $m['nombre_actividad'] ?>
                                                </th>
                                                <td class="py-2 px-6" align="center" valign="top">
                                                    <?= $m['unidad'] ?>
                                                </td>
                                                <td class="py-2 px-6" align="center" valign="top">
                                                    <?= $anual ?>
                                                </td>
                                                <td class="py-2 px-6" align="center" valign="top">
                                                    <?= nombremes($avanceMensual['mes']) ?>
                                                </td>
                                                <td class="py-2 px-6" align="center" valign="top">
                                                    <?= $m[$mesi] ?>
                                                </td>
                                                <td class="py-2 px-6" align="center" valign="top">
                                                    <?= "<b>" . $avanceMensual['avance'] . "<b>" ?>
                                                </td>
                                                <td class="py-2 px-6" align="center" valign="top">
                                                    <?= intval($avanceMensual['avance']) - $m[$mesi] ?>
                                                </td>
                                                <td class="py-2 px-6" align="center">
                                                    <?php if (isset($avanceMensual['path_evidenia_evidencia'])) : ?>
                                                        <a target="_blank" onclick="abrirVentana<?= $avanceMensual['id_actividad'] ?>()" href="<?= Imagenes($avanceMensual['path_evidenia_evidencia']) ?>">
                                                            <?= imgmd($avanceMensual['path_evidenia_evidencia']) ?>
                                                        </a>
                                                    <?php else : ?>
                                                        Sin Evidencia
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        </table>

                                        <?php if ($avanceMensual['id_linea']) : ?>
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <tbody>
                                                    <tr class="bg-white dark:bg-gray-800">
                                                        <td scope="row" class="py-2 px-6" align="center" valign="top">
                                                            <?php
                                                            if (isset($avanceMensual['localidades'])) {
                                                                echo localidades($avanceMensual['localidades'], $localidades);
                                                            } else {
                                                                echo 'No se seleccionaron localidades';
                                                            } ?>
                                                        </td>
                                                        <td scope="row" class="py-2 px-6" align="center" valign="top">
                                                            <?php if ($avanceMensual['beneficiarios']) :
                                                                print $avanceMensual['beneficiarios'] . ' ' . $avanceMensual['udmed']; ?>
                                                            <?php else : ?>
                                                                <b> No selecciono beneficiarios </b>
                                                            <?php endif ?>
                                                        </td>
                                                        <td scope="row" class="py-2 px-6" align="center" valign="top">
                                                            <?php if ($avanceMensual['recursos']) :
                                                                print $avanceMensual['recursos']; ?>
                                                            <?php else : ?>
                                                                <b> No selecciono recursos </b>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php endif ?>
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <tr>
                                                <td>
                                                    Descripcion de la Actividad: <?= $avanceMensual['descripcion_evidencia'] ?> <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Justificación por variación: <?= $avanceMensual['justificacion'] ?> <br>
                                                </td>
                                            <tr>
                                                <td>
                                                    Reportado por:<b> <?= $avanceMensual['nombre'] . ' ' . $avanceMensual['apellidos'] . "</b> <br>" ?> <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php if ($el_mes % 3 == 0) : ?>
                                                        <?php if ($avanceMensual['actividad_trimestral']) : ?>
                                                            <div class="scrollable-content">
                                                                <textarea style="width: 100%;" readonly> <?= $avanceMensual['actividad_trimestral'] ?> </textarea>
                                                            </div>
                                                        <?php else : ?>
                                                            <textarea style="width: 100%;" readonly> Sin Descripción trimestral </textarea>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <?= tiempos($avanceMensual['fecha_avance']) ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <?= BotonPBRM($avanceMensual, $permisos, $m['id_area'], $el_mes) ?>
                                        </table>
                                        <?php if (GetModificaciones($con, $avanceMensual['id_avance'])) : ?>
                                            <button type="submit" disabled name="valida_actividad" value="1" class="cursor-not-allowed focus:outline-none text-white bg-purple-300 hover:bg-purple-350 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edición Pendiente</button>
                                        <?php else : ?>
                                            <form action="validaediciones.php" method="post">
                                                <input type="hidden" name="id_avance" value="<?= $avanceMensual['id_avance'] ?>">
                                                <button type="submit" name="valida_actividad" value="1" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Permitir Editar</button>
                                            </form>
                                        <?php endif ?>
                                        <?php if ($avanceMensual['validado'] == 1 & $avanceMensual['validado_2'] == 1) : ?>
                                            <form action="models/avances_modelo.php" method="post">
                                                <input type="hidden" name="id_avance" value="<?= $avanceMensual['id_avance'] ?>">
                                                <input type="hidden" name="usuario" value="<?= $_SESSION['id_usuario'] ?>">
                                                <input type="hidden" name="id_area" value="<?= $m['id_area'] ?>">
                                                <input type="hidden" name="mes" value="<?= $el_mes ?>">
                                                <button type="submit" name="cancela_actividad" value="1" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar Avance Aprobado</button>
                                            </form>
                                        <?php endif ?>
                                    </div>
                                    <script>
                                        function abrirVentana<?= $avanceMensual['id_actividad'] ?>() {
                                            if (file_exists('<?= $avanceMensual['path_evidenia_evidencia'] ?>')) {
                                                window.open('<?= $avanceMensual['path_evidenia_evidencia'] ?>', '_blank', 'width=1000,height=700');
                                            } else {
                                                window.open('<?= substr($avanceMensual['path_evidenia_evidencia'], 3) ?>', '_blank', 'width=1000,height=700');
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>

        <?php endif //Termina el IF de los permisos de los validadores 
        ?>











        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    </div>
</body>

</html>