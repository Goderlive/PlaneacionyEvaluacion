<?php
session_start();
if (!$_SESSION || $_SESSION['sistema'] != 'pbrm') {
?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';  // Esto solo carga el html de un head
?>
<?php include 'header.php'; // Carga el menu de arriba y la programacion de los permisos
?>
<?php include 'Controllers/breadcrumbs.php'; ?>
<?php include 'Controllers/indicadores_avances_controller.php'; ?>

<?php $trimestre = (isset($_POST['trimestre'])) ? $_POST['trimestre'] : ceil(date('m') / 3); ?>

<body>
    <?php
    if ($permisos['nivel'] != 1 && $permisos['nivel'] != 2) : ?>
        <script>
            window.location.href = 'index.php';
        </script>
    <?php endif ?>
    <div class="container mx-auto">
        <br>
        <?php if (!$_POST) : ?>
            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Valida Indicadores (Dependencias)</span>
                        </div>
                    </li>
                </ol>
            </nav>
        <?php endif ?>


        <?php if (isset($_POST['id_dependencia'])) :
            $nombre_dependencia = TraeNombredependencia($con, $_POST['id_dependencia']) ?>

            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="indicadores_avance.php" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Dependencias</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"><?= $nombre_dependencia ?></span>
                        </div>
                    </li>
                </ol>
            </nav>
        <?php endif ?>
        <br>



        <?php if ($permisos['nivel'] == 1 || $permisos['nivel'] == 2) : // Esta es la primer condicion para los permisos que permiten validar
        ?>
            <?php if (!$_POST) : //Si no hay un post va a elistar las dependencias que nos corresponden segun el permiso
                $dependencias = TraeDependenciasController($con, $permisos); ?>
                <div class="grid grid-cols-4">
                    <?php foreach ($dependencias as $dp) : ?>
                        <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $dp['nombre_dependencia'] ?> </h5>
                            <br>
                            <form action="" method="post">
                                <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_dependencia" value="<?= $dp['id_dependencia'] ?>">
                                    Ver Indicadores
                                </button>
                            </form>
                            <br>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>


            <?php if (isset($_POST['id_dependencia'])) :  //Aqui validamos el area 
            ?>
                <?php $id_dependencia = $_POST['id_dependencia'] ?>
                <div class="text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex -space-x-px">
                            <?= MenuTrimestre($id_dependencia, $trimestre); ?>
                        </ul>
                    </nav>
                </div>
                <br>
                <div class="relative overflow-x-auto shadow-md sm:rounded-md">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-3">
                                    Nombre Indicador
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Variables
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Unidad de Medida
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Frecuencia
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Trimestre <?= $trimestre ?>
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Reportado
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Anual
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Accion
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $ta = TextoTrimestre($trimestre) ?>
                            <?php $indicadores = Indicadores($con, $trimestre, $id_dependencia, $permisos);
                            if ($indicadores) :
                                foreach ($indicadores as $datos) : ?>

                                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-2 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <?= $datos['id'] ?>
                                        </th>
                                        <td class="px-2 py-4">
                                            <?= $datos['nombre']; ?>
                                        </td>
                                        <td class="px-2 py-4" align="left">
                                            <?= "- " . $datos['variable_a'] . "<br>" ?>
                                            <?= "- " . $datos['variable_b'] ?>
                                            <?php if ($datos['variable_c']) {
                                                print "<br>- " . $datos['variable_c'];
                                            } ?>
                                        </td>
                                        <td class="px-2 py-4">
                                            <?= $datos['umedida_a'] . "<br>" ?>
                                            <?= $datos['umedida_b'] ?>
                                            <?php if ($datos['umedida_c']) {
                                                print $datos['umedida_c'];
                                            } ?>
                                        </td>
                                        <td class="px-2 py-4">
                                            <?= $datos['periodicidad']; ?>
                                        </td>
                                        <td class="px-2 py-4">
                                            <?= $datos[$ta[0]] . "<br>" . $datos[$ta[1]]; ?>
                                        </td>
                                        <td align="center">
                                            <?= botonavances($con, $datos['id'], $trimestre); ?>
                                        </td>
                                        <td class="px-2 py-4">
                                            <?php print $datos['at1'] + $datos['at2'] + $datos['at3'] + $datos['at4'] . "<br>" . $datos['bt1'] + $datos['bt2'] + $datos['bt3'] + $datos['bt4'];
                                            if ($datos['ct1']) {
                                                print "<br>" . $datos['at1'] + $datos['at2'] + $datos['at3'] + $datos['at4'];
                                            }
                                            ?>
                                        </td>
                                        <td class="px-2 py-4 text-center">

                                            <?= CreaBotones($datos['id'], $trimestre, $con) ?>
                                        </td>
                                    </tr>


                                <?php endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            <?php endif ?>



        <?php endif //Termina el IF de los permisos de los validadores 
        ?>











        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    </div>
</body>

</html>