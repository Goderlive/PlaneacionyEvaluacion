<?php
session_start();
if($_SESSION['id_permiso'] == 1 || $_SESSION['id_permiso'] == 4 || $_SESSION['id_permiso'] == 5){
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'Controllers/breadcrumbs.php';?>

<body>
    <br>
    <div class="container mx-auto">
<?= breadcrumbs(array("Inicio"=> "index.php", "Indicadores"=>"indicadores.php"))?>
        


        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nivel
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre Indiador
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Frecuencia
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Anual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Trimestre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Reportar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                NF
                            </th>
                            <td class="px-6 py-4">
                                Tasa de variacion en el numero de alumnos de educacion superior inscritos en programas de calidad.
                            </td>
                            <td class="px-6 py-4">
                                Reporte
                            </td>
                            <td class="px-6 py-4">
                                Anual
                            </td>
                            <td class="px-6 py-4">
                                34
                            </td>
                            <td class="px-6 py-4">
                                8
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
                                    Reportar
                                </button>
                            </td>
                        </tr>
                        <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                NP
                            </th>
                            <td class="px-6 py-4">
                                Tasa de variacion en el numero de otras cosas que son muy importantes como para ser evaluadas.
                            </td>
                            <td class="px-6 py-4">
                                Acta
                            </td>
                            <td class="px-6 py-4">
                                Semestral
                            </td>
                            <td class="px-6 py-4">
                                12
                            </td>
                            <td class="px-6 py-4">
                                4
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
                                    Reportar
                                </button>
                            </td>
                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
<?php include 'footer.php';?>    
</body>
</html>
<?php
} else{
    ?>
    <script>
        window.location.href = 'login.php';
    </script>
    <?php
}
?>