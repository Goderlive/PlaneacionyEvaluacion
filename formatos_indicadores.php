<?php
session_start();
if(!$_SESSION){?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}
if(!$_SESSION['sistema'] == 'pbrm'):?>
    <script>
        alert("ya te hubiera sacado");
        window.location.href = 'login.php';
    </script>

<?php endif;
    require_once 'Controllers/reportes_indicadores_Controller.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'Controllers/breadcrumbs.php';?>
<body>

<?php if($permisos['id_dependencia'] == NULL){
    print "<br><h1>Tu cuenta no permite imprimir formatos</h1>";
    die();
}else{
    $id_dependencia = $permisos['id_dependencia'];
} ?>
<div class="container mx-auto"><!--Este es el contenedor principal -->

<br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Imprime Formatos Indicadores"=>""))?>
    <br>

    

    <?php if($permisos['nivel'] ==1): ?>
        
    <?php endif ?>


    <?php if($permisos['nivel'] <= 2 && !$_POST):
        $dependencias =TraeTodasDepencias($con); ?> <!-- Si no tenemos dependencia, somos admins y podemos ver todos los formatos -->
            <div class="grid grid-cols-4">
                <?php foreach($dependencias as $dependencia):?>
                    
                    <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $dependencia['nombre_dependencia'] ?> </h5>
                        <form action="formatos_actividades.php" method="POST">
                            <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_dependencia" value="<?= $dependencia['id_dependencia'] ?>">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Areas
                            </button>
                        </form>
                    </div>
                <?php endforeach?>
            </div>
    <?php endif?>


    
    <!-- Si tenemos post y un Id_dependencia, ya tenemos de que queremos ver, mostramos las areas de las que podemos imprimir formatos  -->



    <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"> Imprimir Indicadores</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Seleccione el Trimestre a Imprimir.</p>
        <form action="sources/TCPDF-main/examples/indicadores.php" method="POST">
            <input type="hidden" name="id_dependencia" value="<?= $id_dependencia ?>">
            <?php if(TieneDirector($con, $id_dependencia)): ?>
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <?= Botones($con, $id_dependencia) ?>
                </div>
            </form>
            <?php else: ?>
                <a href="mis_areas.php" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Necesitas Registrar Encargado</a>
            <?php endif ?>
    </div>






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
                                    <?php $dir = $formato['dir_formatoindicador'] ?>
                                    <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                                <?php else : ?>
                                    Aún no subimos esta información
                                <?php endif ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if ($formato = traeporDependenciasytrim($con, $id_dependencia, 2)) : ?>
                                    <?php $dir = $formato['dir_formatoindicador'] ?>
                                    <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                                <?php else : ?>
                                    Aún no subimos esta información
                                <?php endif ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if ($formato = traeporDependenciasytrim($con, $id_dependencia, 3)) : ?>
                                    <?php $dir = $formato['dir_formatoindicador'] ?>
                                    <a href="<?= $dir ?>" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Imprimir </a>
                                <?php else : ?>
                                    Aún no subimos esta información
                                <?php endif ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if ($formato = traeporDependenciasytrim($con, $id_dependencia, 4)) : ?>
                                    <?php $dir = $formato['dir_formatoindicador'] ?>
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


</div><!-- Fin del contenedor principal -->
<?php include 'footer.php';?>
</body>
</html>