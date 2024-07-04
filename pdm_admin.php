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

        <?php if($_GET): ?>
            <?php $programa = NombrePrograma($con, $_GET['programa']) ?>

        <h3 class="text-3xl my-2 font-bold dark:text-white"><?= $programa['nombre_programa'] ?></h3>

        <p>
            Tema de PDM: <?= $programa['tema_desarrollo'] ?> <br>
            Pilar o Eje: <?= $programa['nombre_pilaoeje'] ?> <br>
            Objetivo del Programa: <?= $programa['objetivo_pp'] ?> <br>
        </p>

        <br>
        <p>Primer Trimestre</p>
        <label for="primer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reporte de Diagnostico Trimestral</label>
        <textarea id="primer" name="primer" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        <button type="submit" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>

        <br>
        <p>Segundo Trimestre</p>
        <label for="primer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reporte de Diagnostico Trimestral</label>
        <textarea id="primer" name="primer" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        <button type="submit" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>

        <br>
        <p>Tercer Trimestre</p>
        <label for="primer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reporte de Diagnostico Trimestral</label>
        <textarea id="primer" name="primer" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        <button type="submit" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>

        <br>
        <p>Cuarto Trimestre</p>
        <label for="primer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reporte de Diagnostico Trimestral</label>
        <textarea id="primer" name="primer" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
        <button type="submit" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>

        <?php endif ?>




    </div>
    <?php include 'footer.php'; ?>
</body>

</html>