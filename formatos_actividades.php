<?php
session_start();
if(!$_SESSION){?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}
require_once 'Controllers/reportes_actividades_Controller.php';
if($_SESSION['sistema'] == 'pbrm'){

// Si tenemos id_dependencia lo metemos

?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<body>
<div class="container mx-auto"><!--Este es el contenedor principal -->

<br>
<nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                Inicio
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Impresion de Formatos de Actividades</span>
            </div>
        </li>
    </ol>
</nav>
    <br>



    <?php if(!isset($_SESSION['id_dependencia']) && !$_POST):
        $dependencias =TraeTodasDepencias($con); ?> <!-- Si no tenemos dependencia, somos admins y podemos ver todos los formatos -->

            <div class="grid grid-cols-4">
                <?php foreach($dependencias as $dependencia):?>
                    
                    <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
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


    <div class="grid grid-cols-4">
    
    <!-- Si tenemos post y un Id_dependencia, ya tenemos de que queremos ver, mostramos las areas de las que podemos imprimir formatos  -->

    <?php 
    if($_SESSION['id_dependencia'] || isset($_POST['id_dependencia'])):

        if(isset($_SESSION['id_dependencia'])){
            $id_dependencia = $_SESSION['id_dependencia'];
        }else{
            $id_dependencia =$_POST['id_dependencia'];
        }
    
    $areas = TraeAreasDependencias($con, $id_dependencia)?>
    
    <?php foreach($areas as $area):?>
    <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $area['nombre_area'] ?> </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Seleccione el Trimestre a Imprimir.</p>
        <form action="sources/TCPDF-main/examples/example_006.php" method="post">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <?= Botones($con, $area['id_area']) ?>
            </div>

        </form>

    </div>

    <?php endforeach ?>
<?php endif ?>








</div><!-- Fin del contenedor principal -->
<?php include 'footer.php';?>
</body>
</html>
<?php
}else{
    ?>
    <script>
        alert("ya te hubiera sacado");
        window.location.href = 'login.php';
    </script>
    <?php
}
?>