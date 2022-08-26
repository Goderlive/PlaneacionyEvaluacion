<?php
session_start();
require_once 'Controllers/prog_act_Controller.php';
if($_SESSION['id_permiso'] == 1){
    if(!$_POST){
        header("Location: actividades.php");
    }else{
        $id_area = $_POST['id_area'];
    }

?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<body>
<div class="container mx-auto">        

    <br>
    <div class="container mx-auto">        
        <nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="actividades.php" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Actividades</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Programación</span>
                    </div>
                </li>
            </ol>
        </nav>
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
                                Ene
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Feb
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Mar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Abr
                            </th>
                            <th scope="col" class="px-6 py-3">
                                May
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jun
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ago
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Sep
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Oct
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nov
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dic
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?= $actividades = TraeActividades($con, $id_area);
                    foreach($actividades as $actividad):?>
                        <tr>
                            <td class="py-4 px-6">
                                <?= $actividad['codigo_actividad']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['nombre_actividad']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['unidad']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= SumaAnual($actividad)?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['enero']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['febrero']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['marzo']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['abril']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['mayo']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['junio']?>
                            </td> 
                            <td class="py-4 px-6">
                                <?= $actividad['julio']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['agosto']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['septiembre']?>
                            </td> 
                            <td class="py-4 px-6">
                                <?= $actividad['octubre']?>
                            </td>
                            <td class="py-4 px-6">
                                <?= $actividad['noviembre']?>
                            </td>
                            <td class="py-4 px-6">
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