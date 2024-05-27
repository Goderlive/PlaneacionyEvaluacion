<?php
require_once '../Controllers/qrController.php';

if (isset($_GET['d']) && isset($_GET['t'])) {
    $id_dependencia = $_GET['d'];
    $trimestre = $_GET['t'];
} else {
    print "Por favor escane un codigo QR";
    die();
}



if (!$dependencia = Dependencia($con, $id_dependencia)) {
    print "Información Incorrecta";
    die();
}
$areas = TraeAreas($con, $id_dependencia);

$mes_maximo = $trimestre * 3;
$mes_minimo = $mes_maximo - 2;
$meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$logos = logos($con);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avance trimestral</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <style>

        .logo {
            height: 70px;  /* Ajusta la altura */
            width: auto;   /* Mantiene la proporción de la imagen */
            /* O puedes usar width con un valor fijo */
            /* width: 100px; Ajusta el ancho a 100 píxeles */
        }
    </style>
</head>

<body>



    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center">
                <img src="../<?= $logos['path_logo_ayuntamiento'] ?>" class="logo" alt="Escudo"  />
                <img src="../<?= $logos['path_logo_administracion'] ?>" class="logo" alt="Logo" />
                <b class="ml-3"><?= $dependencia['nombre_dependencia'] ?></b>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Informe Trimestral</a>
                    </li>
                    <li>
                        <a href="../" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>









    <div class="relative overflow-x-auto">
        <br>
        <?php foreach ($areas as $a) : ?>
            <?php $actividades = traeActividades($con, $a['id_area']) ?>
            <h1 class="mb-4 my-6 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-xl dark:text-white text-center"><?= $a['nombre_area'] ?></h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            Nombre Actividad
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Unidad de Medida
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Prog. <?= $meses[$mes_minimo] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Alc. <?= $meses[$mes_minimo] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Evidencia mes <?= $meses[$mes_minimo] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Prog. <?= $meses[$mes_minimo + 1] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Alc. <?= $meses[$mes_minimo + 1] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Evidencia mes <?= $meses[$mes_minimo+1] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Prog. <?= $meses[$mes_maximo] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Alc. <?= $meses[$mes_maximo] ?>
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Evidencias  <?= $meses[$mes_maximo] ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($actividades as $ac) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th class="px-6 py-4">
                                <?= $ac['nombre_actividad'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $ac['unidad'] ?>
                            </td>
                            <td class="px-6 py-4 bg-gray-100">
                                <?= $ac[strtolower($meses[$mes_minimo])] ?>
                            </td>
                            <td class="px-6 py-4 bg-gray-100">
                                <?= traeAvanceActividad($con, $ac['id_actividad'], $mes_minimo)['avance'] ?>
                            </td>
                            <td>
                                <?php if($evid_1 = traeEvidencia($con, $ac['id_actividad'], $mes_minimo)): ?>
                                    <a target="_blank" href="../<?= $evid_1 ?>">
                                        <img src="../<?= $evid_1 ?>" alt="" class="logo">
                                    </a>
                                <?php endif ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $ac[strtolower($meses[$mes_minimo + 1])] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= traeAvanceActividad($con, $ac['id_actividad'], $mes_minimo + 1)['avance'] ?>
                            </td> 
                            <td>
                                <?php if($evid_2 = traeEvidencia($con, $ac['id_actividad'], $mes_minimo+1)): ?>
                                    <a target="_blank" href="../<?= $evid_2 ?>">
                                        <img src="../<?= $evid_2 ?>" alt="" class="logo">
                                    </a>                                <?php endif ?>
                            </td>
                            <td class="px-6 py-4 bg-gray-100">
                                <?= $ac[strtolower($meses[$mes_maximo])] ?>
                            </td>
                            <td class="px-6 py-4 bg-gray-100">
                                <?= traeAvanceActividad($con, $ac['id_actividad'], $mes_maximo)['avance'] ?>
                            </td>
                            <td>
                                <?php if($evid_3 = traeEvidencia($con, $ac['id_actividad'], $mes_maximo)): ?>
                                    <a target="_blank" href="../<?= $evid_3 ?>">
                                        <img src="../<?= $evid_3 ?>" alt="" class="logo">
                                    </a>                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <br>
        <?php endforeach ?>



    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>