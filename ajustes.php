<?php
session_start();
if($_SESSION['sistema'] == "pbrm" && $_SESSION['id_permiso'] < 3):
    include 'header.php';
    include 'head.php';
    require_once 'Controllers/ajustes_controller.php';

    $ajustes = TraeAjustes($con);

    $id_uippe = (isset($ajustes['id_uippe']) && $ajustes['id_uippe'] != "" ? $ajustes['id_uippe'] : "");
    $id_uippe = (isset($ajustes['id_tesorero']) && $ajustes['id_tesorero'] != "" ? $ajustes['id_tesorero'] : "");
    
    ?>
<!DOCTYPE html>
<html lang="es">

<body>

<div class="container text-center mx-auto">

    <br>

<!-- Primero vamos a revisar los puestos mas importantes. -->
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nombre
                </th>
                <th scope="col" class="py-3 px-6">
                    Puesto
                </th>
                <th scope="col" class="py-3 px-6">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody> <!-- Como solo son 2 puestos lo haremos "A mano" -->
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"> <!-- Perimero la UIPPE -->
                <?php $uippe = TraerUippe($con, $id_uippe); ?>
                <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="pl-3">
                        <?php if($uippe):?>
                        <div class="text-base font-semibold">Neil Sims</div>
                        <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                        <?php endif ?>
                    </div>  
                </th>
                <td class="py-4 px-6">
                    React Developer
                </td>
                <td class="py-4 px-6">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                    </div>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"> <!-- Perimero la UIPPE -->
                <?php $tesorero = TraerTesorero($con, $id_tesorero);?>
                <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="pl-3">
 
                    </div>  
                </th>
                <td class="py-4 px-6">
                    React Developer
                </td>
                <td class="py-4 px-6">
                    <div class="flex items-center">
                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>


</div>

<?php include 'footer.php';?>
</body>
</html>
<?php else:?>
    <script>
    window.location.href = 'login.php';
    </script>
<?php endif ?>