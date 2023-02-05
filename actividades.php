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
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'Controllers/breadcrumbs.php';?>
<?php $dependenciasAuxiliares = DependenciasAuxiliares($con, $user_anio)?>
<?php $proyectos = Proyectos($con, $user_anio)?>


<body>
<div class="container mx-auto">
    <br>
    <?= breadcrumbs(array("Inicio" => "index.php", "Actividades" => ""))?>
    <br>



<?php if ($_SESSION['id_permiso'] > 3):  // Primero veridicamos el permiso... EN CASO DE ENLACE?> 
    <?php if ($real_anio == $user_anio): // Luego verificamos si es un anio corriente ?>
    <div class="grid grid-cols-4">
        <?php
        $all = '';
        $areas = areas_con($con, $dep, $real_anio);
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





<?php if ($_SESSION['id_permiso'] < 3): // EN CASO DE ADMINISTRADOR?>
    <?php if($user_anio == $real_anio):  // EN CASO DE AÑO EN CURSO?>
    <?php include 'Controllers/utility_nueva_dependencia.php' ?>
    <div class="grid grid-cols-4">
        <?php $dependencias = dependencias($con,$real_anio); 
        foreach ($dependencias as $value):?> 
            <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h5 class="text-lg font-bold dark:text-white"><?= $value['nombre_dependencia'] ?></h5>

            
                <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-l-lg border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg> 
                    Areas
                </button>
                <button type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path></svg>
                    
                </button>
                <button type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-900 bg-transparent rounded-r-md border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path></svg>
                    Eliminar
                </button>
                </div>

            
            </div>
        <?php endforeach ?>
    </div>

    <?php foreach ($dependencias as $value):?> 

<div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <h5 class="text-lg font-bold dark:text-white"><?= $value['nombre_dependencia'] ?></h5>
    <?php if($thisarea = areas_con($con, $value['id_dependencia'])):?>
    
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Nombre Área
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Cve Gral
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Cve Aux
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Programa
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Proyecto
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($thisarea as $a): ?>
                    <?php var_dump($a);?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $a['nombre_area'] ?>
                        </th>
                        <td class="py-4 px-6">
                            <?= $a['clave_dependencia'] . ' - ' . $a['nombre_dependencia_general']?>
                        </td>
                        <td class="py-4 px-6">
                            <?= $a['clave_dependencia_auxiliar'] . ' - ' . $a['nombre_dependencia_auxiliar']?>
                        </td>
                        <td class="py-4 px-6">
                            <?= $a['codigo_programa'] . ' - ' . $a['nombre_programa']?>
                        </td>
                        <td class="py-4 px-6">
                            <?= $a['codigo_proyecto'] . ' - ' . $a['nombre_proyecto']?>
                        </td>
                        <td class="py-4 px-6">
                            <form action="" method="post">
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Administrar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
        
                            
    <!-- Modal toggle -->
    <button class="mx-2 my-4 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="mod<?= $value['id_dependencia'] ?>">
        Nueva Área
    </button>

    <!-- Main modal -->
    <div id="mod<?= $value['id_dependencia'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Crear nueva Área
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mod<?= $value['id_dependencia'] ?>">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Cerrar</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">

                    <form action="models/modelo_actividades.php" method="POST">
                        <input type="hidden" name="id_dependencia" value="<?= $value['id_dependencia'] ?>">
                        <input type="hidden" name="id_dep_gen" value="<?= $value['id_dependencia_gen'] ?>">
                        <input type="hidden" name="anio" value="<?= $user_anio ?>">
                    <div>
                        <label for="nombre_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Área</label>
                        <input type="text" id="nombre_area" name="nombre_area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>


<br>
                    <label for="auxiliar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una Clave Auxiliar</label>
                    <select id="auxiliar" name="auxiliar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Seleccione una Dependencia Auxiliar</option>
                        <?php foreach ($dependenciasAuxiliares as $auxis): ?>
                            <option value="<?= $auxis[0] ?>"> <?= $auxis[1] . "-" . $auxis[2] ?> </option>
                        <?php endforeach ?>
                    </select>
<br>
                    <label for="proyecto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione un Proyecto</label>
                    <select id="proyecto" name="proyecto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Seleccione un Proyecto</option>
                        <?php foreach ($proyectos as $pro): ?>
                            <option value="<?= $pro['id_proyecto'] ?>"> <?= $pro['codigo_proyecto'] . "-" . $pro['nombre_proyecto'] ?> </option>
                        <?php endforeach ?>
                    </select>

                </div>
                    <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="mod<?= $value['id_dependencia'] ?>" name="new_area" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Área</button>
                    <button data-modal-toggle="mod<?= $value['id_dependencia'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php endforeach ?>
    
    <?php endif ?>
    



    <?php if($user_anio != $real_anio): // EN CASO DE ANTEPROYECTO?>
        <?php $dependencias = dependencias($con,$user_anio); ?>
        <?php include 'Controllers/utility_nueva_dependencia.php' ?>

            <?php foreach ($dependencias as $value):?> 

                <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="text-lg font-bold dark:text-white"><?= $value['nombre_dependencia'] ?></h5>
                    <?php if($thisarea = areas_con($con, $value['id_dependencia'])):?>
                    
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Nombre Área
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Cve Gral
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Cve Aux
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Programa
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Proyecto
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Acción
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($thisarea as $a): ?>
                                    <?php var_dump($a);?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <?= $a['nombre_area'] ?>
                                        </th>
                                        <td class="py-4 px-6">
                                            <?= $a['clave_dependencia'] . ' - ' . $a['nombre_dependencia_general']?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?= $a['clave_dependencia_auxiliar'] . ' - ' . $a['nombre_dependencia_auxiliar']?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?= $a['codigo_programa'] . ' - ' . $a['nombre_programa']?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <?= $a['codigo_proyecto'] . ' - ' . $a['nombre_proyecto']?>
                                        </td>
                                        <td class="py-4 px-6">
                                            <form action="" method="post">
                                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Administrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif ?>
                        
                                            
                    <!-- Modal toggle -->
                    <button class="mx-2 my-4 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="mod<?= $value['id_dependencia'] ?>">
                        Nueva Área
                    </button>

                    <!-- Main modal -->
                    <div id="mod<?= $value['id_dependencia'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
                        <div class="relative w-full max-w-2xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Crear nueva Área
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mod<?= $value['id_dependencia'] ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Cerrar</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">

                                    <form action="models/modelo_actividades.php" method="POST">
                                        <input type="hidden" name="id_dependencia" value="<?= $value['id_dependencia'] ?>">
                                        <input type="hidden" name="id_dep_gen" value="<?= $value['id_dependencia_gen'] ?>">
                                        <input type="hidden" name="anio" value="<?= $user_anio ?>">
                                    <div>
                                        <label for="nombre_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Área</label>
                                        <input type="text" id="nombre_area" name="nombre_area" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>


<br>
                                    <label for="auxiliar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione una Clave Auxiliar</label>
                                    <select id="auxiliar" name="auxiliar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Seleccione una Dependencia Auxiliar</option>
                                        <?php foreach ($dependenciasAuxiliares as $auxis): ?>
                                            <option value="<?= $auxis[0] ?>"> <?= $auxis[1] . "-" . $auxis[2] ?> </option>
                                        <?php endforeach ?>
                                    </select>
<br>
                                    <label for="proyecto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione un Proyecto</label>
                                    <select id="proyecto" name="proyecto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Seleccione un Proyecto</option>
                                        <?php foreach ($proyectos as $pro): ?>
                                            <option value="<?= $pro['id_proyecto'] ?>"> <?= $pro['codigo_proyecto'] . "-" . $pro['nombre_proyecto'] ?> </option>
                                        <?php endforeach ?>
                                    </select>

                                </div>
                                    <!-- Modal footer -->
                                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                    <button data-modal-toggle="mod<?= $value['id_dependencia'] ?>" name="new_area" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Área</button>
                                    <button data-modal-toggle="mod<?= $value['id_dependencia'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach ?>
    <?php endif ?>
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