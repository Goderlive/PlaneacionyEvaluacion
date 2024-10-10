<?php
require_once 'models/conection.php';


function traeAjustes($con, $anio)
{
    $stm = $con->query("SELECT * FROM setings WHERE year_report = $anio");
    $ajustes = $stm->fetch(PDO::FETCH_ASSOC);
    return $ajustes;
}


function item_context($destino, $texto, $permisos, $mi_permiso)
{
    if (in_array($mi_permiso, $permisos)) {
        return '
        <li>
            <a href="' . $destino . '" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">' . $texto . '</a>
        </li>
    ';
    }
}


function item_principal($texto, $destino, $permisos, $mi_permiso)
{
    if (in_array($mi_permiso, $permisos)) {
        return '<li><a href="' . $destino . '">' . $texto . '</a></li>';
    }
}


function DefineEstatusProyecto($ajustes)
{
    $hoy = date('Y') . date('m') . date('d');

    $ante = json_decode($ajustes['anteproyectoFechas']);
    $anteinicio = $ante[0];
    $antefin = $ante[1];

    $proyecto = json_decode($ajustes['proyectoFechas']);
    $proyectoinicio = $proyecto[0];
    $proyectofin = $proyecto[1];

    $programa = json_decode($ajustes['programaAFechas']);
    $programainicio = $programa[0];
    $programafin = $programa[1];


    if ($hoy >= $programainicio && $hoy <= $programafin) { // En caso de pro
        return "Programa";
    } elseif ($hoy >= $proyectoinicio && $hoy <= $proyectofin) {
        return "Proyecto";
    } elseif ($hoy >= $anteinicio && $hoy <= $antefin) {
        return "AnteProyecto";
    }
}


$ajustes = traeAjustes($con, $_SESSION['anio']);
$menuProyecto = DefineEstatusProyecto($ajustes);


?>


<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/logo_simonts.png" class="mr-6 h-6 sm:h-9" alt="SIMONTS" />
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Abrir menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <?= item_principal("Inicio", "index.php", array(1, 2, 3, 4, 5), $_SESSION['nivel']) ?>
                <?= item_principal("AnteProyecto", "anteproyecto.php", array(1, 2), $_SESSION['nivel']) ?>
                <?= item_principal($menuProyecto, "anteproyecto.php", array(4), $_SESSION['nivel']) ?>

                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar1" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Actividades <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar1" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <?= item_context("actividades.php", "Reporte Actividades", array(4, 5), $_SESSION['nivel']) ?>
                            <?= item_context("reconduccion_actividades.php", "Reconducción de Actividades", array(4, 5), $_SESSION['nivel']) ?>
                            <?= item_context("formatos_actividades.php", "Formatos Impresos", array(4, 5), $_SESSION['nivel']) ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Indicadores <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar2" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <?= item_context("indicadores.php", "Reporte Indicadores", array(4, 5), $_SESSION['nivel']) ?>
                            <?= item_context("reconduccion_indicadores.php", "Reconducción de Indicadores", array(4, 5), $_SESSION['nivel']) ?>
                            <?= item_context("formatos_indicadores.php", "Formatos Impresos", array(4, 5), $_SESSION['nivel']) ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="logout.php">
                        <svg class="w-6 h-6 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>