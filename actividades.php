<?php
session_start();
if(!$_SESSION){?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}
if($_SESSION['sistema'] == 'pbrm'){
require_once 'Controllers/Actividades_Controlador.php';
$real_anio = date('Y');
$user_anio = $_SESSION['anio'];
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';  // Esto solo carga el html de un head?>
<?php include 'header.php'; // Carga el menu de arriba y la programacion de los permisos?>
<?php include 'Controllers/breadcrumbs.php';?>
<?php $dependenciasAuxiliares = DependenciasAuxiliares($con, $user_anio)?>
<?php $proyectos = Proyectos($con, $user_anio)?>


<body>
<div class="container mx-auto">
    <br>
    <?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => ""))?>
    <br>



<?php if ($permisos['nivel'] > 3):  // Primero veridicamos el permiso... EN CASO DE ENLACE?> 
    <?php if ($real_anio == $user_anio): // Luego verificamos si es un anio corriente ?>
    <div class="grid grid-cols-4">
        <?php
        $all = '';

        //Tenemos 2 opciones, que sea un enlace de varias areas, o que sea de una sola area
        //En caso de que sea un enlace general. le asignamos la chave de la dependencia, y asi lo buscaremos con un metodo especial
        if ($permisos['id_dependencia'] != ''){
            $dep = $permisos['id_dependencia'];
            $areas = areas_con($con, $dep, $real_anio);
        }
        else{ // En caso de que el permiso se encuentre en 
            $dep = $permisos['id_area'];
            $areas = unArea($con, $dep, $real_anio);
        }

        foreach ($areas as $area): ?>

            <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $area['nombre_area'] ?> </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Metas mensuales.</p>
                <form action="reportes.php" method="post">
                    <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="<?= $area['id_area'] ?>">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Reportar
                    </button>
                </form>
                <form action="programacion_actividades.php" method="post">
                    <button class="inline-flex items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="<?= $area['id_area']?>">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path></svg> Ver Programacion
                    </button>
                </form>
                <div class="px-3 pt-4 pb-2 text-center">


                    <a href="#">
                        <span class="inline-block bg-red-600 text-white rounded-full px-3 py-1 text-sm font-semibold text-white-700 mr-2 mb-2">¡Importante!</span>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <?php endif ?> <!--Hasta aqui se menciona lo relacionado con los anios para reportar -->
    
    
    <?php if ($real_anio != $user_anio): //  verificamos si es un anio de anteproyecto ?>
    <div class="grid grid-cols-4">
        <?php  
        $areas = areas_con($con, $dep, $user_anio);
        foreach ($areas as $area): ?>
            <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $area['nombre_area'] ?> </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Metas mensuales.</p>
                <form action="actividades_anteproyecto.php" method="post">
                    <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="<?= $area['id_area'] ?>">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Programar
                    </button>
                </form>

            </div>
        <?php endforeach ?>

    <?php endif ?>
    </div>
<?php endif ?>










</div>
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