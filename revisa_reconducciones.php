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
        <?php if($tipo == "actividades"){
        //primero vamos a llamar las reconducciones
        $reconducciones = TraeTodasReconduccionesActividades($con);

        foreach ($reconducciones as $reconduccion):?> <!-- Tenemos una vista de cada reconduccion -->
            <form action="models/revisa_reconducciones_Model.php" method="post">

                    <?php //var_dump($reconduccion) ?>
            <div role="status" class="p-4 max-w-xl rounded border border-gray-200 shadow animate-pulse md:p-6 dark:border-gray-700">
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
                                    <th scope="col" colspan = "12" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                        <?= $dataActividad['codigo_actividad'] . " - " . $dataActividad['nombre_actividad'] . " - " . $dataActividad['unidad'] ?>
                                    </th> 
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
                            </tbody>
                        </table>
                    </div>

                        <br>
                <?php endforeach?>
                <div class="flex items-center mt-4 space-x-3">
                        <input type="hidden" name="reconduccion" value="<?= $reconduccion['id_reconduccion_actividades']?>">
                        <button type="submit" name="valida_reconduccion_act" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validar</button>
                        <button type="submit" name="cancela_reconduccion_act" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Rechazar</button>

                </div>
            </div><br>
            </form>
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