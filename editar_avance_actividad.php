<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php' ?>
<?php include 'Controllers/breadcrumbs.php';?>
<?php include 'models/editar_avance_actividad.php' ?>
<?php if(!$permisos['nivel'] == 1 || !$permisos['nivel'] == 4 || !$permisos['nivel'] == 5 || !$_POST){
        header("Location: ../index.php");
}

$id_modificacion = $_POST['id_modificacion']?>

<body>
<div class="container mx-auto">
<br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Actividades"=> "actividades.php", "Editar"=>""))?>
<?php $modificacion = traeModificacion($con, $id_modificacion); ?>
<br>
<?php $avance = traeAvance($con, $modificacion['id_avance']); ?>
<?php $permitidas = json_decode($modificacion['permitidas']) ?>

<?php var_dump($modificacion); ?>
<div id="alert-additional-content-5" class="p-4 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-600 dark:bg-gray-800" role="alert">
  <div class="flex items-center">
    <svg aria-hidden="true" class="w-5 h-5 mr-2 text-gray-800 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300">Solicitud de edicion de Nombre Propio</h3>
  </div>
  <div class="mt-2 mb-4 text-sm text-gray-800 dark:text-gray-300">
  Aqui va el texto generado por los administradores
  </div>
</div>

<br>


<label for="avance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Avance:</label>
<?php if(in_array("avance", $permitidas)): ?>
<div>
    <input type="number" id="avance" name="avance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
</div>
<?php else: ?>
<div>
    <input type="number" id="avance" value="<?= $avance['avance'] ?>" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
</div>
<?php endif ?>


<label for="evidencia_de_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Evidencia:</label>
<?php if(in_array("evidencia", $permitidas)): ?>
<div>
    <input type="file" id="evidencia_de_evidencia" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"/>
</div>
<?php else: ?>
    <?php $evid = explode('/', $avance['path_evidenia_evidencia']) ?>
<div>
    <input type="text" id="path_evidenia_evidencia" name="path_evidenia_evidencia" value="<?= end($evid) ?>" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
</div>
<?php endif ?>



<label for="descevidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion de Evidencia:</label>
<?php if(in_array("descevidencia", $permitidas)): ?>
<div>
    <input type="text" id="descevidencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<?php else: ?>
<div>
    <input type="text" id="descevidencia" name="descevidencia" value="<?= end($evid) ?>" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
</div>
<?php endif ?>

<br>

<label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Justificación caso de +10% o -10% de variación:</label>
<?php if(in_array("justificacion", $permitidas)): ?>
<div>
    <input type="text" id="justificacion" name="justificacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<?php else: ?>
<div>
    <input type="text" id="justificacion" value="<?= $avance['justificacion'] ?>" id="disabled-input" aria-label="disabled input" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
</div>
<?php endif ?>






</div>

</body>
</html>
