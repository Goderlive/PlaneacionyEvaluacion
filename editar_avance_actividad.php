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
<?php $avance = traeAvance($con, $modificacion['id_avance']); ?>
<?php $permitidas = json_decode($modificacion['permitidas']) ?>
<?php $actividad = TraeActividad($con, $avance['id_actividad']) ?>
<?php $anual = $actividad['enero'] + $actividad['febrero'] + $actividad['marzo'] + $actividad['abril'] + $actividad['mayo'] + $actividad['junio'] + $actividad['julio'] + $actividad['agosto'] + $actividad['septiembre'] + $actividad['octubre'] + $actividad['noviembre'] + $actividad['diciembre'] ?>
<?php $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");?>
<?php $localidades = traelocalidades($con) ?>
<?php 




function lista_localidades($con){
    $localidades = traelocalidades($con);
    $options = '<option selected disabled>Seleccione las Localidades</option>
    ';
    foreach($localidades as $l){
        $options .= '<option value="'.$l['id_localidad'].'">'.$l['nombre_localidad'].'</option>
        ';
    }
    return '
    <select multiple id="localidades" name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        '.$options.'
    </select>
    ';
}


function localidades($locasa, $localidades)
{
    $locas = explode(",", $locasa);
    foreach ($locas as $loca) {
        print $localidades[$loca - 1]['nombre_localidad'] . "<br>";
    }
}


function Imagenes($a){
    if(file_exists($a)){
        return $a;
    }else{
        return substr($a, 3);
    }
}

function imgsmall($data){
    $img = Imagenes($data);
    if($img){
        return '<img src="' . $img . '" alt="evidencia" width="150" height="150">';
    }else{
        return "Sin Evidencia";
    }
}

function imgmd($data){
    $img = Imagenes($data);
    if($img){
        return '<img src="' . $img . '" alt="evidencia" style="max-width: 150px; max-height: 150px;">';
    }
}


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
?>



<div id="alert-additional-content-5" class="my-6 p-4 border border-gray-300 rounded-lg bg-blue-50 dark:border-gray-600 dark:bg-gray-800" role="alert">
  <div class="flex items-center">
    <svg aria-hidden="true" class="w-5 h-5 mr-2 text-gray-800 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-300">Mensaje del Administrador:</h3>
  </div>
  <div class="mt-2 mb-4 text-sm text-gray-800 dark:text-gray-300">
  <?= $modificacion['mensaje'] ?>
  </div>
</div>


<?php $dependencia = traeDatosDependencia($con, $avance['id_actividad']); ?>
<p class="text-lg font-medium text-gray-900 dark:text-white my-2">Dependencia: <b> <?= $dependencia['nombre_dependencia'] ?></b></p>
<p class="text-lg font-medium text-gray-900 dark:text-white my-2">Área: <b><?= $dependencia['nombre_area'] ?></b></p>
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
                        <a target="_blank" href="<?= Imagenes($avance['path_evidenia_evidencia']) ?>">
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


<form action="models/editar_avance_actividad.php" method="post" enctype="multipart/form-data"> 

<input type="hidden" name="id_avance" value="<?= $avance['id_avance'] ?>">
<input type="hidden" name="id_modificacion" value="<?= $modificacion['id_modificacion'] ?>">

<div class="my-6">
<?php if(in_array("avance", $permitidas)): ?>
    <label for="avance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Avance:</label>
    <input type="number" id="avance" name="avance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Actual: <?= $avance['avance'] ?>" required>
<?php else: ?>
    <input type="hidden" name="avance" value="<?= $avance['avance'] ?>">
<?php endif ?>
</div>

<div class="my-6">
<?php if(in_array("evidencia", $permitidas)): ?>
    <label for="evidencia_de_evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Evidencia:</label>
    <input type="file" id="evidencia_de_evidencia" name="evidencia_de_evidencia" accept="image/png, image/jpeg, image/jpg" class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"/>
<?php else: ?>
    <?php $evid = explode('/', $avance['path_evidenia_evidencia']) ?>
    <input type="hidden" name="evidencia_de_evidencia" value="<?= $avance['path_evidenia_evidencia'] ?>">
<?php endif ?>
</div>

<div class="my-6">
<?php if(in_array("descevidencia", $permitidas)): ?>
    <label for="descevidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion de Evidencia:</label>
    <input type="text" id="descevidencia" name="descevidencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<?php else: ?>
    <input type="hidden" name="descevidencia" value="<?= $avance['descripcion_evidencia'] ?>">
    <?php endif ?>
</div>

<div class="my-6">
<?php if(in_array("justificacion", $permitidas)): ?>
    <label for="justificacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Justificación caso de +10% o -10% de variación:</label>
    <input type="text" id="justificacion" name="justificacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<?php else: ?>
    <input type="hidden" name="justificacion" value="<?= $avance['justificacion'] ?>">
<?php endif ?>
</div>

<div class="my-6">
<?php if(in_array("localidades", $permitidas)): ?>
    <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Localidades:</label>
    <?= lista_localidades($con) ?>
<?php else: ?>
    <input type="hidden" name="localidades" value="<?= $avance['localidades'] ?>">
<?php endif ?>
</div>

<div class="my-6">
<?php if(in_array("beneficiarios", $permitidas)): ?>
    <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios:</label>
    <input type="number" id="beneficiarios" name="beneficiarios" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<?php else: ?>
    <input type="hidden" name="beneficiarios" value="<?= $avance['beneficiarios'] ?>">
<?php endif ?>
</div>

<div class="my-6">
<?php if(in_array("recursos", $permitidas)): ?>
    <label for="recursos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recursos:</label>
    <input type="text" id="recursos" name="recursos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<?php else: ?>
    <input type="hidden" name="recursos" value="<?= $avance['recursos'] ?>">
<?php endif ?>
</div>

<button type="submyt" name="actualizar" value="actualizar" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Actualizar</button>
<br>
<br>

</form>



</div>

</body>
</html>
