<?php
session_start();
if (!$_SESSION) { ?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}
if (!$_SESSION['sistema'] == 'pbrm') : ?>
    <script>
        alert("ya te hubiera sacado");
        window.location.href = 'login.php';
    </script>

<?php endif;
require_once 'Controllers/reportes_actividades_Controller.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<?php include 'Controllers/breadcrumbs.php'; ?>

<body>

    <div class="container mx-auto"><!--Este es el contenedor principal -->

        <br>
        <?= breadcrumbs(array("Inicio" => "index.php", "Imprime Formatos" => "")) ?>
        <br>

        <h3 class="text-3xl font-bold dark:text-white">Formatos Internos</h3>
        <br>


        <?php if ($permisos['nivel'] <= 2 && !$_POST) :
            $dependencias = TraeTodasDepencias($con); ?> <!-- Si no tenemos dependencia, somos admins y podemos ver todos los formatos -->
            <div class="grid grid-cols-4">
                <?php foreach ($dependencias as $dependencia) : ?>
                    <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $dependencia['nombre_dependencia'] ?> </h5>
                        <form action="formatos_actividades.php" method="POST">
                            <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_dependencia" value="<?= $dependencia['id_dependencia'] ?>">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg> Areas
                            </button>
                        </form>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <?php if ($permisos['id_dependencia'] || $_POST) : ?>
            <?php $setings = traeSettings($con, $_SESSION['anio']); ?>
            <?php if ($setings['enlaces_08c'] == 1) : ?>
                <!-- Si tenemos post y un Id_dependencia, ya tenemos de que queremos ver, mostramos las areas de las que podemos imprimir formatos  -->
                <div class="grid grid-cols-4">
                    <?php
                    if (isset($permisos['id_dependencia'])) {
                        $id_dependencia = $permisos['id_dependencia'];
                    } else {
                        $id_dependencia = $_POST['id_dependencia'];
                    }


                    $areas = TraeAreasDependencias($con, $id_dependencia) ?>

                    <?php foreach ($areas as $area) : ?>
                        <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $area['nombre_area'] ?> </h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Seleccione el Trimestre a Imprimir.</p>
                            <?php if (TieneDirector($con, $id_dependencia) && TienePuestoMedio($con, $area['id_area'])) : ?>
                                <form action="sources/TCPDF-main/examples/08c.php" method="POST">
                                    <input type="hidden" name="id_area" value="<?= $area['id_area'] ?>">
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <?= Botones($con, $area['id_area']) ?>
                                    </div>
                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                        <?= BotonesFirmados($con, $area['id_area']) ?>
                                    </div>
                                </form>
                            <?php else : ?>
                                <a href="mis_areas.php" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Necesitas Registrar Encargado</a>
                            <?php endif ?>
                        </div>

                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endif ?>





        <?php if ($permisos['id_dependencia'] || $_POST) : ?>
            <?php $setings = traeSettings($con, $_SESSION['anio']); ?>
            <?php if ($setings['fuat'] == 1) : ?>
                <!-- Si tenemos post y un Id_dependencia, ya tenemos de que queremos ver, mostramos las areas de las que podemos imprimir formatos  -->
                <div class="grid grid-cols-1">
                    <?php
                    if (isset($permisos['id_dependencia'])) {
                        $id_dependencia = $permisos['id_dependencia'];
                    } else {
                        $id_dependencia = $_POST['id_dependencia'];
                    } ?>
                    <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">FUAT</p>
                        <?php if (TieneDirector($con, $id_dependencia)) : ?>


                            <?php if (verificaFuat($con, $permisos)) : ?>
                                <?php if ($permisos['id_dependencia']) : ?>
                                    <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div class="ml-3 text-sm font-medium">
                                            <form action="sources\TCPDF-main\examples\FUAT.php" method="post">
                                                Felicidades! Ya puedes imprimir tu Formato Único Trimestral correspondiente al 4to Trimestre.
                                                <input type="hidden" name="id_dependencia" value="<?= $permisos['id_dependencia'] ?>">
                                                <input type="hidden" name="trimestre" value="4">
                                                <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z" />
                                                        <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>



                        <?php else : ?>
                            <a href="mis_areas.php" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Necesitas Registrar Encargado</a>
                        <?php endif ?>
                    </div>

                </div>
            <?php endif ?>
        <?php endif ?>



        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <br>
            <h3 class="text-3xl font-bold dark:text-white">Formatos OSFEM Firmados</h3>

            <br>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg my'3">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Dependencia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                1er T
                            </th>
                            <th scope="col" class="px-6 py-3">
                                2do T
                            </th>
                            <th scope="col" class="px-6 py-3">
                                3er T
                            </th>
                            <th scope="col" class="px-6 py-3">
                                4to T
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $dependencia['nombre_dependencia'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php if ($formato = traeporDependenciasytrim($con, $id_dependencia, 1)) : ?>
                                    <?php $dir = substr($formato['dir_formatoactividades'], 3) ?>
                                    <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                                <?php else : ?>
                                    Aún no subimos esta información
                                <?php endif ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if ($formato = traeporDependenciasytrim($con, $id_dependencia, 2)) : ?>
                                    <?php $dir = substr($formato['dir_formatoactividades'], 3) ?>
                                    <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                                <?php else : ?>
                                    Aún no subimos esta información
                                <?php endif ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if ($formato = traeporDependenciasytrim($con, $id_dependencia, 3)) : ?>
                                    <?php $dir = substr($formato['dir_formatoactividades'], 3) ?>
                                    <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                                <?php else : ?>
                                    Aún no subimos esta información
                                <?php endif ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if ($formato = traeporDependenciasytrim($con, $id_dependencia, 4)) : ?>
                                    <?php $dir = substr($formato['dir_formatoactividades'], 3) ?>
                                    <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                                <?php else : ?>
                                    Aún no subimos esta información
                                <?php endif ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </div><!-- Fin del contenedor principal -->
            <?php include 'footer.php'; ?>
</body>

</html>