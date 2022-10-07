<?php
session_start();
require_once 'Controllers/ReporteController.php';
if($_SESSION['id_permiso'] == 1 || $_SESSION['id_permiso'] == 4 || $_SESSION['id_permiso'] == 5){?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'Controllers/breadcrumbs.php';?>
<body>
    <br>
    <div class="container mx-auto">
<?php $area =  NombreArea($con, $actividadesDB[0]['id_area']) ?>
<?= breadcrumbs(array("Inicio"=> "index.php", "Actividades"=> "actividades.php", "Reportar"=>"", $area => ""))?>
        
        <br>
        <h2 class="text-2xl font-extrabold dark:text-white"></h2>
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

    <?= Modales($actividadesDB, $el_mes)?>
    <br>
    <?= ModalesEvidencias($con, $actividadesDB, $el_mes)?>    
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
