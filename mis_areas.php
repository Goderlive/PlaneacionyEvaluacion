<?php
session_start();

if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/misareas_Controller.php';
    $id_dependencia = $_SESSION['id_dependencia']; 
    $id_usuario = $_SESSION['id_usuario']; 
    include 'Controllers/breadcrumbs.php';

    $real_anio = date('Y');
    $user_anio = $_SESSION['anio'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Áreas</title>
</head>
<body>
<div class="container mx-auto">

<br>

<?= breadcrumbs(array("Inicio"=> "index.php", "Mis Areas"=> ""))?>

<br>
<h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl dark:text-white">Esta Sección permite administrar lo referente a las Areas</h2>
<br>
    

Esto se tiene que borrar en produccion
Primero vamos por partes...

Traemos un POST o traemos Area en Session:
    Mostramos las areas y las administramos
No traemos POST o Area en Session:
    Mostramos las Dependencias y Nueva Dependencia


    
    
<?php if(isset($_SESSION['id_area']) || $_POST['id_dependencia']): ?>
        
        
        
        
        
<?php endif ?>
        
        
        
        
        
<?php if($permisos['nivel'] ==1 || $permisos['nivel'] ==2): ?>
<?php endif ?>







<!-- Esta primer Area permite agregar el nombre de un director pero solo esta disponible para enlaces y enlaces de enlaces, no para administradores -->
<!-- Por o que debemos meter una condicion. -->
<?php if($_SESSION['id_permiso'] >= 4): ?>
<div class="grid grid-cols-2">
    <?php 
        $director = TraeDirector($con, $id_dependencia);
        if(!$director):
        ?>
            <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" action="models/misareas_Model.php" method="POST">
                    <h3 class="font-normal text-gray-900 dark:text-white">Registra al director o equivalente</h3>
                    <div>
                        <input type="text" required name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nombres" required="">
                    </div>
                    <div>
                        <input type="text" required name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Apellidos" required="">
                    </div>
                    <div>
                        <input type="text" required name="cargo" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Cargo" required="">
                    </div>
                    <input type="hidden" name="id_dependencia" value="<?= $id_dependencia ?>">
                    <input type="hidden" name="id_registrante" value="<?= $id_usuario ?>">
                    <button type="submit" name="registrarDirector" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                </form>
            </div>
        <?php else:?>
            <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">

                <h3 class="font-normal text-gray-900 dark:text-white">Director o Equivalente</h3>
                <br>
                <h3 class="font-normal text-gray-900 dark:text-white"><?= $director['nombre'] . " " . $director['apellidos'] ?></h3>
                <h3 class="font-normal text-sm text-gray-900 dark:text-white"><?= $director['cargo']  ?></h3>
                <form action="models/misareas_Model.php" method="post">
                <input type="hidden" name="id_eliminante" value="<?= $id_usuario ?>">
                    <input type="hidden" name="id_titular" value="<?= $director['id_titular'] ?>">
                <br>
                    <input type="submit" name="eliminar" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">

                </form>
            </div>
        
        <?php endif?>
            <br>

        <?php
    foreach($areas = TraerAreas($con, $id_dependencia) as $area):
        $id_area = $area['id_area'];
        $titular = TraeTitular($con, $id_area);
        if(!$titular):?>
        <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="models/misareas_Model.php" method="POST">
                <h3 class="font-normal text-gray-900 dark:text-white"><strong><?= $area['nombre_area']?> </strong> no tiene registrado titular</h3>
                <div>
                    <input type="text" required name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nombres" required="">
                </div>
                <div>
                    <input type="text" required name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Apellidos" required="">
                </div>
                <div>
                    <input type="text" required name="cargo" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Cargo" required="">
                </div>
                <input type="hidden" name="id_area" value="<?= $id_area ?>">
                <input type="hidden" name="id_registrante" value="<?= $id_usuario ?>">
                <button type="submit" name="registrar" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            </form>
        </div>
        <?php else:?>  
            <div class="p-4 mt-4 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">

                <h3 class="font-normal text-gray-900 dark:text-white"><strong><?= $area['nombre_area']?> </strong></h3>
                <br>
                <h3 class="font-normal text-gray-900 dark:text-white"><?= $titular['nombre'] . " " . $titular['apellidos'] ?></h3>
                <h3 class="font-normal text-sm text-gray-900 dark:text-white"><?= $titular['cargo']  ?></h3>
                <form action="models/misareas_Model.php" method="post">
                <input type="hidden" name="id_eliminante" value="<?= $id_usuario ?>">
                    <input type="hidden" name="id_titular" value="<?= $titular['id_titular'] ?>">
                <br>
                    <input type="submit" name="eliminar" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">

                </form>
            </div>
        <?php
        endif;
    endforeach
    ?>
</div>
<?php endif ?>


<!-- En esta parte vamos a programar lo referente a los administradores -->
<?php if($_SESSION['id_permiso'] < 3): ?>

<?php endif ?>



<h1 class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl dark:text-white">Dependencias</h1>


<!-- En esta parte vamos a programar lo referente a los administradores -->
<?php if($_SESSION['id_permiso'] < 2): ?>
    <?php if ($_SESSION['id_permiso'] < 3): // EN CASO DE ADMINISTRADOR?>
        <?php if($user_anio == $real_anio):  // EN CASO DE AÑO EN CURSO?>

            <?= NuevaArea($con, $user_anio) ?>
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
        <?php endif ?>

        <?php if($user_anio != $real_anio): // EN CASO DE ANTEPROYECTO?>
            <?php $dependencias = dependencias($con,$user_anio); ?>
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
    

<?php endif ?>







<?php include 'footer.php';?>
    </div>
</body>
</html>
<?php
}
?>

