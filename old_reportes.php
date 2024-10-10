<!DOCTYPE html>
<html lang="es">
<?php include 'head.php'; ?>
<?php include 'header.php';
require_once 'Controllers/ReporteController.php'; ?>
<?php include 'Controllers/breadcrumbs.php'; 

?>

    <body>
        <br>
        <div class="container mx-auto">
            <?php $area =  NombreArea($con, $actividadesDB[0]['id_area']) ?>
            <?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => "actividades.php", "Reportar" => "actividades.php", $area => "actividades.php")) ?>

            <br>

            <div class="text-center">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px">
                        <?php
                        $meses = $controller->obtenerMeses($el_mes); // Obtenemos los meses desde el controlador
                        foreach ($meses as $mes): ?>
                            <li>
                                <form action="reportes.php" method="POST">
                                    <input type="hidden" name="id_area" value="<?php echo $id_area; ?>">
                                    <button name="mes" value="<?php echo $mes['valor']; ?>"
                                        class="py-2 px-3 <?php echo $mes['activo'] ? 'text-blue-600 bg-blue-50' : 'text-gray-500 bg-white'; ?> border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <?php echo $mes['mes']; ?>
                                    </button>
                                </form>
                            </li>
                        <?php endforeach; ?>
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
                                Programado <?= $meses[$el_mes] ?>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reportado <?= $meses[$el_mes] ?>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reportar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($actividadesDB as $a):
                            $avance = AvanceMes($con, $a['id_actividad'], $el_mes);


                            $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
                            $mesi = strtolower($meses[$mes]);

                            $botones = ValidaBotones($con, $mes, $avance, $a['codigo_actividad'], $a['id_actividad']);
                            $avance = barraAvance($con, $a['id_actividad'], $mes);

                            $avanceThisMes = AvanceThisMes($con, $a['id_actividad'], $mes);
                            $avanceThisMes = ($avanceThisMes) ? $avanceThisMes['avance'] : "";

                            $botonAvance = BotonAvance($avanceThisMes, $a['id_actividad']);

                            if ($a['id_unidad']) {
                                $unidad = $unidades[$a['id_unidad'] - 1]['nombre_unidad'];
                            } else {
                                $unidad = $a['unidad'];
                            }
                        ?>
                            <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <?= $a['codigo_actividad'] ?></th>
                                <td class="px-6 py-4"><?= $a['nombre_actividad'] ?></td>
                                <td class="px-6 py-4"><?= $unidad ?></td>
                                <td class="px-6 py-4"><?= $anual ?></td>
                                <td class="px-6 py-4"><?= $avance ?></td>
                                <td class="px-6 py-4"><?= $a[$mesi] ?></td>
                                <td class="px-6 py-4 text-center"> <?= $botonAvance ?></td>
                                <td class="px-6 py-4 text-right"><?= $botones ?></td>
                            </tr>

                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>

        <?= Modales($con, $actividadesDB, $el_mes, $permisos) ?>
        <br>
        <?= ModalesEvidencias($con, $actividadesDB, $el_mes) ?>
        <?= BotonImprimir($con, $id_area, $el_mes) ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    </body>

</html>