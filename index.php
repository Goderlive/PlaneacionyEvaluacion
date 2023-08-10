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

    <div class="container text-center mx-auto">
        <br>
        <h3 class="font-bold text-4xl text-gray-800 border-b-3 border-gray-100 p-2 mb-2">Bienvenido(a) <?= $user['nombre'] . " " . $user['apellidos'] ?></h3>
        <br>


        <section class="bg-white dark:bg-gray-900">
            <div class="py-4 px-2 mx-auto max-w-screen-xl">
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                            Actividades
                        </a>
                        <?php if($permisos['nivel'] == 1 || $permisos['nivel'] == 2): ?>
                            <?= AlertaAvancesActividades($con) ?>
                            <?= AlertaReconduccionActividades($con) ?>
                        <?php endif ?>
                        
                        <?php if($permisos['nivel'] <= 4): ?>
                            
                        <?php endif ?>

                    </div>


                    <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                        <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                            Indicadores
                        </a>
                        <?php if($permisos['nivel'] == 1 || $permisos['nivel'] == 2): ?>
                            <?= AlertaAvancesIndicadores($con) ?>
                            <?= AlertaReconduccionIndicadores($con)?>
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