<?php
session_start();
if (isset($_SESSION) && $_SESSION['sistema'] && $_SESSION['sistema'] == "pbrm") {
    require_once 'models/actividades_avances_modelo.php';
    include 'header.php';
    include 'Controllers/breadcrumbs.php';
    include 'head.php';
} else {
    header("Location: ../index.php");
}

$id_usuario = $_SESSION['id_usuario'];
$id_avance = $_POST['id_avance'];
?>
<!DOCTYPE html>
<html lang="es">

<body>

    <?php $localidades = TraeLocalidades($con); ?>
    <?php $avance = TraeAvance($con, $id_avance) ?>
    <?php $actividad = TraeActividad($con, $avance['actividad']) ?>
    <?php $anual = $actividad['enero'] + $actividad['febrero'] + $actividad['marzo'] + $actividad['abril'] + $actividad['mayo'] + $actividad['junio'] + $actividad['julio'] + $actividad['agosto'] + $actividad['septiembre'] + $actividad['octubre'] + $actividad['noviembre'] + $actividad['diciembre'] ?>
    <?php $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");



    function tiempos($dato_timestamp)
    {
        $hora_actual = date('Y-m-d H:i:s');
        $timestamp_bd = strtotime($dato_timestamp);
        $diferencia = time() - $timestamp_bd;
        $dias_diferencia = floor($diferencia / (60 * 60 * 24));
        $horas_diferencia = floor(($diferencia % (60 * 60 * 24)) / 3600);
        $minutos_diferencia = floor(($diferencia % 3600) / 60);

        // Imprime el resultado
        echo "Reportado hace:\n";
        if ($dias_diferencia != 0) {
            if ($dias_diferencia > 1) {
                echo $dias_diferencia . ' días, ';
            } else {
                echo $dias_diferencia . ' día, ';
            }
        }
        if ($horas_diferencia != 0) {
            if ($horas_diferencia > 1) {
                echo $horas_diferencia . ' horas, ';
            } else {
                echo $horas_diferencia . ' hora, ';
            }
        }
        echo $minutos_diferencia . " minutos";
    }


    function localidades($locasa, $localidades)
    {
        $locas = explode(",", $locasa);
        foreach ($locas as $loca) {
            print $localidades[$loca - 1]['nombre_localidad'] . "<br>";
        }
    }

    function Imagenes($a)
    {
        $img = substr($a, 3);
        if ($img) {
            return $img;
        }
    }

    function imgsmall($data)
    {
        $img = Imagenes($data);
        if ($img) {
            return '<img src="' . $img . '" alt="evidencia" width="150" height="150">';
        } else {
            return "Sin Evidencia";
        }
    }

    function imgmd($data)
    {
        $img = Imagenes($data);
        if ($img) {
            return '<img src="' . $img . '" alt="evidencia" style="max-width: 150px; max-height: 150px;">';
        }
    }
    ?>


    <div class="container text-center mx-auto">

        <br>
        <?= breadcrumbs(array("Inicio" => "index.php", "Valida Ediciones" => "")) ?>
        <br>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6" align="center">
                    Nombre de la Meta de Actividad
                </th>
                <th scope="col" class="py-3 px-6" align="center">
                    U d M
                </th>
                <th scope="col" class="py-3 px-6" align="center">
                    Prog. Anual
                </th>
                <th scope="col" class="py-3 px-6" align="center">
                    Mes
                </th>
                <th scope="col" class="py-3 px-6" align="center">
                    Prog Mes
                </th>
                <th scope="col" class="py-3 px-6" align="center">
                    Alcanzada
                </th>
                <th scope="col" class="py-3 px-6" align="center">
                    Variacion
                </th>
                <th scope="col" class="py-3 px-6" align="center">
                    Evidencia
                </th>
            </tr>
            <tr>
                <th scope="row" class="py-2 px-6" align="center" valign="top">
                    <?= $actividad['nombre_actividad'] ?>
                </th>
                <td class="py-2 px-6" align="center" valign="top">
                    <?= $actividad['unidad'] ?>
                </td>
                <td class="py-2 px-6" align="center" valign="top">
                    <?= $anual ?>
                </td>
                <td class="py-2 px-6" align="center" valign="top">
                    <?= $meses[$avance['mes']] ?>
                </td>
                <td class="py-2 px-6" align="center" valign="top">
                    <?php $mesmin = $avance['mes'] ?>
                    <?php $mesmin = strtolower($meses[$mesmin]) ?>
                    <?= $actividad[$mesmin] ?>
                </td>
                <td class="py-2 px-6" align="center" valign="top">
                    <?= "<b>" . $avance['avance'] . "<b>" ?>
                </td>
                <td class="py-2 px-6" align="center" valign="top">
                    <?= intval($avance['avance']) - $actividad[$mesmin] ?>
                </td>
                <td class="py-2 px-6" align="center">
                    <?php if (isset($avance['path_evidenia_evidencia'])) : ?>
                        <a target="_blank" onclick="abrirVentana()" href="<?= Imagenes($avance['path_evidenia_evidencia']) ?>">
                            <?= imgmd($avance['path_evidenia_evidencia']) ?>
                        </a>
                    <?php else : ?>
                        Sin Evidencia
                    <?php endif ?>
                </td>
            </tr>
        </table>
        <br>
        <?php if (isset($avance['id_linea'])) : ?>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tbody>
                    <tr class="bg-white dark:bg-gray-800">
                        <td scope="row" class="py-2 px-6" align="center" valign="top">
                            <?php
                            if (isset($avance['localidades'])) {
                                echo localidades($avance['localidades'], $localidades);
                            } else {
                                echo 'No se seleccionaron localidades';
                            } ?>
                        </td>
                        <td scope="row" class="py-2 px-6" align="center" valign="top">
                            <?php if ($avance['beneficiarios']) :
                                print $avance['beneficiarios']; ?>
                            <?php else : ?>
                                <b> No selecciono beneficiarios </b>
                            <?php endif ?>
                        </td>
                        <td scope="row" class="py-2 px-6" align="center" valign="top">
                            <?php if ($avance['recursos']) :
                                print $avance['recursos']; ?>
                            <?php else : ?>
                                <b> No selecciono recursos </b>
                            <?php endif ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endif ?>
        <br>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tr>
                <td>
                    Descripcion de la Evidencia: <?= $avance['descripcion_evidencia'] ?> <br>
                </td>
            </tr>
            <tr>
                <td>
                    Justificación por variación: <?= $avance['justificacion'] ?> <br>
                </td>
            <tr>
                <td>
                    Reportado por:<b> <?= $avance['nombre'] . ' ' . $avance['apellidos'] . "</b> <br>" ?> <br>
                </td>
            </tr>
            <tr>
                <td>

                    <?= tiempos($avance['fecha_avance']) ?>
                </td>
            </tr>
        </table>


        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">



            <h3>Seleccione los campos que podrá editar el enlace</h3>
            <br>
            <form action="models/actividades_avances_modelo.php" method="post">
                <input type="hidden" name="id_area" value="<?= $actividad['id_area'] ?>">
                <input type="hidden" name="mes" value="<?= $avance['mes'] ?>">
                <input type="hidden" name="id_aut_edicion" value="<?= $_SESSION['id_usuario'] ?>">
                <input type="hidden" name="id_avance" value="<?= $avance['id_avance'] ?>">
                <table style="width: 100%;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; width: 50%;">
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="avance" class="sr-only peer" name="permitidas[]">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Avance</span>
                                </label>
                            </td>
                            <td style="text-align: center; width: 50%;">
                            <?php if($avance['id_linea']): ?>
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="localidades" class="sr-only peer" name="permitidas[]">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Localidades</span>
                                </label>
                            <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 50%;">
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="evidencia" class="sr-only peer" name="permitidas[]">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Evidencia</span>
                                </label>
                            </td>
                            <td style="text-align: center; width: 50%;">
                            <?php if($avance['id_linea']): ?>
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="beneficiarios" class="sr-only peer" name="permitidas[]">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Benediciarios</span>
                                </label>
                            <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 50%;">
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="descevidencia" class="sr-only peer" name="permitidas[]">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Descripcion de la Evidencia</span>
                                </label>
                            </td>
                            <td style="text-align: center; width: 50%;">
                            <?php if($avance['id_linea']): ?>
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="recursos" class="sr-only peer" name="permitidas[]">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Recursos</span>
                                </label>
                            <?php endif ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; width: 50%;">
                                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" value="justificacion" class="sr-only peer" name="permitidas[]">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Justificación por variación</span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: center; width: 100%;" class="my-5">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensaje</label>
                            <textarea id="message" rows="4" name="mensaje" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe al enlace la razón de la edición"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <button type="submit" name="editar" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Permitir edición</button>
                        </td>
                    </tr>
                </table>

            </form>
            <br>

    </div>
    <script>
        function abrirVentana() {
            window.open('<?= $img = substr($avanceMensual['path_evidenia_evidencia'], 3) ?>', '_blank', 'width=1000,height=700');
        }
    </script>
    <?php include 'footer.php'; ?>
</body>

</html>