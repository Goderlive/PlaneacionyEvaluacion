<?php
session_start();

$id_usuario = $_SESSION['id_usuario'];

if (!isset($_SESSION) || !isset($_SESSION['sistema']) || !$_SESSION['sistema'] == "pbrm") {
    header("Location: login.php");
}
//require_once 'Controllers/Inicio_Controlador.php';
require_once 'models\pdm_admin_model.php';
include 'header.php';
include 'head.php';

// Fechas para reportar;


$unt = array("20240101", "20240310");
$dot = array("20240401", "20240710");
$trt = array("20240801", "20241010");
$cut = array("20241101", "20241220");

$hoy = date('Y') . date('m') . date('d');

function formulario($trim)
{
    return '            <form action="" method="post">
                <input type="hidden" name="trimestre" value="'.$trim.'">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diagnóstico actualizado del programa</label>
                <textarea id="" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción del avance cualitativo de las metas programadas y resultado del los indicadores del programa</label>
                <textarea id="" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
                <button type="submit" name="enviar" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            </form>';
}



?>
<!DOCTYPE html>
<html lang="es">

<body>


    <div class="container mx-auto mt-4">

        <br>
        <h3 class="text-3xl font-bold dark:text-white">Diagnostico de Programa y Descripción de Avances</h3>


        <?php if (isset($_SESSION['id_dependencia']) && $_SESSION['id_dependencia'] != '') : ?>
            <?php $programas = traeProgramas($con, $_SESSION['id_dependencia']) ?>
            <br>
            <p>Elija el programa a reportar</p> <br>
            <?php if (count($programas) > 0) : ?>
                <form action="" method="get">
                    <?php foreach ($programas as $v) : ?>
                        <button type="submit" name="programa" value="<?= $v['id_programa'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><?= $v['nombre_programa'] ?></button>
                    <?php endforeach ?>
                </form>
            <?php else : ?>
                Esta Cuenta no tiene programas presupuestarios
            <?php endif ?>
        <?php endif ?>

        <?php if ($_GET) : ?>
            <?php $programa = NombrePrograma($con, $_GET['programa']) ?>

            <h3 class="text-3xl my-2 font-bold dark:text-white">Programa: <?= $programa['nombre_programa'] ?></h3>

            <p>
                Tema de PDM: <?= $programa['tema_desarrollo'] ?> <br>
                Pilar o Eje: <?= $programa['nombre_pilaoeje'] ?> <br>
                Objetivo del Programa: <?= $programa['objetivo_pp'] ?> <br>
            </p>
            <br>

            <?php $hoy = date('Y') . date('m') . date('d') ?>
            <?php if ($unt[0] < $hoy && $unt[1] > $hoy) : ?>
                <p class="text-center"><b>Primer Trimestre</p></b>
                <?php formulario(1) ?>
            <?php endif ?>
            <?php if ($dot[0] < $hoy && $dot[1] > $hoy) : ?>
                <p class="text-center"><b>Segundo Trimestre</p></b>
                <?php formulario(2) ?>
            <?php endif ?>
            <?php if ($trt[0] < $hoy && $trt[1] > $hoy) : ?>
                <p class="text-center"><b>Tercer Trimestre</p></b>
                <?php formulario(3) ?>
            <?php endif ?>
            <?php if ($cut[0] < $hoy && $cut[1] > $hoy) : ?>
                <p class="text-center"><b>Cuarto Trimestre</p></b>
                <?php formulario(4) ?>
            <?php endif ?>
            <br>




        <?php endif ?>




    </div>
    <?php include 'footer.php'; ?>
</body>

</html>