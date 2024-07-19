<?php
if (!isset($_SESSION['sistema']) == "pbrm") {
?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
} else {

    $id_usuario = $_SESSION['id_usuario'];
    require_once 'models/inicio_modelo.php';
    $permisos = getPermisos($con, $_SESSION);
    $mi_permiso = $_SESSION['nivel'];
    $aniosiguiente = intval(date('Y') + 1);
    $ajustes = traeAjustes($con, $_SESSION['anio']);

    // Aqui estan las variables de los Menus
    $actual = $_SERVER['PHP_SELF'];
    $actual = substr($actual, 1,);
    $actual = explode('/', $actual);
    $actual = $actual[count($actual) - 1];

    $inicio = array("index.php", "mi_perfil.php", "mis_areas.php", "mis_formatos.php", "ajustes.php", "unidades_medida.php", "administra_usuarios.php", "revisa_avances.php", "captura_trimestral.php");
    $actividades = array("actividades.php", "reconduccion_actividades.php", "actividades_todas.php", "formatos_actividades.php", "reportes.php", "reportes_cont.php", "programacion_actividades.php", "mis_reconducciones_actividades.php");
    $valida_actividades = array("validaediciones.php", "reconduccion_actividades.php", "actividades_avances.php", "admin_formatos_actividades.php");
    $indicadores = array("indicadores.php", "reconduccion_indicadores.php", "matrices.php", "formatos_indicadores.php");
    $valida_indicadores = array("indicadores.php", "reconduccion_indicadores.php", "matrices.php", "formatos_indicadores.php", "indicadores_avance.php", "admin_formatos_actividades_i.php");
    $pdm = array("pdm_admin.php");
    $anteproyecto = array("anteproyecto.php");


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


    $menuProyecto = DefineEstatusProyecto($ajustes);





    if (in_array($actual, $inicio)) {
        $titulo_menu = "Inicio";
    } elseif ($actual == $actividades) {
        $titulo_menu = "Actividades";
    } elseif ($actual == $indicadores) {
        $titulo_menu = "Indicadores";
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
    function item_principal($actual, $buscador, $texto, $destino, $permisos, $mi_permiso)
    {
        if (in_array($mi_permiso, $permisos)) {
            $tipo = (in_array($actual, $buscador)) ? 'class="py-6 pr-4 pl-3 text-white bg-gray-200 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"' : 'class="py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"';
            return '<li><a href="' . $destino . '"' . $tipo . '>' . $texto . '</a></li>';
        }
    } ?>




    <header>
        <nav class="bg-gray-100 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <a href="index.php" class="flex items-center">
                    <img src="img/logo_simonts.png" class="mr-6 h-6 sm:h-9" alt="SIMONTS" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"></span>
                </a>
                <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

                </button>
                <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="index.php" class="text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page"><?php
                                                                                                                                                                                                                                                                                                                                                    $dependencia = get_usuario($id_usuario, $con);
                                                                                                                                                                                                                                                                                                                                                    if (isset($dependencia['nombre_dependencia'])) {
                                                                                                                                                                                                                                                                                                                                                        print($dependencia['nombre_dependencia']);
                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                        print "Admin";
                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                    ?></a>
                        </li>
                        <?= item_principal($actual, $inicio, "Inicio", "index.php", array(1, 2, 3, 4, 5), $mi_permiso) ?>
                        <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) : ?>
                            <?= item_principal($actual, $anteproyecto, "AnteProyecto", "anteproyecto.php", array(1, 2, 3), $mi_permiso) ?>
                        <?php endif ?>
                        
                        <?php if ($_SESSION['rol'] == 3) : ?>
                            <?= item_principal($actual, $anteproyecto, $menuProyecto, "anteproyecto.php", array(4), $mi_permiso) ?>
                        <?php endif ?>

                        <?= item_principal($actual, $pdm, "PDM", "pdm_admin.php", array(1,2,3,4), $mi_permiso) ?>
                        <?= item_principal($actual, $actividades, "Actividades", "actividades.php", array(3, 4, 5), $mi_permiso) ?>
                        <?= item_principal($actual, $valida_actividades, "Valida Actividades", "actividades_avances.php", array(1, 2), $mi_permiso) ?>
                        <?= item_principal($actual, $indicadores, "Indicadores", "indicadores.php", array(3, 4, 5), $mi_permiso) ?>
                        <?= item_principal($actual, $valida_indicadores, "Valida Indicadores", "indicadores_avance.php", array(1, 2), $mi_permiso) ?>
                        <button id="dropdownNavbarButton" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Mas <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <?php if (in_array($actual, $inicio)) : ?>
                            <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                                    <?= item_context("mi_perfil.php", "Mi Perfil", array(1, 2, 3, 4, 5), $mi_permiso) ?>
                                    <?= item_context("mis_areas.php", "Mis Áreas", array(1, 2, 3, 4), $mi_permiso) ?>
                                    <?= item_context("mis_formatos.php", "Mis Formatos", array(1, 2, 3, 4), $mi_permiso) ?>
                                    <?= item_context("ajustes.php", "Ajustes", array(1, 2), $mi_permiso) ?>
                                    <?= item_context("unidades_medida.php", "Unidades de Medida", array(1, 2), $mi_permiso) ?>
                                    <?= item_context("captura_trimestral.php", "Formatos para Captura Trimestral", array(1, 2), $mi_permiso) ?>
                                </ul>
                            </div> <?php endif ?>
                        <?php if (in_array($actual, $actividades)) : ?>
                            <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                                    <?= item_context("actividades.php", "Actividades por Área", array(1, 2, 3, 4, 5), $mi_permiso) ?>
                                    <?php
                                    if ($mi_permiso != 5) {
                                        echo item_context("reconduccion_actividades.php", "Reconducción de Actividades", array(1, 2, 3, 4, 5), $mi_permiso);
                                        echo item_context("formatos_actividades.php", "Impresion Formatos", array(1, 2, 3, 4, 5), $mi_permiso);
                                        echo item_context("actividades_todas.php", "Todas las Actividades", array(1, 2, 3, 4, 5), $mi_permiso);
                                    }
                                    ?>
                                </ul>
                            </div> <?php endif ?>
                        <?php if (in_array($actual, $valida_actividades)) : // Validador
                        ?>
                            <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                                    <?= item_context("actividades.php", "Actividades por Área", array(1, 2, 3, 4, 5), $mi_permiso) ?>
                                    <?php
                                    if ($mi_permiso != 5) {
                                        echo item_context("reconduccion_actividades.php", "Reconducciónes de Actividades", array(1, 2, 3, 4), $mi_permiso);
                                        echo item_context("admin_formatos_actividades.php", "Formatos Impresos", array(1, 2), $mi_permiso);
                                    }
                                    ?>
                                </ul>
                            </div> <?php endif ?>
                        <?php if (in_array($actual, $indicadores)) : ?>
                            <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                                    <?= item_context("indicadores.php", "Reportar Indicadores", array(1, 2, 3, 4, 5), $mi_permiso) ?>
                                    <?= item_context("matrices.php", "Mis Matries", array(1, 2, 3, 4), $mi_permiso) ?>
                                    <?= item_context("reconduccion_indicadores.php", "Reconducción de Indicadores", array(1, 2, 3, 4), $mi_permiso) ?>
                                    <?= item_context("formatos_indicadores.php", "Imprime Formatos", array(1, 2, 3, 4), $mi_permiso) ?>
                                    <?= item_context("indicadores_todos.php", "Todos los Indicadores", array(1, 2, 3, 4), $mi_permiso) ?>
                                </ul>
                            </div> <?php endif ?>
                        <?php if (in_array($actual, $valida_indicadores)) : ?>
                            <div id="dropdownNavbar" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                                    <?= item_context("reconduccion_indicadores.php", "Reconducción de Indicadores", array(1, 2, 3, 4), $mi_permiso) ?>
                                    <?= item_context("formatos_indicadores.php", "Formatos Impresos", array(3, 4), $mi_permiso) ?>
                                    <?= item_context("admin_formatos_actividades_i.php", "Formatos Impresos", array(1, 2), $mi_permiso)  ?>

                                </ul>
                            </div> <?php endif ?>
                        <a href="logout.php"><svg class="w-6 h-6 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<?php } ?>