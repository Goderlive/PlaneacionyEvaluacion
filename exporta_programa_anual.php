<?php session_start();
require_once 'models/inicio_modelo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exporta Programa Anual</title>
</head>


<?php


$anioobjetivo = $_SESSION['anio'] + 1;

function Verificador($con, $anioobjetivo)
{
    $stm = $con->query("SELECT * FROM dependencias WHERE anio = $anioobjetivo");
    $existenDependencias = $stm->fetch(PDO::FETCH_ASSOC);
    if ($existenDependencias) {
        return true;
    } else {
        return false;
    }
}

function CreaDependencias($con, $anioobjetivo)
{
    $sql_dependencias = "INSERT INTO dependencias (nombre_dependencia, id_dependencia_gen, anio, tipo, id_administrador, id_seguimiento_dependencia) 
    SELECT nombre_dependencia, id_dependencia_gen, anio, tipo, id_administrador, id_seguimiento_dependencia 
    FROM ante_dependencias
    WHERE anio = $anioobjetivo";
    $agrega_dependencias = $con->prepare($sql_dependencias);
    if ($agrega_dependencias->execute()) {
        return true;
    } else {
        return false;
    }
}


function caInserta


function CreaAreas($con, $anioobjetivo){


    $sentencia = "SELECT * FROM ante_areas WHERE anio = $anioobjetivo";
    $stm = $con->query($sentencia);
    $ante_areas = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach ($ante_areas as $a) {

    }


    $sql_areas = "INSERT INTO areas (nombre_area, id_dependencia, id_dependencia_general, id_dependencia_aux, id_proyecto, fecha_alta, anio) 
    SELECT 
    FROM ante_dependencias";
    $agrega_areas = $con->prepare($sql_areas);
    $agrega_areas->execute();
}


?>





<body>
    <div class="ml-5">
        <?php if (isset($_POST['export_programa_anual'])) : ?>
            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400 mt-5">



                <!-- Lo primero que todo es verificar que no exista nada previo del año anterior -->

                <?php if (Verificador($con, $anioobjetivo) == true) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span>No se cumplen con los requisitos</span>
                    </li>
                    <?php die(); ?>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Se cumplen con los requisitos</span>
                    </li>
                <?php endif ?>


                <!-- Si no murio en el anterior, continuamos con la creacion de dependencias -->


                <?php if (CreaDependencias($con, $anioobjetivo)) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Se han creado las dependencias</span>
                    </li>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>No se crearon las dependencias</span>
                    </li>
                    <?php die(); ?>
                <?php endif ?>

                <?php die(); ?>


                <?php if (CreaAreas($con, $anioobjetivo)) : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>Se han creado las áreas</span>
                    </li>
                <?php else : ?>
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>No se crearon las áreas</span>
                    </li>
                    <?php die(); ?>
                <?php endif ?>

                <?php die(); ?>



            </ul>
        <?php endif ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>