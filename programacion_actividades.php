<?php
session_start();
require_once 'Controllers/prog_act_Controller.php';
if($_SESSION['id_permiso'] == 5 || $_SESSION['id_permiso'] == 4){
    if(!$_POST){
        header("Location: actividades.php");
    }else{
        $id_area = $_POST['id_area'];
    }
include 'Controllers/breadcrumbs.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<body>
<div class="container mx-auto">
    <br>
<?= breadcrumbs(array("Inicio"=> "index.php", "Programación Actividades"=> ""))?>

    <div class="container mx-auto">        
        
        <br>

        <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl dark:text-white">Programación Mensual</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-5 py-3">
                            #
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Nombre Actividad
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Unidad de Medida
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Programado Anual
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Ene
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Feb
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Mar
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Abr
                        </th>
                        <th scope="col" class="px-2 py-3">
                            May
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Jun
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Jul
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Ago
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Sep
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Oct
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Nov
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Dic
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $actividades = TraeActividades($con, $id_area);
                foreach($actividades as $actividad):?>
                    <tr>
                        <td class="py-4 px-5">
                            <?= $actividad['codigo_actividad']?>
                        </td>
                        <td class="py-4 px-5">
                            <?= $actividad['nombre_actividad']?>
                        </td>
                        <td class="py-4 px-5">
                            <?= $actividad['unidad']?>
                        </td>
                        <td class="py-4 px-5">
                            <?= SumaAnual($actividad)?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['enero']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['febrero']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['marzo']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['abril']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['mayo']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['junio']?>
                        </td> 
                        <td class="py-4 px-2">
                            <?= $actividad['julio']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['agosto']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['septiembre']?>
                        </td> 
                        <td class="py-4 px-2">
                            <?= $actividad['octubre']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['noviembre']?>
                        </td>
                        <td class="py-4 px-2">
                            <?= $actividad['diciembre']?>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>

<?php include 'footer.php';?>

</div>
</body>
</html>
<?php
}else{
    ?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}
?>
