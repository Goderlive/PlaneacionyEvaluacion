<?php
session_start();

if ($_SESSION['sistema'] == "pbrm") :
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/ajustes_controller.php';
    include 'Controllers/breadcrumbs.php';

    if ($permisos['nivel'] > 3) {
        header("Location: ../index.php");
    }
    ob_start();

?>
    <!DOCTYPE html>
    <html lang="es">

    <body>
        <div class="container text-center mx-auto">
            <br>
            <?= breadcrumbs(array("Inicio" => "index.php", "Ajustes" => "ajustes.php")); ?>
            <br>
            <br>
            <h2 class="mx-3 text-2xl font-bold dark:text-white mr-auto">Nombre y Numero de Ente Público</h2>
            <br>
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr style="text-align: center;" class="bg-white dark:bg-gray-800 dark:border-gray-700 ">
                        <td>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nombre_municipio">Nombre del Municipio</label>
                        </td>
                        <td>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="numero_municipio">Número Ente Público</label>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" class="px-6 py-4">
                            <input type="text" name="nombre_municipio" id="nombre_municipio" value="<?= $ajustes['nombre_ente'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </td>
                        <td style="text-align: center;" class="px-6 py-4">
                            <input type="number" name="numero_municipio" id="numero_municipio" value="<?= $ajustes['numero_ente'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="mb-4">
                    <br>
                    <button type="submit" class="mb-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                </div>
            </form>


            <div class="border-b mb-4"></div>
            <br>
            <h2 class="mx-3 text-2xl font-bold dark:text-white mr-auto">Logotipo Principal Inicio (JPG o PNG) </h2>
            <h2 class="mx-3 text-xl font-bold dark:text-white mr-auto">Todos los años</h2>
            <br>
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        <input type="hidden" name="logo_principal" value="logo_principal">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td style="text-align: center;" class="px-6 py-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="path_logo_ayuntamiento">Seleccionar Logotipo (Alca calidad)</label>
                                <input type="file" required name="imagen_principal" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                                <br><button type="submit" name="logos" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <br>
            <h2 class="mx-3 text-2xl font-bold dark:text-white mr-auto">Escudo Ayuntamiento</h2>
            <h2 class="mx-3 text-xl font-bold dark:text-white mr-auto">Año <?= $ajustes['year_report'] ?></h2>
            <br>

            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        <input type="hidden" name="escudo" value="escudo">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td style="text-align: center;" class="px-6 py-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="escudo_municipio">Seleccionar Logotipo (200 px)</label>
                                <input type="file" required name="escudo_municipio" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                                <br><button type="submit" name="logos" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <br>
            <h2 class="mx-3 text-2xl font-bold dark:text-white mr-auto">Logo Administración</h2>
            <h2 class="mx-3 text-xl font-bold dark:text-white mr-auto">Año <?= $ajustes['year_report'] ?></h2>
            <br>

            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        <input type="hidden" name="logo" value="logo">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td style="text-align: center;" class="px-6 py-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="path_logo_administracion">Seleccionar Logotipo (200 px)</label>
                                <input type="file" required name="path_logo_administracion" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                                <br><button type="submit" name="logos" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </div>
        <br>
        <br>
        <h2 class="mx-3 text-2xl font-bold dark:text-white mr-auto">Puestos de importancia para impresión de formatos</h2>
        <h2 class="mx-3 text-xl font-bold dark:text-white mr-auto">Año <?= $ajustes['year_report'] ?></h2>
        <br>
        <!-- Primero vamos a revisar los puestos mas importantes. -->
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nombre
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Puesto
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody> <!-- Como solo son 2 puestos lo haremos "A mano" -->
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"> <!-- Perimero la UIPPE -->
                        <?php
                        $id_uippe = (isset($ajustes['id_uippe']) && $ajustes['id_uippe'] != "" ? $ajustes['id_uippe'] : "");
                        $uippe = ($id_uippe) ? TraerUippe($con, $id_uippe) : "" ?>
                        <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-3">
                                <?php if ($uippe) : ?>
                                    <div class="text-base font-semibold"><?= $uippe['nombre'] . " " . $uippe['apellidos'] ?></div>
                                    <div class="font-normal text-gray-500"><?= $uippe['cargo'] ?></div>
                                <?php endif ?>
                            </div>
                        </th>
                        <td class="py-4 px-6">
                            Director de la UIPPE o Equivalente
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <?php if (!$uippe) : ?>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModaluippe">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                        </svg> Agregar
                                    </button>
                                <?php else : ?>
                                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        <input type="hidden" name="uippe" value="true">
                                        <input type="submit" name="delete" value="Eliminar" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    </form>
                                <?php endif ?>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"> <!-- Luego la Tesoreria -->
                        <?php
                        $id_tesoreria = (isset($ajustes['id_tesoreria']) && $ajustes['id_tesoreria'] != "" ? $ajustes['id_tesoreria'] : "");
                        $tesoreria = ($id_tesoreria) ? TraerTesoreria($con, $id_tesoreria) : "" ?>
                        <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-3">
                                <?php if ($tesoreria) : ?>
                                    <div class="text-base font-semibold"><?= $tesoreria['nombre'] . " " . $tesoreria['apellidos'] ?></div>
                                    <div class="font-normal text-gray-500"><?= $tesoreria['cargo'] ?></div>
                                <?php endif ?>
                            </div>
                        </th>
                        <td class="py-4 px-6">
                            Tesorero Municipal o Equivalente
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <?php if (!$tesoreria) : ?>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModalteso">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                        </svg> Agregar
                                    </button>
                                <?php else : ?>
                                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        <input type="hidden" name="id_teso" value="true">
                                        <input type="submit" name="delete" value="Eliminar" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    </form>
                                <?php endif ?>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <hr class="my-8 h-px bg-gray-200 border-0 dark:bg-gray-700">
        <h2 class="text-2xl font-bold dark:text-white mr-auto">Fechas: Anteproyecto / Proyecto / Programa Anual</h2>
        <br>
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nombre
                        </th>
                        <th colspan="2" scope="col" class="py-3 px-6">
                            Fecha Inicio
                        </th>
                        <th colspan="2" scope="col" class="py-3 px-6">
                            Fecha Fin
                        </th>
                        <th>
                            Acción
                        </th>
                    </tr>

                </thead>

                <tbody>
                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <?php
                        if ($ajustes["anteproyectoFechas"]) :
                            $anteproyecto = SeparadorFechas($ajustes["anteproyectoFechas"]);
                        endif ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Anteproyecto
                            </th>
                            <td class="py-4 px-6">
                                <?= DayPiker($anteproyecto[0], 1) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= MontPiker($anteproyecto[1], 1) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= DayPiker($anteproyecto[2], 2) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= MontPiker($anteproyecto[3], 2) ?>
                            </td>
                            <td>
                                <br>
                                <button type="submit" name="anteproyecto" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                            </td>
                        </tr>
                    </form>
                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <?php
                        if ($ajustes["anteproyectoFechas"]) :
                            $anteproyecto = SeparadorFechas($ajustes["proyectoFechas"]);
                        endif ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Proyecto
                            </th>
                            <td class="py-4 px-6">
                                <?= DayPiker($anteproyecto[0], 1) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= MontPiker($anteproyecto[1], 1) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= DayPiker($anteproyecto[2], 2) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= MontPiker($anteproyecto[3], 2) ?>
                            </td>
                            <td>
                                <br>
                                <button type="submit" name="proyecto" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                            </td>
                        </tr>
                    </form>
                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <?php
                        if ($ajustes["programaAFechas"]) :
                            $programa = SeparadorFechas($ajustes["programaAFechas"]);
                        endif ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Programa
                            </th>
                            <td class="py-4 px-6">
                                <?= DayPiker($programa[0], 1) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= MontPiker($programa[1], 1) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= DayPiker($programa[2], 2) ?>
                            </td>
                            <td class="py-4 px-6">
                                <?= MontPiker($programa[3], 2) ?>
                            </td>
                            <td>
                                <br>
                                <button type="submit" name="programa" class="py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>




        <!-- Modal UIPPE -->
        <!-- Main modal -->
        <div id="defaultModaluippe" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Agrega un Director de UIPPE o Equivalente
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModaluippe">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <?php
                        $titulares = TraeDirectores($con);
                        ?>
                        Elige entre las opciones existentes <br>
                        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                            <select name="id_uippe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <?=
                                ListadeTitulares($titulares); ?>
                                </datalist>
                                <br>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <input type="submit" name="agregar" class="my-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Agregar">
                        <button data-modal-toggle="defaultModaluippe" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal TESO -->
        <!-- Main modal -->
        <div id="defaultModalteso" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Agrega un Tesorero o Equivalente
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModalteso">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <?php
                        $titulares = TraeDirectores($con);
                        ?>
                        Elige entre las opciones existentes <br>
                        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                            <select name="id_teso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <?=
                                ListadeTitulares($titulares); ?>
                                </datalist>
                                <br>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <input type="submit" name="agregar" class="my-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Agregar">
                        <button data-modal-toggle="defaultModalteso" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>




        <?php include 'footer.php'; ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </body>
<br><br>
    </html>
    <?php
// Termina el buffer de salida y envía el contenido
ob_end_flush();
?>
<?php else : ?>

    <script>
        window.location.href = 'login.php';
    </script>
<?php endif ?>