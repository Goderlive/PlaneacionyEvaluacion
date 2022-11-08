<?php
session_start();
require_once 'models/modelo_actividades.php';
if($_SESSION['id_permiso'] == 1 || $_SESSION['id_permiso'] == 4 || $_SESSION['id_permiso'] == 5){?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head.php';?>
<?php include 'header.php';?>
<?php include 'Controllers/breadcrumbs.php';?>

<body>
    <br>
    <div class="container mx-auto">
<?= breadcrumbs(array("Inicio"=> "index.php", "Areas"=> "actividades.php", "Actividades Anteproyecto"=>""))?>
        


        <br>
        <h2 class="text-2xl font-extrabold dark:text-white"></h2>
<br>

        <div class="relative overflow-x-auto shadow-md sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-1 py-3">
                                #
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Nombre Actividad
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Unidad de Medida
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Programado Anual
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Ene
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Feb
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Mar
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Abr
                            </th>
                            <th scope="col" class="px-1 py-3">
                                May
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Jun
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Jul
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Ago
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Sep
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Oct
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Nov
                            </th>
                            <th scope="col" class="px-1 py-3">
                                Dic
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
            </table>

            <br>
            <!-- Modal toggle -->
            <button class="block w-full md:w-auto text-white mx-2 my-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="large-modal">
                Nueva Actividad
            </button>

            

        </div>
    </div>

   
<?php include 'footer.php';?>





<!-- Large Modal -->
<div id="large-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Nueva Actividad
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="models/modelo_actividades.php" method="POST">
                    <div>
                        <label for="nombre_actividad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre de la Actividad</label>
                        <input type="text" nombre="nombre_actividad" required id="nombre_actividad" placeholder="Sustantivo... ...¿De qué? ¿A quién?... ...¿Para qué?" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <br>
                    <?php $unidades = TraeUnidades_Medida($con) ?>
                    <label for="unidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Unidad de Medida</label>
                    <select id="unidades" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selecciona una Unidad de Medida</option>
                        <?php foreach($unidades as $u): ?>
                        <option value="<?= $u['id_unidad'] ?>"><?= $u['nombre_unidad'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <br>
                    <table>
                        <tbody>
                            <tr>
                                <td><label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">1er Trimestre</label></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="ene" id="ene" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enero" required></td>
                                <td><input type="number" name="feb" id="feb" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Febrero" required></td>
                                <td><input type="number" name="mar" id="mar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Marzo" required></td>
                                <td><input type="number" name="abr" id="abr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Abril" required></td>
                                <td><input type="number" name="may" id="may" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mayo" required></td>
                                <td><input type="number" name="jun" id="jun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Junio" required></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">2do Trimestre</label></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="jul" id="jul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Julio" required></td>
                                <td><input type="number" name="ago" id="ago" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Agosto" required></td>
                                <td><input type="number" name="sep" id="sep" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Septiembre" required></td>
                                <td><input type="number" name="oct" id="oct" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Octubre" required></td>
                                <td><input type="number" name="nov" id="nov" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Noviembre" required></td>
                                <td><input type="number" name="dic" id="dic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Diciembre" required></td>
                            </tr>

                            
                        </tbody>
                    </table>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="large-modal" name="guardar" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
                <button data-modal-toggle="large-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
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
