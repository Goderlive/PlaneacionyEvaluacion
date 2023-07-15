<?php
if(!$_GET['type']){
    header("Location: index.php");
}
$tipo = $_GET['type'];
session_start();
if($_SESSION['sistema'] == "pbrm" || $_SESSION['id_permiso'] != 1){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/revisa_reconducciones_Controller.php';
    include 'Controllers/breadcrumbs.php';

}
?>
<!DOCTYPE html>
<html lang="es">

<body>
	<div class="container text-center mx-auto">
    <br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Revisar Reconducciones"=>""))?>
<br>
        <!-- Aqui comienza el area de las reconducciones de Actividades -->
<?php if($tipo == "actividades"):
        //primero vamos a llamar las reconducciones
        $reconducciones = TraeTodasReconduccionesActividades($con);

        foreach ($reconducciones as $reconduccion):?> <!-- Tenemos una vista de cada reconduccion -->
            <form action="models/revisa_reconducciones_Model.php" method="post">

            <div role="status" class="rounded border border-gray-200 shadow md:p-6 dark:border-gray-700">
                <div class=" justify-center mb-4 bg-gray-100 rounded dark:bg-gray-100">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> <?= $reconduccion['nombre_dependencia'] . " -> " . $reconduccion['nombre_area']?></h5>
                    <p><?= "Oficio: " . $reconduccion['no_oficio'] . " <br>Dep. Gen: " . $reconduccion['dep_general'] . " -- Dep. Aux: " . $reconduccion['dep_aux'] . " -- Programa: " . $reconduccion['programa']?></p>
                </div>

                <!-- vamos a buscar las calindarizaciones realacionadas con esta reconduccion -->
                <?php 
                $programaciones = CalendarizacionesdeReconduccionAct($con, $reconduccion['id_reconduccion_actividades']);
                foreach($programaciones as $programacion):   // Tenemos una vista de cada programacion dentro de cada reconduccion.
                    $dataActividad = datosdeActividad($con, $programacion['id_actividad']);
                    if(DefineTipo($con, $programacion['programacion_inicial'], $programacion['programacion_final']) == "Externa"){
                        $bg_table = "bg-blue-200 ";
                    }else{
                        $bg_table = "";
                    }?>

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 '.$bg_table.'">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 ' . $bg_table. '">
                                <tr>
                                    <td scope="col" colspan = "12" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                        <?= $dataActividad['codigo_actividad'] . " - " . $dataActividad['nombre_actividad'] . " - " . $dataActividad['unidad'] ?>
                                    </td> 
                                </tr>

                                <tr>
                                    <?= EncabezadoMeses()?>
                                </tr>
                                <tr>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <?= Programacion($programacion['programacion_inicial'])?>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <?= Programacion($programacion['programacion_final'])?>
                                </tr>
                                <tr>
                                    <td colspan="12">
                                        <?= $programacion['justificacion'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                        <br>
                <?php endforeach?>
                <div class="flex items-center mt-4 space-x-3">
                        <input type="hidden" name="id_reconduccion" value="<?= $reconduccion['id_reconduccion_actividades']?>">
                        <button type="submit" name="valida_reconduccion_act" value="validar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validar</button>
                        <button type="submit" name="cancela_reconduccion_act" value="cancelar" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Rechazar</button>

                </div>
            </div><br>
            </form>
        <?php endforeach?>
    <?php endif ?>

    <?php if($tipo == "indicadores"): // Aqui comienza en caso de revisar reconducciones de INDICADORES?>
        <?php $reconducciones = TraeTodasReconduccionesIndicadores($con); ?>
            <?php foreach ($reconducciones as $reconduccion):?>
                <?php $oldprogramacion = explode("|" ,$reconduccion['programacion_inicial_a']);
                $oldprogramacionanual = intval($oldprogramacion[0]) + intval($oldprogramacion[1]) + intval($oldprogramacion[2]) + intval($oldprogramacion[3]);  ?>

                <?php $nuevaprogramacion = explode("|" ,$reconduccion['programacion_modificada_a']);
                $nuevaprogramacionanual = intval($nuevaprogramacion[0]) + intval($nuevaprogramacion[1]) + intval($nuevaprogramacion[2]) + intval($nuevaprogramacion[3]);  ?>

                <?php $originalindicador = TraeOriginalIndicador($con, $reconduccion['id_indicador']) ?>
                <div role="status" class="rounded border border-gray-200 md:p-6 dark:border-gray-700 my-4">
                    <div class=" justify-center mb-4 rounded">
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> <?= $reconduccion['nombre_dependencia']?></h5>
                        <p><?= "Oficio: " . $reconduccion['no_oficio'] . " Fecha: " . $reconduccion['fecha'] . " <br>Dep. Gen: " . $reconduccion['dep_general'] . " -- Dep. Aux: " . $reconduccion['dep_aux'] . " -- Programa: " . $reconduccion['programa_p']?></p>
                        <p>Reporta: <?= $reconduccion['nombre'] . ' ' . $reconduccion['apellidos']  ?></p>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <td colspan="13" scope="col" class="px-6 py-3"> Nombre Indicador: <?= $reconduccion['nombre_indicador'] ?></td>
                                </tr>
                                <tr>
                                    <td scope="col" class="px-3 py-3">
                                        Variables
                                    </td>
                                    <td scope="col" class="px-3 py-3">
                                        Orig U. de M.
                                    </td>
                                    <td scope="col" class="px-3 py-3">
                                        Nueva U. de M.
                                    </td>
                                    <td scope="col" class="px-3 py-3">
                                        Orig Tipo Op.
                                    </td>
                                    <td scope="col" class="px-3 py-3">
                                        Nueva Tipo Op.
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Orig 1t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Orig 2t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Orig 3t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Orig 4t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Total Original
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Nueva 1t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Nueva 2t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Nueva 3t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Nueva 4t
                                    </td>
                                    <td scope="col" class="px-2 py-3">
                                        Total Nueva
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        A <?= $reconduccion['variable_a'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $originalindicador['umedida_a'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $reconduccion['umedida_a'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $originalindicador['tipo_op_a'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $reconduccion['tipo_op_a'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $oldprogramacion[0] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $oldprogramacion[1] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $oldprogramacion[2] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $oldprogramacion[3] ?>
                                    </td>
                                    <td class="px-6 py-4 bg-blue-50">
                                        <?= $oldprogramacionanual ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $nuevaprogramacion[0] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $nuevaprogramacion[1] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $nuevaprogramacion[2] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $nuevaprogramacion[3] ?>
                                    </td>
                                    <td class="px-6 py-4 bg-blue-50">
                                        <?= $nuevaprogramacionanual ?>
                                    </td>
                                </tr>
                                <form action="models/revisa_reconducciones_Model.php" method="post">
                                    <input type="hidden" name="id_reconduccion" value="<?= $reconduccion['id_reconduccion_indicadores'] ?>">
                                    <input type="hidden" name="programacion_modificada_a" value="<?= $reconduccion['programacion_modificada_a'] ?>">
                                    <input type="hidden" name="programacion_modificada_b" value="<?= $reconduccion['programacion_modificada_b'] ?>">
                                    <input type="hidden" name="programacion_modificada_c" value="<?= $reconduccion['programacion_modificada_c'] ?>">
                                    <input type="hidden" name="tipo_op_a" value="<?= $reconduccion['tipo_op_a'] ?>">
                                    <input type="hidden" name="tipo_op_b" value="<?= $reconduccion['tipo_op_b'] ?>">
                                    <input type="hidden" name="tipo_op_c" value="<?= $reconduccion['tipo_op_c'] ?>">
                                    <input type="hidden" name="umedida_a" value="<?= $reconduccion['umedida_a'] ?>">
                                    <input type="hidden" name="umedida_b" value="<?= $reconduccion['umedida_b'] ?>">
                                    <input type="hidden" name="umedida_c" value="<?= $reconduccion['umedida_c'] ?>">
                                    <input type="hidden" name="id_indicador" value="<?= $originalindicador['id'] ?>">
                                    <tr>
                                        <td> &nbsp;</td>
                                        <td> <button type="submit" name="validareconduccionindicadores"  value="validar" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Validar</button></td>
                                        <td> <button type="submit" name="cancelarreconduccionindicadores" value="cancelar" class="my-4 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancelar</button></td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>

                </div>
            <?php endforeach ?>
    <?php endif ?>
</div>
<?php include 'footer.php';?>
</body>
</html>
