<?php
session_start();

$id_usuario = $_SESSION['id_usuario'];

if (isset($_SESSION) && isset($_SESSION['sistema']) && $_SESSION['sistema'] == "pbrm") {
    require_once 'models/revisa_todas_reconducciones_Modelo.php';
    include 'header.php';
    include 'head.php';
    // consultamos los permisos
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <style>
            html {
                font-size: 10px
            }
        </style>
    </head>

    <body>
        <br>
        <?php $reconducciones = Traelasreconducciones($con) ?>

        <div class="container text-center mx-auto">

            <?php foreach ($reconducciones as $r) : ?>
                <br>
                <br>
                <div role="status" class="mt-5 rounded border border-gray-200 shadow md:p-6 dark:border-gray-700">
                    <div class=" justify-center mb-4 bg-blue-100 rounded dark:bg-blue-100">
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> <?= $r['nombre_dependencia'] ?></h5>
                        <p><?= "Oficio: " . $r['no_oficio'] . " <br>Dep. Gen: " . $r['dep_general'] . " -- Dep. Aux: " . $r['dep_aux'] . " -- Programa: " . $r['programa'] ?></p>
                        <?= $r['fecha'] ?>
                        <?= "id: " . $r['id_reconduccion_actividades'] ?>
                    </div>

                    <!-- vamos a buscar las calindarizaciones realacionadas con esta reconduccion -->
                    <?php
                    $programaciones = CalendarizacionesdeReconduccionAct($con, $r['id_reconduccion_actividades']);
                    foreach ($programaciones as $programacion) :   // Tenemos una vista de cada programacion dentro de cada reconduccion.
                        $dataActividad = datosdeActividad($con, $programacion['id_actividad']);
                        if (DefineTipo($con, $programacion['programacion_inicial'], $programacion['programacion_final']) == "Interna") {
                            continue;
                        } else {
                            $bg_table = "";
                        } ?>
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <br>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 '.$bg_table.'">
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 ' . $bg_table. '">
                                    <tr>
                                        <td scope="col" colspan="12" class="py-2 px-2 bg-gray-50 dark:bg-gray-800">
                                            <?= $dataActividad['codigo_actividad'] . " - " . $dataActividad['nombre_actividad'] . " - " . $dataActividad['unidad'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?= EncabezadoMeses() ?>
                                    </tr>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <?= Programacion($programacion['programacion_inicial']) ?>
                                    </tr>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <?= Programacion($programacion['programacion_final']) ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>
                    <?php endforeach ?>

                </div><br>

            <?php endforeach ?>
        </div>

        <?php include 'footer.php'; ?>
    </body>

    </html>
<?php
} else { ?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}
?>