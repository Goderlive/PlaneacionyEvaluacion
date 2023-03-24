<?php
session_start(); // 1. Vamos a validar que sea un usuario valido
if($_SESSION['sistema'] != "pbrm"){
    header("Location: mi_perfil.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<?php 
include 'head.php';
include 'header.php';
require_once 'Controllers/mi_perfil_Controller.php';
include 'Controllers/breadcrumbs.php';
$id_usuario = $_SESSION['id_usuario'];
$id_dependencia = $permisos['id_dependencia'];
?>
<body>

<div class="container mx-auto">
    <br> 
    <?= breadcrumbs(array("Inicio"=> "index.php", "Mi Perfil" => "mi_perfil.php", "Administrar Usuaris" => "administra_usuarios.php"))?>
    <br><br>


    <?php if($permisos['nivel'] != 5):?>

        <h5 class="text-xl font-medium text-gray-800 dark:text-white">Registra un Enlace Nuevo</h5><br>
        <button class = "bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="mymodal1"> Registrar Nuevo</button>

    <?php endif?>

    <?php if($permisos['nivel'] == 4): ?>
        <?php if($cincos = buscacincos($con, $id_usuario)): ?>
            <br> <br> <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700"></ul><br> 
            <div class="p-4 w-full max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Mis SubEnlaces</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <?php foreach($cincos as $dependiente):?>
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            <?= $dependiente['nombre'] . " " . $dependiente['apellidos'] ?>
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            <?= $dependiente['correo_electronico'] ?>
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            <?= $dependiente['nombre_area'] ?>
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <button type="submit" name="eliminar" class="mx-1 py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                        <button type="submit" name="actualizar" class="py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Contraseña</button>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif ?>
    <?php endif ?>





    <?php if($permisos['nivel'] == 1): ?>
            <br> <br> <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700"></ul><br> 
        <?php if($cuatros = buscacuatros($con, $id_usuario)): ?>
            <div class="grid grid-cols-4">
                <?php foreach ($cuatros as $dep): ?>

                    <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700"">
                        <div class="flex flex-col items-center pb-10">
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $dep['nombre_dependencia'] ?></h5>
                            <span class="text-md text-gray-500 dark:text-gray-400"><?= $dep['nombre'] . " " . $dep['apellidos'] ?></span>
                            <span class="text-md text-gray-500 dark:text-gray-400"><?= $dep['correo_electronico'] ?></span>
                            <button type="submit" name="actualizar" class="py-2 my-3 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Contraseña</button>
                            <button type="submit" name="eliminar" class="py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                            </div>

                            <br>
                            <?php if($cincos = buscacincos($con, $dep['id_usuario'])): ?>

                                <div class="p-4 w-full max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-between items-center mb-4">
                                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">SubEnlaces</h5>
                                    </div>
                                    <div class="flow-root">
                                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <?php foreach($cincos as $dependiente):?>
                                                <li class="py-3 sm:py-4">
                                                    <div class="flex items-center space-x-4">
                                                        <div class="flex-1 min-w-0">
                                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                <?= $dependiente['nombre'] . " " . $dependiente['apellidos'] ?>
                                                            </p>
                                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                <?= $dependiente['correo_electronico'] ?>
                                                            </p>
                                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                <?= $dependiente['nombre_area'] ?>
                                                            </p>
                                                            <button type="submit" name="eliminar" class="my-3 mx-1 py-2 px-3 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                                            <button type="submit" name="actualizar" class="my-3 py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Contraseña</button>
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif ?>

                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    <?php endif ?>
</div>














<!-- Main modal -->
<div id="mymodal1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Registra un Nuevo Usuario</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="mymodal1">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            
            <!-- Modal body -->
            <form action="models/mi_perfil_Model.php" method="POST" enctype="multipart/form-data">
                <div class="p-6 space-y-1">
                    <input type="hidden" name="id_registrante" value="<?= $_SESSION['id_usuario']?>">


                    <?php if($permisos['nivel'] == 2 ||  $permisos['nivel'] == 1): ?>
                    <div> 
                        <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Direccion</label>
                        <select name="id_dependencia" id="small" class="block p-2 mb-6 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Seleccione una Dependencia</option>
                            <?php $dependencias = TraeDependencias($con);
                            foreach($dependencias as $dependencia):?>
                                <option value="<?= $dependencia['id_dependencia']?>"><?=$dependencia['nombre_dependencia'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div> 
                    <?php endif ?>


                    <?php if($permisos['nivel'] == 4): ?>
                    <div> 
                        <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Área</label>
                        <select name="id_area" id="small" class="block p-2 mb-6 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Seleccione un Área</option>
                            <?php $subareas = TraeSubAreas($con, $id_dependencia); 
                            foreach ($subareas as $area): ?>
                                <option value="<?= $area['id_area']?>"><?=$area['nombre_area'] ?></option>
                            <?php  endforeach; ?>
                    </div>
                    <?php endif ?>
                    
                    <div class="relative"> 
                        <input type="email" name="correo_electronico" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required>
                    </div>
                    <div class="relative"> 
                        <input type="password" name="contrasena" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contraseña" required>
                    </div>
                    <div> 
                        <input type="text" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre(s)" required>
                    </div>
                    <div>
                        <input type="text" name="apellidos" id="apellidos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellidos" required>
                    </div>
                    <div>
                        <input type="tel" name="tel" id="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="No. de Telefono" required>
                    </div>
                </div>
                        <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input type="submit" value="Registrar" name="nuevo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                </div>
            </form>
        </div>
    </div>

</div> <!-- Este es el div principal -->
<br>



<?php include 'footer.php';?>
</body>
</html>
