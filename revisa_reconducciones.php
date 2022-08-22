<?php
if(!$_GET['type']){
    header("Location: index.php");
}
$tipo = $_GET['type'];
session_start();
if($_SESSION['sistema'] == "pbrm" || $_SESSION['id_permiso'] != 1){    
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/r_actividadesController.php';}
?>
<!DOCTYPE html>
<html lang="es">

<body>
	<div class="container text-center mx-auto">
    <br>
        <!-- Aqui comienza el area de las reconducciones de Actividades -->
        <?php if($tipo == "actividades"){
        //primero vamos a llamar las reconducciones
        $reconducciones = TraeTodasReconduccionesActividades($con);

        foreach ($reconducciones as $reconduccion):?>
                    <?php //var_dump($reconduccion) ?>
            <div role="status" class="p-4 max-w-xl rounded border border-gray-200 shadow animate-pulse md:p-6 dark:border-gray-700">
                <div class=" justify-center mb-4 bg-gray-100 rounded dark:bg-gray-100">
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"> <?= $reconduccion['nombre_dependencia'] . " -> " . $reconduccion['nombre_area']?></h5>
                    <p><?= "Oficio: " . $reconduccion['no_oficio'] . " -- Dep. Gen: " . $reconduccion['dep_general'] . " -- Dep. Aux: " . $reconduccion['dep_aux'] . " -- Programa: " . $reconduccion['programa']?></p>
                </div>

                <!-- vamos a buscar las calindarizaciones realacionadas con esta reconduccion -->
                <?php 
                $programaciones = CalendarizacionesdeReconduccion($con, $reconduccion['id_reconduccion_actividades']);
                foreach($programaciones as $programacion):
                //var_dump($programacion)?>
                    <div class="bg-gray-100 rounded-full dark:bg-gray-700">
                        <?= MuestraProgramacion($con, $programacion['programacion_inicial'], $programacion['programacion_final'], $programacion['id_actividad']) ?>
                    </div>
                <?php endforeach?>
                <div class="flex items-center mt-4 space-x-3">
                    <svg class="w-14 h-14 text-gray-200 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    <div>
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                        <div class="w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    </div>
                </div>
            </div>
            <br>
            
    <?php endforeach?>
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