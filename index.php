<?php
session_start();

$id_usuario = $_SESSION['id_usuario'];

if (!isset($_SESSION) || !isset($_SESSION['sistema']) || !$_SESSION['sistema'] == "pbrm") {
    header("Location: login.php");
}
require_once 'Controllers/Inicio_Controlador.php';
include 'header.php';
include 'head.php';
?>
<!DOCTYPE html>
<html lang="es">

<body>
    <?php $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); ?>
    <div class="container text-center mx-auto">
        <br>
        <h3 class="font-bold text-4xl text-gray-800 border-b-3 border-gray-100 p-2 mb-2">Bienvenido(a) <?= $user['nombre'] . " " . $user['apellidos'] ?></h3>
        <br>
        <section class="bg-white dark:bg-gray-900">
            <div class="mx-auto">
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                            Actividades
                        </a>
                        <?php if ($permisos['nivel'] == 1 || $permisos['nivel'] == 2) : ?>
                            <?php // Primero traeremos 5 avances por validar  
                            ?>
                            <?php if ($avances = VerificaAvancesActividades($con)) : ?>
                                <?php foreach ($avances as $a) : ?>
                                    <div id="alert-additional-content-3" class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                        <div class="flex items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <h3 class="text-lg font-medium text-left"><?= $a['nombre_dependencia'] . ' - ' . $a['nombre_area'] ?></h3>
                                        </div>
                                        <div class="mt-2 mb-4 text-sm text-left">
                                            <?= $meses[$a['mes']] . ' - ' . $a['nombre_actividad'] ?>
                                        </div>
                                        <div class="flex">
                                            <form action="actividades_avances.php" method="post">
                                                <input type="hidden" name="mes" value="<?= $a['mes'] ?>">
                                                <button type="submit" name="id_area" value="<?= $a['id_area'] ?>" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                                    </svg>
                                                    Ver
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>

                            <?php if ($modificaciones = VerificaModificaciones($con)) : ?>
                                <?php foreach ($modificaciones as $m) : ?>
                                    <div id="alert-additional-content-1" class="p-4 mb-4 text-purple-800 border border-purple-300 rounded-lg bg-purple-50 dark:bg-gray-800 dark:text-purple-400 dark:border-purple-800" role="alert">
                                        <div class="flex items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <h3 class="text-lg font-medium text-left"> <?= $m['nombre_dependencia'] . " - " . $m['nombre_area'] ?> </h3>
                                        </div>
                                        <div class="mt-2 mb-4 text-sm text-left">
                                            <?= $meses[$m['mes']] . " - " . $m['nombre_actividad'] ?>
                                        </div>
                                        <div class="flex">
                                            <form action="actividades_avances.php" method="post">
                                                <input type="hidden" name="mes" value="<?= $m['mes'] ?>">
                                                <button type="submit" name="id_area" value="<?= $m['id_area'] ?>" class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                                    <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                                    </svg>
                                                    Ver
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>



                            <?php if ($recoAct = VerificaReconduccionesActividades($con)) : ?>
                                <?php foreach ($recoAct as $ra) : ?>
                                    <div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                                        <div class="flex items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <h3 class="text-lg font-medium"><?= $ra['nombre_dependencia'] ?></h3>
                                        </div>
                                        <div class="mt-2 mb-4 text-sm">
                                        </div>
                                        <div class="flex">
                                            <a href="revisa_reconducciones.php?type=actividades">
                                                <button type="button" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                    <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                                    </svg>
                                                    Ver Reconducción
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach ?>

                            <?php endif ?>
                        <?php endif ?>

                        <?php if ($permisos['nivel'] == 4) : ?>

                            <?php if ($modificaciones = VerificaModificacionesEnlaces($con, $permisos['id_dependencia'])) : ?>
                                <?php foreach ($modificaciones as $m) : ?>
                                    <div id="alert-additional-content-1" class="p-4 mb-4 text-purple-800 border border-purple-300 rounded-lg bg-purple-50 dark:bg-gray-800 dark:text-purple-400 dark:border-purple-800" role="alert">
                                        <div class="flex items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <h3 class="text-lg font-medium text-left"> <?= $m['nombre_dependencia'] . " - " . $m['nombre_area'] ?> </h3>
                                        </div>
                                        <div class="mt-2 mb-4 text-sm text-left">
                                            <?= $meses[$m['mes']] . " - " . $m['nombre_actividad'] ?>
                                        </div>
                                        <div class="flex">
                                            <form action="reportes.php" method="post">
                                                <input type="hidden" name="mes" value="<?= $m['mes'] ?>">
                                                <button type="submit" name="id_area" value="<?= $m['id_area'] ?>" class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                                    <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                                    </svg>
                                                    Ver
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>

                        <?php endif ?>

                        <?php if ($permisos['nivel'] == 5) : ?>

                            <?php if ($modificaciones = VerificaModificacionesEnlaces5($con, $permisos['id_area'])) : ?>
                                <?php foreach ($modificaciones as $m) : ?>
                                    <div id="alert-additional-content-1" class="p-4 mb-4 text-purple-800 border border-purple-300 rounded-lg bg-purple-50 dark:bg-gray-800 dark:text-purple-400 dark:border-purple-800" role="alert">
                                        <div class="flex items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <h3 class="text-lg font-medium text-left"> <?= $m['nombre_dependencia'] . " - " . $m['nombre_area'] ?> </h3>
                                        </div>
                                        <div class="mt-2 mb-4 text-sm text-left">
                                            <?= $meses[$m['mes']] . " - " . $m['nombre_actividad'] ?>
                                        </div>
                                        <div class="flex">
                                            <form action="reportes.php" method="post">
                                                <input type="hidden" name="mes" value="<?= $m['mes'] ?>">
                                                <button type="submit" name="id_area" value="<?= $m['id_area'] ?>" class="text-white bg-purple-800 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                                    <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                                        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                                    </svg>
                                                    Ver
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>

                        <?php endif ?>

                    </div>


                    <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                        <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                            Indicadores
                        </a>
                        <?php if ($permisos['nivel'] == 1 || $permisos['nivel'] == 2) : ?>
                            <?= AlertaAvancesIndicadores($con) ?>
                            <?= AlertaReconduccionIndicadores($con) ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        // Aqui va lo que pasa si eres nivel 2 (osea de la wipe o gobierno digital)
        if ($permisos['nivel']  == 1 || $permisos['nivel']  == 2) {
            print revisainconsistencias($con);
        }
        ?>
        <br>
        <hr>


    </div>

    <?php include 'footer.php'; ?>
</body>

</html>