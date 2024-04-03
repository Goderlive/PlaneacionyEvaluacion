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
require_once 'Controllers/mis_formatos_Controller.php';
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

        <h3 class="text-3xl font-bold dark:text-white">Imprimir FUAT</h3>
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
                                    <form action="sources\TCPDF-main\examples\FUAT.php" method="post">
                                        Imprimir tu Formato Único Trimestral.
                                        <input type="hidden" name="id_dependencia" value="<?= $permisos['id_dependencia'] ?>">
                                        <input type="hidden" name="trimestre" value="1">
                                        <button type="submit" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z" />
                                                <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z" />
                                            </svg>
                                        </button>
                                    </form>
                                <?php endif ?>
                            <?php endif ?>

                        <?php else : ?>
                            <a href="mis_areas.php" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Necesitas Registrar Encargado</a>
                        <?php endif ?>
                    </div>

                </div>
            <?php endif ?>
        <?php endif ?>



            <?php include 'footer.php'; ?>
</body>

</html>