<?php
session_start();
if($_SESSION['sistema'] == "pbrm"){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/avances_controlador.php';
    include 'Controllers/breadcrumbs.php';
    $tipo = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="es">

<body>
	<div class="container text-center mx-auto">
        <br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Revisa Avances"=>""))?>

<br>
    <?php
//  -------------------------------------------- PRIMERO SI ES DE ACTIVIDADES -----------------------
        if($tipo == "actividades"):        
            $Avances = ConsultaAvancesActividades($con);

            if(!$Avances){
                print "No Tienes Avances Pendientes Por Revisión";
            }
            foreach($Avances as $a): ?>

            <div class="p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $a['clave_dependencia']. $a['clave_dependencia_auxiliar'].$a['codigo_proyecto']. ' - ' . $a['nombre_dependencia']. ' - ' . $a['nombre_area'] ?></h5>
                
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 dark:text-gray-400">
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
                    </thead>
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="py-2 px-6" align="center" valign="top">
                                <?= $a['nombre_actividad'] ?>
                            </th>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= $a['unidad'] ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= MetaAnual($a) ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= ThisMes($a) ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?php 
                                $lowthismes = strtolower(ThisMes($a));
                                $prog_mes = $a[$lowthismes];
                                print "<b>" . $prog_mes . "</b>";
                                ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= "<b>" . $a['avance'] . "<b>"?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= intval($a['avance']) - $prog_mes ?>
                            </td>
                            <td rowspan=2 class="py-2 px-6" align="center">
                                <button type="button" data-modal-toggle="modal<?=$a['id_avance']?>">
                                    <?= imgsmall($a['path_evidenia_evidencia']) ?>
                                </button>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="4" scope="row" class="py-2 px-6" valign="top">
                                Justificación por variación:
                                <?= $a['justificacion'] ?>
                                <br>
                                Reportado por:<b> <?= $a['justificacion'] . "<br>" . $a['nombre'].' ' . $a['apellidos']. "</b>" . dia($a['fecha_avance']) ?>
                            </td>
                            <td class="py-2 px-6" colspan="3" align="center" valign="top">
                                <form action="models/avances_modelo.php" method="post">
                                    <input type="hidden" name="id_avance" value="<?= $a['id_avance']?>">
                                    <input type="hidden" name="usuario" value="<?= $_SESSION['id_usuario'] ?>">
                                    <button type="submit" name="valida_actividad" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validar</button>
                                    <button type="submit" name="cancela_actividad" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Rechazar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
<br>
                            
            <div id="modal<?= $a['id_avance']?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-4xl p-4 md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                <?= $a['nombre_actividad'] ?>
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal<?=$a['id_avance']?>">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                    <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <a target="_blank" href="<?= Imagenes($a['path_evidenia_evidencia']) ?>">
                                <?= imgmd($a['path_evidenia_evidencia']) ?>
                            </a>
                        </div>                    
                    </div>
                </div>
            </div>
            <?php
            endforeach;
        endif;
        ?>

<!--   -------------------------------------------- SI ES DE INDICADORES -----------------------  -->
        <?php if($tipo == "indicadores"): ?>
            <?php $AvancesI = ConsultaAvancesIndicadores($con); ?>



            <?php if(!$AvancesI){
                print "No Tienes Avances de INDICADORES Pendientes Por Revisión";
            }
            foreach($AvancesI as $a): ?>

            <div class="p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $a['clave_dependencia']. $a['clave_dependencia_auxiliar'].$a['codigo_proyecto']. ' - ' . $a['nombre_dependencia']?></h5>
                
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 dark:text-gray-400">
                        <tr>
                            <th scope="col" solspan="2" class="py-3 px-6" align="center"> 
                                Nombre del Indicador
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                Variables
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                U d M
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                Prog. Anual
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                Trimestre
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                Prog Trimestre
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                Alcanzada Trimestre
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                Variacion
                            </th>
                            <th scope="col" class="py-3 px-6" align="center">
                                Evidencia
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" rowspan="2" class="py-2 px-6" align="center" valign="top">
                                <?= $a['nombre_indicador'] ?>
                            </th>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= $a['variable_a'] ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= $a['umedida_a'] ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= $a['at1'] + $a['at2'] + $a['at3'] + $a['at4']?>
                            </td>
                            <td class="py-2 px-6" rowspan="2" align="center" valign="top">
                                <?= $a['trimestre'] . "° Trimestre" ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?php 
                                $str = "at" . $a['trimestre'];
                                print $programado_trimestre = $a[$str]?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= "<b>" . $a['avance_a'] . "<b>"?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= intval($a['avance_a']) - $programado_trimestre ?>
                            </td>
                            <td rowspan=2 class="py-2 px-6" align="center">
                                <?php if(!$a['path_evidenia_evidencia']): ?>
                                    Sin evidencia
                                <?php else: ?>

                                <button type="button" data-modal-toggle="modal<?=$a['id_avance']?>">
                                    <?= $img12345 = imgsmall($a['path_evidenia_evidencia']) ?>
                                </button>
                                <?php endif ?>
                            </td>
                        </tr>

                        <tr class="bg-white dark:bg-gray-800">
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= $a['variable_b'] ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= $a['umedida_b'] ?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= $a['bt1'] + $a['bt2'] + $a['bt3'] + $a['bt4']?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?php 
                                $str = "at" . $a['trimestre'];
                                print $programado_trimestre = $a[$str]?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= "<b>" . $a['avance_b'] . "<b>"?>
                            </td>
                            <td class="py-2 px-6" align="center" valign="top">
                                <?= intval($a['avance_b']) - $programado_trimestre ?>
                            </td>
                            <td rowspan=2 class="py-2 px-6" align="center">
                            </td>
                        </tr>

                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="4" scope="row" class="py-2 px-6" valign="top">
                                Justificación por variación:
                                <?= $a['justificacion'] ?>
                                <br>
                                Reportado por: <b> <?=  $a['nombre'].' ' . $a['apellidos']. "</b>" . dia($a['fecha_reporta']) ?>
                                <br>
                                Descripción de la evidencia: <?= $a['descripcion_evidencia'] ?>
                            </td>
                            <td class="py-2 px-6" colspan="3" align="center" valign="top">
                                <form action="models/avances_modelo.php" method="post">
                                    <input type="hidden" name="id_avance" value="<?= $a['id_avance']?>">
                                    <input type="hidden" name="usuario" value="<?= $_SESSION['id_usuario'] ?>">
                                    <button type="submit" name="valida_indicador" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validar</button>
                                    <button type="submit" name="cancela_indicador" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Rechazar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
<br>
                            
            <div id="modal<?= $a['id_avance']?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-4xl p-4 md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                <?= $a['nombre_indicador'] ?>
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal<?=$a['id_avance']?>">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                    <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <a target="_blank" href="<?= Imagenes($a['path_evidenia_evidencia']) ?>">
                                <?= imgmd($a['path_evidenia_evidencia']) ?>
                                <br>
                                <?= $a['descripcion_evidencia'] ?>
                            </a>
                        </div>                    
                    </div>
                </div>
            </div>
            <?php
            endforeach;
        endif;
        ?>



		<br>

		
	</div>
<?php include 'footer.php';?>
</body>
</html>
<?php 
}else{?>
    <script>
    window.location.href = 'login.php';
    </script>
<?php
}
?>