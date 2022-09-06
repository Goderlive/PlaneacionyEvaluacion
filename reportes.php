<?php
session_start();
require_once 'Controllers/ReporteController.php';
if($_SESSION['id_permiso'] == 1 || $_SESSION['id_permiso'] == 4 || $_SESSION['id_permiso'] == 5){?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<body>
    <br>
    <div class="container mx-auto">        
        <nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="actividades.php" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Actividades</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Reportes</span>
                    </div>
                </li>
            </ol>
        </nav>
        <br>
        <div class="text-center">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px">
                    <?=MenuMes($el_mes, $id_area)?>
                </ul>
            </nav>
        </div>           
        <br>

        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Programado Anual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Avance Actual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Programado <?= $meses[$el_mes]?>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reportado <?= $meses[$el_mes]?>
                            </th>
                            <th scope="col" class="px-6 py-3">
                            Reportar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?= Actividades($con, $el_mes, $id_area, $meses, $actividadesDB)?>

                    </tbody>
            </table>
        </div>
    </div>

    <?=Modales($actividadesDB, $meses, $el_mes)?>
<?php include 'footer.php';?>





<?= BotonImprimir($con, $id_area, $el_mes);
?>








</body>
</html>
<?php
}else{
    ?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}
?>
