<?php
session_start();

if (!$_SESSION['sistema'] == "pbrm") {
    header("Location: login.php");
    die();
} else {
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/reconducciona_Controlador.php';
    include 'Controllers/breadcrumbs.php';
}

if (isset($_POST['id_dependencia'])) {
    $dep = $_POST['id_dependencia'];
}

if ($permisos['nivel'] < 5) {
    if ($permisos['nivel'] == 4) {
        $dep = $permisos['id_dependencia'];
    }
} else {
    print " Tu cuenta no permite realizar esta acción";
    die();
}

$id_usuario = $_SESSION['id_usuario'];
$trimestre = ceil(date('m') / 4);


// Nos permite saber el trimestre
$thismes = ceil(date('m'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconducción de Indiadores</title>
</head>

<body>
    <div class="container mx-auto">

        <br>
        <?= breadcrumbs(array("Inicio" => "index.php", "Mis Reconducciones Actividades" => "mis_reconducciones_actividades.php")) ?>
        <br>


        <br>
        <h3 class="mb-2 center text-2xl font-bold text-gray-900 dark:text-white">Reconducciones de <b>Actividades</b></h3>
        <br>

        <?php if (($rec_pendientes = TraeReconduccionesporvalidar($con, $dep)) || ($rec_validadas = TraeReconduccionesValidadas($con, $dep))) : ?>
            <?php if ($rec_pendientes) : ?>
                <h5 class="text-xl font-bold dark:text-white my-3">Reconducciones Pendientes de Validación</h5>
                <?php foreach ($rec_pendientes as $p) : ?>


                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Area
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        No. Oficio
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Fecha
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                            <tr>
                                <th scope="col" class="py-3 px-6 bg-gray-50">
                                    <?= NombreArea($con, $p['id_area']) ?>
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <?= $p['no_oficio'] ?>
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <?= $p['fecha'] ?>
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <p class="text-yellow-600">Pendiente de Revisión</p>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <table>

                            <?php $programacion = TraeProgramaciones($con, $p['id_reconduccion_actividades']) ?>

                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Nombre Actividad
                                        </th>
                                        <td class="py-4 px-6">
                                            Unidad de Medida
                                        </td>
                                        <td class="py-4 px-6">
                                            Prog Anual Inicial
                                        </td>
                                        <td class="py-4 px-6">
                                            Prog Anual Final
                                        </td>
                                        <td class="py-4 px-6">
                                            Tipo
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($programacion as $q) : ?>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <?= $q['desc_actividad'] ?>
                                            </th>
                                            <td class="py-4 px-6">
                                                <?= $q['u_medida'] ?>
                                            </td>
                                            <td class="py-4 px-6">
                                                <?= SumaAnual($q['programacion_inicial']) ?>
                                            </td>
                                            <td class="py-4 px-6">
                                                <?= SumaAnual($q['programacion_final']) ?>
                                            </td>
                                            <td class="py-4 px-6">
                                                <?= DefineReconduccion($q['programacion_inicial'], $q['programacion_final']) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                    </div>
                    <br>
                <?php endforeach ?>
            <?php endif ?>

            <br><br>
            <h5 class=" mt-5 text-xl font-bold dark:text-white my-3">Reconducciones Realizadas</h5>
            <?php $rec_validadas = TraeReconduccionesValidadas($con, $dep) ?>
            <?php foreach ($rec_validadas as $v) : ?>
                <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Area
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    No. Oficio
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Fecha
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Estado
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                <?= NombreArea($con, $v['id_area']) ?>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <?= $v['no_oficio'] ?>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <?= $v['fecha'] ?>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Validada
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <form action="sources/TCPDF-main/examples/Reconduccion_Actividades.php" method="POST">
                                    <input type="hidden" name="id_reconduccion" value="<?= $v['id_reconduccion_actividades'] ?>">
                                    <button type="submit" formtarget="_blank" value="Imprimir" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="white" stroke-linejoin="round" stroke-width="2" d="M16.4 18H19c.6 0 1-.4 1-1v-5c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h2.6m9.4-7V5c0-.6-.4-1-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                        </svg>
                                    </button>
                                </form>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <table>

                        <?php $programacion = TraeProgramaciones($con, $v['id_reconduccion_actividades']) ?>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <?php //var_dump($q)
                                ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Nombre Actividad
                                    </th>
                                    <td class="py-4 px-6">
                                        Unidad de Medida
                                    </td>
                                    <td class="py-4 px-6">
                                        Prog Anual Inicial
                                    </td>
                                    <td class="py-4 px-6">
                                        Prog Anual Final
                                    </td>
                                    <td class="py-4 px-6">
                                        Tipo
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($programacion as $q) : ?>

                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <?= $q['desc_actividad'] ?>
                                        </th>
                                        <td class="py-4 px-6">
                                            <?= $q['u_medida'] ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?= SumaAnual($q['programacion_inicial']) ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?= SumaAnual($q['programacion_final']) ?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?= DefineReconduccion($q['programacion_inicial'], $q['programacion_final']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                </div>
                <br>
                <br>
            <?php endforeach ?>

        <?php endif ?>



    </div>
    <?php include 'footer.php'; ?>
</body>

</html>