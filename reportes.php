<?php
session_start();
// Primero haremos las validaciones de la vista.


$title = 'Reporte de Actividades'; // Título dinámico
ob_start(); // Iniciar el buffer de salida para capturar el contenido dinámico
require_once 'Controllers/ReporteController.php';
include 'Controllers/breadcrumbs.php';
require_once 'Controllers/CodificadorDecodificadorURLS.php';

$controller = new ReportesController();
$codificadorydecodificador = new CodificadorDecodificadorURLS;
?>




<div class="container mx-auto">

    <?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => "actividades.php", "Reportar" => "actividades.php", $controller->nombre_area => "actividades.php")) ?>

    <br>

    <div class="text-center">
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px">
                <?php
                foreach ($controller->obtenerMeses() as $mes): ?>
                    <li>
                        <form action="reportes.php" method="GET">
                            <input type="hidden" name="id_area" value="<?= $codificadorydecodificador->codificar($controller->id_area); ?>">
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
                    <th scope="col" class="px-2 py-3">
                        #
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Nombre Actividad
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Unidad de Medida
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Anual
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Programado
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Reportado
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Reportar
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($controller->actividades as $a): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <?php $actividad = new ActividadesAvances($a) ?>
                        <td class="px-2 py-3 text-center"><?= $actividad->numero ?></td>
                        <td class="px-2 py-3"><?= $actividad->nombre ?></td>
                        <td class="px-2 py-3 text-center"><?= $actividad->getUnidad() ?></td>
                        <td class="px-2 py-3 text-center"><?= $actividad->programado_anual ?></td>
                        <td class="px-2 py-3 text-center">
                            Mes <?= $controller->mes_upper ?> <br>
                            <?= $actividad->getMesProgramacion($controller->mes) ?> <br>
                            Trimestral<br>
                            <?= $actividad->getTrimestreProgramacion($controller->mes) ?> <br>
                            Acumulado a <?= $controller->mes_upper ?> <br>
                            <?= $actividad->getAcumuladoProgramacion($controller->mes) ?> <br>
                        </td>
                        <td class="px-2 py-3 text-center">
                            Mes <?= $controller->mes_upper ?> <br>
                            <?= $actividad->getAvance($controller->mes) ?> <br>
                            Trimestral <br>
                            <?= $actividad->getAvanceTrimestre($controller->mes) ?> <br>
                            Acumulado a <?= $controller->mes_upper ?> <br>
                            <?= $actividad->getAvanceAcumulado($controller->mes) ?>
                        </td>
                        <td class="px-2 py-3 text-center">Este es Boton</td>
                        </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>














<?php
$content = ob_get_clean(); // Captura el contenido y lo almacena en $content
require 'layout.php'; // Incluye la plantilla base
?>