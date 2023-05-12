<?php
session_start();


if(!$_SESSION || $_SESSION['sistema'] != 'pbrm'){
    ?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}

?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';  // Esto solo carga el html de un head?>
<?php include 'header.php'; // Carga el menu de arriba y la programacion de los permisos?>
<?php include 'Controllers/breadcrumbs.php';?>
<?php include 'Controllers/actividades_avances_controller.php';?>

<?php $el_mes = (isset($_POST['mes'])) ? $_POST['mes'] : intval(date('m')); ?>


<body>
<?php
    if($permisos['nivel'] != 1 && $permisos['nivel'] != 2):?>
        <script>
            window.location.href = 'index.php';
        </script>
    <?php endif ?>
    <div class="container mx-auto">
    <br>
    <?= breadcrumbs(array("Inicio" => "index.php", "Valida Avances de Actividades" => ""))?>
    <br>



<?php if($permisos['nivel'] == 1 || $permisos['nivel'] ==2): // Esta es la primer condicion para los permisos que permiten validar?>
    <?php if(!$_POST): //Si no hay un post va a elistar las dependencias que nos corresponden segun el permiso
        $dependencias = TraeDependenciasController($con, $permisos); ?>
        <div class="grid grid-cols-4">
        <?php foreach($dependencias as $dp): ?>
                <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $dp['nombre_dependencia'] ?> </h5>
                    <form action="" method="post">
                        <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_dependencia" value="<?= $dp['id_dependencia'] ?>">
                             Ver Areas
                        </button>
                    </form>
                </div>
                <?php endforeach ?>
            </div>
    <?php endif ?>


    <?php if(isset($_POST['id_dependencia'])):  //Aqui validamos el area?>
        <?php $id_dependencia = $_POST['id_dependencia'] ?>
        <?php $areas = TraerAreas($con, $id_dependencia) ?>
        <div class="grid grid-cols-4">
        <?php foreach($areas as $a): ?>
            <div class="items-start p-4 ml-2 mr-2 mb-4 text-center  bg-white rounded-lg border border-gray-400 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> <?= $a['nombre_area'] ?> </h5>
                <form action="" method="post">
                    <button class="inline-flex mb-2 items-center py-2 px-3 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="id_area" value="<?= $a['id_area'] ?>">
                            Ver Avances
                    </button>
                </form>
            </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>


    <?php if(isset($_POST['id_area'])): // Aqui mostramos las actividades?>
        <?php $meses = array("Sin Mes", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");?>
        <?php $id_area = $_POST['id_area'] ?>
        <?php $actividadesDB = Actividades_DB($con, $id_area); ?>
        <div class="text-center">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px">
                    <?=MenuMes($el_mes, $id_area)?>
                </ul>
            </nav>
        </div>   
        
        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Programado Anual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Avance Acumulado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Programado <?= $meses[$el_mes]?>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reportado <?= $meses[$el_mes]?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($actividadesDB as $a): ?>
                            <?php $avanceMensual = AvanceMes($con, $a['id_actividad'], $el_mes);
                            $anual = $a['enero'] + $a['febrero'] + $a['marzo'] + $a['abril'] + $a['mayo'] + $a['junio'] + $a['julio'] + $a['agosto'] + $a['septiembre'] + $a['octubre'] + $a['noviembre'] + $a['diciembre'];
                            $mesi = strtolower($meses[$el_mes]); ?>
                            <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <?= $a['codigo_actividad'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $a['nombre_actividad'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $a['unidad'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $anual ?>
                                </td>
                                <td class="px-6 py-4">
 
                                </td>
                                <td class="px-6 py-4">
                                    <?= $a[$mesi] ?>
                                </td>
                                <td class="px-6 py-4 text-center"> 
                                    <?php if(!$avanceMensual):?>
                                        Sin Avance
                                    <?php endif ?>

                                    <?php print '<pre>';
                                    var_dump($avanceMensual);?>
                                    <?php if($permisos['rol'] == 1): // Cuando es Perteneciente a PBRMS ?>
                                        <?php if((((isset($avanceMensual['validado']) && $avanceMensual['validado'] == 1) && !$avanceMensual['id_linea']))      ||     (((isset($avanceMensual['validado']) && $avanceMensual['validado'] == 1)) && (isset($avanceMensual['validado_2']) && $avanceMensual['validado_2'] == 1))) : //Si todo esta SUPER VALIDADO ?>    
                                            <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button" data-modal-toggle="evidenciasModal<?= $a['id_actividad'] ?>">
                                                <?= $avanceMensual['avance'] ?>
                                            </button>
                                        <?php endif ?>
                                        
                                        <?php if((isset($avanceMensual['validado']) && $avanceMensual['validado'] != 1) && (isset($avanceMensual['validado_2']) && $avanceMensual['validado_2'] != 1)) : //FALTA VALIDAR por NOSOTROS y por PDM?>    
                                            <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" type="button" data-modal-toggle="validamodal<?= $a['id_actividad'] ?>">
                                                <?= $avanceMensual['avance'] ?>
                                            </button>
                                        <?php endif ?>


                                        <?php if((isset($avanceMensual['validado']) && $avanceMensual['validado'] != 1) && !$avanceMensual['lineaactividad']) : //YA valido PDM y faltamos de validar NOSOTROS?>    
                                            
                                        <?php endif ?>
                                        
                                        <?php if((isset($avanceMensual['validado']) && $avanceMensual['validado'] != 1) && !$avanceMensual['lineaactividad']) : //FALTA VALIDAR por NOSOTROS y NO valida PDM?>    
                                            
                                        <?php endif ?>




                                    <?php endif ?>

                                    <?php if($permisos['rol'] == 2): // Cuando es Perteneciente a PLAN DE DESARROLLO ?>

                                    <?php endif ?>
                                </td>

                            </tr>
                            
                            <?php if ($avanceMensual): ?>
                                <div id="evidenciasModal<?= $a['id_actividad']?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Evidencia
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="evidenciasModal<?= $a['id_actividad']?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                Evidencia Capturada por: <?= $avanceMensual['nombre'] . " " . $avanceMensual['apellidos'] ?>
                                                <br>
                                                <?= $avanceMensual['fecha_avance'] ?>
                                                <img src="'. $img .'" alt="alt" width="300">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>

                            <?php if ($avanceMensual): ?>
                                <div id="validamodal<?= $a['id_actividad'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Evidencia
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="validamodal<?= $a['id_actividad'] ?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                                Evidencia Capturada por: <?= $avanceMensual['nombre'] . " " . $avanceMensual['apellidos'] ?>
                                                <br>
                                                <?= $avanceMensual['fecha_avance'] ?>
                                                <img src="'. $img .'" alt="alt" width="300">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>


                        <?php endforeach ?>
                    </tbody>
            </table>
        </div>
    <?php endif ?>

<?php endif //Termina el IF de los permisos de los validadores ?> 












</div>
<?php include 'footer.php';?>
</body>
</html>
